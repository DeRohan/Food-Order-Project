<?php 
    
    if(!isset($_SESSION['user'])) {
        $_SESSION['no-login-message'] = "<div class='error'>Please Login to Access Admin Panel.</div>";
        header('location:'.$home_url.'admin/login.php');
    }

?>