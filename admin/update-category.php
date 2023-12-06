<?php include('partials/menu.php');
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_categories WHERE cat_id = $id";
        $result = mysqli_query($conn, $sql);
        if($result == true) {
            $count = mysqli_num_rows($result);
            if($count == 1) {
                $rows = mysqli_fetch_assoc($result);
                $title = $rows['title'];
                $featured = $rows['featured'];
                $active = $rows['active'];
                $current_image = $rows['image_name'];
            } else {
                $_SESSION['no-category-found'] = "<div class='error'>Category Not Found :(</div>";
                header("location:".$home_url."admin/manage-category.php");
            }
        }
    }
    else {
        header("location:".$home_url."admin/manage-category.php");
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h2 class="text-center">Update Category Details</h2>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                        if($current_image != "") {
                            ?>
                            <img src="<?php echo $home_url; ?>images/category/<?php echo $current_image; ?>" width="100px">
                            <?php
                        } else {
                            echo "<div class='error'>Image Not Added :(</div>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured == "Yes") {
                            echo "checked";
                        } ?> type="radio" name="featured"
                            value="Yes">
                        Yes
                        <input <?php if($featured == "No") {
                            echo "checked";
                        } ?> type="radio" name="featured" value="No">
                        No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active == "Yes") {
                            echo "checked";
                        } ?> type="radio" name="active" value="Yes">
                        Yes
                        <input <?php if($active == "No") {
                            echo "checked";
                        } ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if(isset($_POST['submit'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];
            $current_image = $_POST['current_image'];
            
            if(isset($_FILES['image']['name']) && $_FILES['image']['error']==UPLOAD_ERR_OK) {
                $image_name = $_FILES['image']['name'];

                if($image_name!="") {
                    if (!is_dir("../images/category")) {
                        mkdir("../images/category", 0777, true);
                    }
                    $ext = explode('.', $image_name);
                    $ext = end($ext);
                    $image_name = "FoodHouse_".rand(000,999).".".$ext;
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/" . $image_name;
        
                    $upload = move_uploaded_file($source_path, $destination_path);
                    if ($upload == 0) {
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image :(</div>";
                        header("location:".$home_url."admin/add-category.php");
                        die();
                    }
                    if($current_image!="") {
                        $remove_path = "../images/category/" . $current_image;
                        $remove = unlink($remove_path);
                        if($remove==0) {
                            $_SESSION['failed-remove'] = "<div class='error'>Failed to Remove Current Image :(</div>";
                            header("location:".$home_url."admin/manage-category.php");
                            die();
                        
                        } 
                    }
                }
                else{
                    $image_name = "";
                }
            }
            else {
                $image_name = $current_image;
            }
            
            
            $query = "UPDATE tbl_categories SET 
                    title='$title', 
                    featured='$featured', 
                    active='$active', 
                    image_name = '$image_name' 
                    WHERE cat_id=$id";
            $result2 = mysqli_query($conn, $query);
            if($result2 == true) {
                $_SESSION['update'] = "<div class='success'>Category Updated Successfully :)</div>";
                header("location:".$home_url."admin/manage-category.php");
            } else {
                $_SESSION['update'] = "<div class='error'>Failed to Update Category :(</div>";
                header("location:".$home_url."admin/manage-category.php");
            }
        }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>