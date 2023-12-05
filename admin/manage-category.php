<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>
        <br>
        <?php
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <!-- Button To Add Category -->
        <a href="<?php echo $home_url; ?>admin/add-category.php" class="btn-primary">Add Category</a>

        <br>
        <br>
        <br><br>
        <table class="tbl-full">
            <tr>
                <th>Sr.No.</th>
                <th>Title</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Image</th>
            </tr>
            <?php 
                $sql = 'SELECT * FROM tbl_categories';
                $result = mysqli_query($conn, $sql);
                if($result==True) {
                    $count = mysqli_num_rows($result);
                    if($count>0) {
                        while($rows=mysqli_fetch_assoc($result)) {
                            $id = $rows['cat_id'];
                            $title = $rows['title'];
                            $featured = $rows['featured'];
                            $active = $rows['active'];
                            $image = $rows['image'];
                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <?php 
                                    if($image!=NULL) {
                                        ?> <td><?php echo $image; ?></td>
                                        <?php
                                    }
                                ?>
                            </tr>
                            <?php
                        }
                    }
                }
            ?>
        </table>
    </div>
</div>

<?php include('partials/footer.php') ?>