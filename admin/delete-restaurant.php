<?php include ('../config/connect.php'); 

    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_restaurants WHERE ID = $id";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $_SESSION['delete'] = "<div class='success'>Restaurant Deleted Successfully!</div>";
        header('location:'. $home_url . 'admin/manage-restaurants.php');
    }
    else {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Restaurant!</div>";
        header('location:'. $home_url . 'admin/manage-restaurants.php');
    }

?>