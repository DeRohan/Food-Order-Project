<?php 
    include ('../config/connect.php');
    //Delete order using get id
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_orders WHERE order_id = $id";
    $result = mysqli_query($conn, $sql);
    if($result==true) {
        $_SESSION['delete'] = "<div class='success'>Order Deleted Succesfully!</div>";
        header("location:" .$home_url.'admin/manage-orders.php');
    }
    else{
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Order!</div>";
        header("location:" .$home_url.'admin/manage-orders.php');
    }
?>