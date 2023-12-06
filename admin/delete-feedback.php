<?php 
    include('../config/connect.php');
    if(isset($_GET['fd_id'])) {
        $id = $_GET['fd_id'];
        $delete_fd = "DELETE FROM tbl_feedback WHERE id = $id";
        $delete_fd_result = mysqli_query($conn, $delete_fd);
        if($delete_fd_result) {
            $_SESSION['delete'] = "<div class='success'>Feedback Deleted Successfully (Nerd) <__></div>";
            header('location:'.$home_url.'admin/manage-feedback.php');
        } else {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Feedback (Get Good) :(</div>";
            header('location:'.$home_url.'admin/manage-feedback.php');
        }
    }
?>