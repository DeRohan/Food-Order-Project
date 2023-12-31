<?php include ('partials/menu.php'); 
    $username = $_SESSION['restaurant'];
    $sql = "SELECT * FROM tbl_restaurants WHERE username = '$username' ";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    $res_id = $data['ID'];
?>

<div class="main-content">
    <div class="wrapper" style="width: 75%;">
        <h2 class="text-center">List of Cuisines</h2>
        <br>
        <a href="add-food.php?id=<?php echo $res_id;?>" class="btn-primary">Add New Item</a>
        <br><br>
        <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>
        <table class="tbl-full">
            <th>Name</th>
            <th>Price</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th>
            <?php 

                $sql2 = "SELECT * FROM tbl_food WHERE res_id = '$res_id'";
                $result2 = mysqli_query($conn, $sql2);
                if(mysqli_num_rows($result2) > 0) {
                    while($row = mysqli_fetch_assoc($result2)) {
                        $id = $row['id'];
                        $name = $row['title'];
                        $price = $row['price'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        $category = $row['cat_id'];
                        $cat_sql = "SELECT title FROM tbl_categories where cat_id = $category";
                        $cat_result = mysqli_query($conn, $cat_sql);
                        $cat_row = mysqli_fetch_assoc($cat_result);
                        $category = $cat_row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        <tr>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td><?php echo $category; ?></td>
                            <td>
                                <?php 
                                    if($image_name == "") {
                                        echo "<div class='error'>Image Not Added.</div>";
                                    }
                                    else {
                                        ?>
                                        <img src="../images/restaurant/<?php echo $image_name; ?>" width="100px">
                                        <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="update-food.php?id=<?php echo $id;?>" class="btn-secondary">Update Food</a>
                                <a href="delete-foods.php?id=<?php echo $id;?>" class="btn-danger">Delete Food</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                else {
                    echo "<tr><td colspan='7' class='error'>No Food Added.</td></tr>";
                }
            ?>
        </table>
    </div>
</div>
<?php include ('partials/footer.php'); ?>