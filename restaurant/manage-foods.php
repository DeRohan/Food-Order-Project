<?php include ('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h2 class="text-center">List of Cuisines</h2>
        <br>
        <a href="#" class="btn-primary">Add New Item</a>
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
                // echo "hello", $username;
        
            ?>
        </table>
    </div>
</div>
<?php include ('partials/footer.php'); ?>