<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>
        <br>
        <!-- Button To Add Category -->
        <a href="<?php echo $home_url; ?>admin/add-category.php" class="btn-primary">Add Category</a>
        <br>
        <br>
        <?php
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['no-category-found'])) {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }
            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['failed-remove'])) {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        ?>
        <br><br>
        <table class="tbl-full">
            <tr>
                <th>Sr.No.</th>
                <th>Title</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = 'SELECT * FROM tbl_categories';
            $result = mysqli_query($conn, $sql);
            if($result == True) {
                $count = mysqli_num_rows($result);
                if($count > 0) {
                    while($rows = mysqli_fetch_assoc($result)) {
                        $id = $rows['cat_id'];
                        $title = $rows['title'];
                        $featured = $rows['featured'];
                        $active = $rows['active'];
                        $image = $rows['image_name'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $id; ?>
                            </td>
                            <td>
                                <?php echo $title; ?>
                            </td>
                            <td>
                                <?php echo $featured; ?>
                            </td>
                            <td>
                                <?php echo $active; ?>
                            </td>
                            <?php
                                if($image != '') {
                                    ?>
                                    <td>
                                        <img src="<?php echo $home_url; ?>images/category/<?php echo $image; ?>" width="100px">
                                    </td>
                                    <?php
                                } else {
                                    ?>
                                    <td>
                                        <div class="error">Image Not Added</div>
                                    </td>
                                    <?php
                                }
                            ?>
                            <td>
                                <a href="update-category.php?id=<?php echo $id;?>" class="btn-secondary">Update
                                    Category
                                </a>
                                
                                <a href="delete-category.php?id=<?php echo $id;?>" class="btn-danger">Delete Category</a>
                            </td>
                            <?php
                    }
                }
            }
            ?>
            </tr>
        </table>
    </div>
</div>

<?php include('partials/footer.php') ?>