<?php 
    include ('config/connect.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $sql = "SELECT * FROM tbl_restaurants WHERE username = '$username' AND password = '$password' ";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1) {
            $_SESSION['login-rest'] = "<div class='success'>Login Successful!</div>";
            $_SESSION['restaurant'] = $username;
            // header('location:'.$home_url.'restaurant/index.php');
            echo "<script>window.location.href='" . $home_url . "restaurant/index.php';</script>";
        }
        else {
            $_SESSION['login-rest'] = "<div class='error'>Username or Password Did not Match :(</div>";
            // header('location:'.$home_url.'select-option.php');
            echo "<script>window.location.href='" . $home_url . "select-option.php';</script>";
        }

    }
?>