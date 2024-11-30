<?php 
    include ('config/connect.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $emu = $_POST['email'];
        $pwd = md5($_POST['pwd']);

        $sql = "SELECT * FROM tbl_users WHERE (email='$emu' OR username = '$emu') AND password='$pwd'";
        $result = mysqli_query($conn, $sql);
        if($result==true) {
            $count = mysqli_num_rows($result);
            if($count==1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['login'] = $row['username'];
                $_SESSION['customer'] = $row['user_id'];
                echo "\nRedirecting...";
                echo $home_url."index.php";
                header("location:" .$home_url.'index.php');
                exit();
            }
            else{
                $_SESSION['login'] = "<div class='error'>Invalid Credentials! :(</div>";
                header("location:" .$home_url.'login-usr.php');
            }
        }
    }
?>