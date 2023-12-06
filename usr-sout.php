<?php 
    include ('config/connect.php');
    unset($_SESSION['customer']);
    header("location:".$home_url."index.php");
?>