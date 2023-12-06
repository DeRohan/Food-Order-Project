<?php 
    include ('config/connect.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $r_name = $_POST['name'];
        $address = $_POST['address'];
        $description = $_POST['description'];
        
        if(isset($_FILES['image']['name']) && $_FILES['image']['error']==UPLOAD_ERR_OK) {
            $image_name = $_FILES['image']['name'];
            if($image_name!=NULL) {
                $ext = explode('.', $image_name);
                $ext = end($ext);
                $image_name = "Restaurant_".rand(000, 999).'.'.$ext;
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "images/restaurant/" . $image_name;
                $upload = move_uploaded_file($source_path, $destination_path);
                if($upload == 0) {
                    $_SESSION['login'] = "<div class='error'>Failed to Upload Image!</div>";
                    header("location:" .$home_url.'login-rest.php');
                    die();
                }
            }
            else{
                $image_name = NULL;
            }
        }
        else{
            $image_name = NULL;
        }

        $check = "SELECT * FROM tbl_restaurants";
        $result = mysqli_query($conn, $check);
        if(mysqli_num_rows($result)>0) {
            while($row = mysqli_fetch_assoc($result)) {
                if($row['username'] == $username) {
                    $_SESSION['login'] = "<div class='error'>Username Already Exists!</div>";
                    header("location:" .$home_url.'login-rest.php');
                    die();
                }
            }
        }
        $sql = "INSERT INTO tbl_restaurants SET
            username = '$username',
            password = '$password',
            Name = '$r_name',
            Address = '$address',
            Description = '$description',
            image_name = '$image_name'
            ";
            echo "query time";
            echo $username, $password, $r_name, $address, $description, $image_name;
        $result = mysqli_query($conn, $sql);
        echo "query works";
        if($result==true) {
            $current_id = mysqli_insert_id($conn);
            $curr_date = date('Y-m-d');
            $sql2 = "INSERT INTO tbl_restaurant_registration SET
                restaurant_id = $current_id,
                registration_date = '$curr_date';
            ";
            echo "2nd query";
            $result2 = mysqli_query($conn, $sql2);
            echo "2nd works";
            if($result2){
                $_SESSION['login'] = "<div class='success'>Restaurant Created Succesfully!</div>";
                header("location:" .$home_url.'restaurant/index.php');
            }
        }
        else{
            $_SESSION['login'] = "<div class='error'>Failed to Create Restaurant!</div>";
            header("location:" .$home_url.'login-rest.php');
        }
    }

?>