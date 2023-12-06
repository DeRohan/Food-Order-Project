<?php include ('partials/menu.php'); ?>

<?php 
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM tbl_food WHERE id = $id";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['cat_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];
    }
    else{
        header('location:'.$home_url.'restaurant/manage-foods.php');
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h2 class="text-center">Update Food Details</h2>
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
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price;?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                        
                            if($current_image=="") {
                                echo "<div class='error'>Image Not Available.</div>";
                            }
                            else {
                                ?>
                                    <img src="<?php echo $home_url;?>images/restaurant/<?php echo $current_image; ?>" width="70px">
                                <?php
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
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <?php 
                                $sql = "SELECT * FROM tbl_categories WHERE active = 'Yes'";
                                $result = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($result);
                                if($count > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $title = $row['title'];
                                        $category_id = $row['cat_id'];
                                        ?>
                                            <option <?php if($current_category==$category_id) {echo "selected";}?> value="<?php echo $category_id; ?>"><?php echo $title; ?></option>
                                        <?php
                                    }
                                }
                                else{
                                    echo "<option value='0'>Category Not Available :(</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes") {echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="No") {echo "checked";}?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes") {echo "checked";}?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active=="No") {echo "checked";}?> type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="submit" name="submit" value="Update Food" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>

        <?php 
            if(isset($_POST['submit'])) {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                if(isset($_FILES['image']['name']) && $_FILES['image']['error']==UPLOAD_ERR_OK) {
                    $image_name = $_FILES['image']['name'];

                    if($image_name!="") {
                        if(!is_dir("../images/restaurant")) {
                            mkdir("../images/restaurant", 0777, true);
                        }
                        $ext = explode('.', $image_name);
                        $ext = end($ext);
                        $image_name = "Food-Name-".rand(0000,9999).'.'.$ext; 
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/restaurant/".$image_name;
                        
                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload==0) {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload New Image :(</div>";
                            header('location:'.$home_url.'restaurant/manage-foods.php');
                            die();
                        }
                        if($current_image!="") {
                            $remove_path = "../images/restaurant/" . $current_image;
                            $remove = unlink($remove_path);
                            if($remove==0) {
                                $_SESSION['remove-failed'] = "<div class='error'>Failed to Remove Current Image :(</div>";
                                header('location:'.$home_url.'restaurant/manage-foods.php');
                                die();
                            
                            }
                        }
                    }
                    else{
                        $image_name = "";
                    }
                }
                else{
                    $image_name = $current_image;
                }

                $sql3 = "UPDATE tbl_food SET
                        title = '$title',
                        description = '$description',
                        price = $price,
                        image_name = '$image_name',
                        cat_id = $category_id,
                        featured = '$featured',
                        active = '$active'
                        WHERE id = $id
                ";

                $result3 = mysqli_query($conn, $sql3);
                if($result3==True) {
                    $_SESSION['update'] = "<div class='success'>Food Updated Successfully! :D</div>";
                    header('location:'.$home_url.'restaurant/manage-foods.php');
                }
                else {
                    $_SESSION['update'] = "<div class='error'>Failed to Update Food :(</div>";
                    header('location:'.$home_url.'restaurant/manage-foods.php');
                }
            }
        ?>
    </div>
</div>

<?php include ('partials/footer.php'); ?>