<?php 
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_users WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result==true) {
        $_SESSION['delete'] = "<div class='success'>User Deleted Successfully! :D</div>";
        header("location:" .$home_url.'admin/manage-users.php');
    }
    else{
        $_SESSION['delete'] = "<div class='error'>Failed to Delete User! :(</div>";
        header("location:" .$home_url.'admin/manage-users.php');
    }
?>