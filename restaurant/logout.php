<?php 
    include ('../config/connect.php');
    unset($_SESSION['restaurant']);
    header("location:".$home_url."/select-option.php")
?>