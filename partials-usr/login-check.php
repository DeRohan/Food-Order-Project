<?php 
    if(!isset($_SESSION['customer'])) {
        $_SESSION['no-login'] = "<div class = 'error text-center'>Please Login or Create an Account to Place an Order.</div>";
        header("location:".$home_url."index.php");
    }
?>