<?php 
    include ('config/connect.php');
    $sql = "DELETE FROM tbl_cart";
    $result = mysqli_query($conn, $sql);
    unset($_SESSION['customer']);
    header("location:".$home_url."index.php");
?>