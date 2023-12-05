<?php include ('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h2 class="text-center">Add New Food</h2>
        <?php 
            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <br>
        <form action="" method="POST" enctype="multipart/form-data" id="statusForm">
            <table class="tbl-30">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="name" placeholder="Food Name">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Food Description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
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
                                        $id = $row['ID'];
                                        $title = $row['title'];
                                        ?>
                                        <option value="<?php echo $title; ?>"><?php echo $title; ?></option>
                                        <?php
                                    }
                                }
                                else {
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <td>
                    <input type="submit" name="submit" value="Add Item" class="btn-primary">
                </td>
            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php'); ?>
<?php 
    if(isset($_POST['submit'])) {
        $res_id = $_GET['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        if(isset($_POST['featured'])) {
            $featured = $_POST['featured'];
        }
        else {
            $featured = "No";
        }
        if(isset($_POST['active'])) {
            $active = $_POST['active'];
        }
        else {
            $active = "No";
        }
        if(isset($_FILES['image']['name'])) {
            $image_name = $_FILES['image']['name'];
            if($image_name != "") {
                $ext = explode('.', $image_name);
                $ext = end($ext);
                $image_name = "Food-Name-".rand(0000, 9999).".".$ext;
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "images/".$image_name;
                $upload = move_uploaded_file($source_path, $destination_path);
                // if($upload == false) {
                //     $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                //     header('location:'.$home_url.'restaurant/add-food.php');
                //     die();
                // }
            }
        }
        else {
            $image_name = "";
        }
        //Fetch Category ID
        $sql_category = "SELECT * FROM tbl_categories WHERE title = '$category'";
        $result_category = mysqli_query($conn, $sql_category);
        $data_category = mysqli_fetch_assoc($result_category);
        $cat_id = $data_category['cat_id'];
        //Insert Food into the Database
        $sql = "INSERT INTO tbl_food SET
            title = '$name',
            description = '$description',
            price = '$price',
            image_name = '$image_name',
            cat_id = $cat_id,
            featured = '$featured',
            active = '$active',
            res_id = $res_id
        ";
        $result = mysqli_query($conn, $sql);
        if($result == true) {
            $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
            header('location:'.$home_url.'restaurant/manage-foods.php');
        }
        else {
            $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
            header('location:'.$home_url.'restaurant/manage-foods.php');
        }
    }
?>