<?php 
    include('../config/connect.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_food WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result == true) {
        $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully! :D</div>";
        header("location:" . $home_url . "restaurant/manage-foods.php");
    }
    else {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Food :(</div>";
        header("location:" . $home_url . "restaurant/manage-foods.php");
    }
?>