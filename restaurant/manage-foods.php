<?php include ('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h2 class="text-center">List of Cuisines</h2>
        <br>
        <a href="add-food.php?username=<?php echo $username;?>" class="btn-primary">Add New Item</a>
        <br><br>
        <table class="tbl-full">
            <th>Name</th>
            <th>Price</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th>
            <?php 
                $username = $_SESSION['restaurant'];
                $sql = "SELECT * FROM tbl_restaurants WHERE username = '$username' ";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_assoc($result);
                $res_id = $data['ID'];
                $sql2 = "SELECT * FROM tbl_food WHERE res_id = '$res_id'";
                $result2 = mysqli_query($conn, $sql2);
                if(mysqli_num_rows($result2) > 0) {
                    while($row = mysqli_fetch_assoc($result2)) {
                        $id = $row['ID'];
                        $name = $row['name'];
                        $price = $row['price'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        $category = $row['category_id'];
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
                                        <img src="../images/<?php echo $image_name; ?>" width="100px">
                                        <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="#" class="btn-secondary">Update Food</a>
                                <a href="#" class="btn-danger">Delete Food</a>
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