<?php 
    include ('../config/connect.php');
    
    session_destroy();

    header("location:".$home_url."admin/login.php")

?>