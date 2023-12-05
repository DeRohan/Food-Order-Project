<?php 
    include ('config/connect.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $r_name = $_POST['name'];
        $address = $_POST['address'];
        $description = $_POST['description'];
        $check = "SELECT * FROM tbl_restaurants";
        $result = mysqli_query($conn, $check);
        if(mysqli_num_rows($result)>0) {
            while($row = mysqli_fetch_assoc($result)) {
                if($row['username'] == $username) {
                    $_SESSION['login'] = "<div class='error'>Username Already Exists!</div>";
                    header("location:" .$home_url.'login-rest.php');
                }
            }
        }
        $sql = "INSERT INTO tbl_restaurants SET
            username = '$username',
            password = '$password',
            Name = '$r_name',
            Address = '$address',
            Description = '$description'
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
                header("location:" .$home_url.'restaurant/index.php');
            }
        }
        else{
            $_SESSION['login'] = "<div class='error'>Failed to Create Restaurant!</div>";
            header("location:" .$home_url.'login-rest.php');
        }
    }

?>