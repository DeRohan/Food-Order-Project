<?php 
    include ('config/connect.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = md5($_POST['passsword']);
        
        $sql = "SELECT * FROM tbl_restaurants WHERE username = '$username' AND password = '$password' ";
        $result = mysqli_query($conn, $sql);
        echo $username, $password;
        if(mysqli_num_rows($result) == 1) {
            $_SESSION['login'] = "<div class='success'>Login Successful!</div>";
            $_SESSION['user'] = $username;
            header('location:'.$home_url.'restaurant/index.php');
        }
        // else {
        //     $_SESSION['login'] = "<div class='error'>Username or Password Did not Match :(</div>";
        //     header('location:'.$home_url.'select-option.html');
        // }

    }
?>