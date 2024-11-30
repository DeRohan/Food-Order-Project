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
                    // header("location:" .$home_url.'login-rest.php');
                    echo "<script>window.location.href='" . $home_url . "login-rest.php';</script>";
                    die();
                }
            }
            else{
                $image_name = "";
            }
        }
        else{
            $image_name = "restaurant_default.jpg";
        }

        $check = "SELECT * FROM tbl_restaurants";
        $result = mysqli_query($conn, $check);
        if(mysqli_num_rows($result)>0) {
            while($row = mysqli_fetch_assoc($result)) {
                if($row['username'] == $username) {
                    $_SESSION['login'] = "<div class='error'>Username Already Exists!</div>";
                    // header("location:" .$home_url.'login-rest.php');
                    echo "<script>window.location.href='" . $home_url . "login-rest.php';</script>";
                    die();
                }
            }
        }
        $sql = "INSERT INTO tbl_restaurants SET
            ID = 5,
            username = '$username',
            password = '$password',
            Name = '$r_name',
            Address = '$address',
            Description = '$description',
            image_name = '$image_name'
            ";
        $result = mysqli_query($conn, $sql);
        if($result==true) {
            $current_id = mysqli_insert_id($conn);
            $curr_date = date('Y-m-d');
            $sql2 = "INSERT INTO tbl_restaurant_registration SET
                restaurant_id = $current_id,
                registration_date = '$curr_date';
            ";
            $result2 = mysqli_query($conn, $sql2);
            if($result2){
                $_SESSION['login'] = "<div class='success'>Restaurant Created Succesfully!</div>";
                // header("location:" .$home_url.'restaurant/index.php');
                echo "<script>window.location.href='" . $home_url . "restaurant/index.php';</script>";
            }
        }
        else{
            $_SESSION['login'] = "<div class='error'>Failed to Create Restaurant!</div>";
            // header("location:" .$home_url.'login-rest.php');
            echo "<script>window.location.href='" . $home_url . "login-rest.php';</script>";
        }
    }

?>