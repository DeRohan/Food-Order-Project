<?php include('../config/connect.php'); ?>

<html>
    <head>
        <title>Login - The Food House</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body class="login-body">
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br> <br>
            <?php  
                if(isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>
            <form action="" method="POST" class="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="Enter Your Username"> <br><br>
                Password: <br>
                <input type="password" name="password" placeholder="Enter Your Password"> <br><br> 
                <input type="submit" name="submit" value="Login" class="btn-change">
            </form>
        </div>
    </body>
</html>

<?php 

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);


        if(mysqli_num_rows($result)==1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['login'] = "<div class='success'>Login Successful!</div>";
            $_SESSION['admin'] = $row['admin_id'];
            header('location:'.$home_url.'admin/');
        } 
        else {
            $_SESSION['login'] = "<div class='error'>Username or Password Did not Match :(</div>";
            header('location:'.$home_url.'admin/login.php');
        }
    }

?>