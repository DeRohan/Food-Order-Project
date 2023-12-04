<?php 
    include('../config/connect.php');
    //confirm if they want to delete the admin

    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_admin WHERE admin_id=$id";
    $result = mysqli_query($conn, $sql);
    if($result==true) {
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Succesfully!</div>";
        header("location:" .$home_url.'admin/admin-panel.php');
    }
    else{
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin!</div>";
        header("location:" .$home_url.'admin/admin-panel.php');
    }
?>