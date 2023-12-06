<?php 
    include ('../config/connect.php');
    
    unset($_SESSION['admin']);

    header("location:".$home_url."admin/login.php")

?>