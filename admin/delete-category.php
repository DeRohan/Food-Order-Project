<?php 
    include ('../config/connect.php');
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM tbl_categories WHERE cat_id = $id";
        $result = mysqli_query($conn, $sql);
        if($result == true) {
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully! :D</div>";
            header("location:".$home_url."admin/manage-category.php");
        } else {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category :(</div>";
            header("location:".$home_url."admin/manage-category.php");
        }
    }
?>