<?php 
    if(!isset($_SESSION['customer'])) {
        $_SESSION['no-login'] = "<div class = 'error text-center'>Please Login or Create an Account.</div>";
        header("location:".$home_url."index.php");
    }
?>