<?php 
    
    if(!isset($_SESSION['admin'])) {
        $_SESSION['no-login-message'] = "<div class='error'>Please Login to Access Admin Panel.</div>";
        // header('location:'.$home_url.'admin/login.php');
        echo "<script>window.location.href='" . $home_url . "admin/login.php';</script>";
    }

?>