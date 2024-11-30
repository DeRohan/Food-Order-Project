<?php 
    include('config/connect.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Fname = $_POST['fname'];
        $Lname = $_POST['lname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pwd = md5($_POST['pwd']);
        $num = $_POST['pno'];
        $addr = $_POST['address'];

        $check = "SELECT * FROM tbl_users";
        $result = mysqli_query($conn, $check);
        if(mysqli_num_rows($result)>0) {
            while($row = mysqli_fetch_assoc($result)) {
                if($row['username'] == $username) {
                    $_SESSION['login'] = "<div class='error'>Username Already Exists!</div>";
                    // header("location:" .$home_url.'login-usr.php');
                    echo "<script>window.location.href='" . $home_url . "login-usr.php';</script>";
                    die();
                }
                if($row['email'] == $email) {
                    $_SESSION['login'] = "<div class='error'>Email Already Exists!</div>";
                    // header("location:" .$home_url.'login-usr.php');
                    echo "<script>window.location.href='" . $home_url . "login-usr.php';</script>";
                    die();
                }
            }
        }
        $sql = "INSERT INTO tbl_users SET
            user_id = 7,
            username = '$username',
            password = '$pwd',
            email = '$email',
            F_Name = '$Fname',
            L_Name = '$Lname',
            phone_no = '$num',
            address = '$addr'
            ";
        $result = mysqli_query($conn, $sql);
        if($result==true) {
            $_SESSION['login'] = "<div class='success'>User Registered Successfully! :D</div>";
            // header("location:" .$home_url.'login-usr.php');
            echo "<script>window.location.href='" . $home_url . "login-usr.php';</script>";
            exit();
        }
        else{
            $_SESSION['login'] = "<div class='error'>Failed to Register User! :(</div>";
            // header("location:" .$home_url.'login-usr.php');
            echo "<script>window.location.href='" . $home_url . "login-usr.php';</script>";
        }
    }
?>