<?php 
    
    if(!isset($_SESSION['restaurant'])) {
        $_SESSION['no-login-message'] = "<div class='error'>Please Login to Access Admin Panel.</div>";
        header('location:'.$home_url.'select-option.php');
    }

?>