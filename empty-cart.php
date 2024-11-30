<?php 
    include('config/connect.php');

    $sql = "DELETE FROM tbl_cart";
    $result = mysqli_query($conn, $sql);
    // header("location:".$home_url);
    echo "<script>window.location.href='" . $home_url . "index.php';</script>";
?>