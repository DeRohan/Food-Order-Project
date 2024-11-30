<?php include ('partials-usr/menu.php');?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <form action="food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        // Example: Fetching food items from the database
        $sql = "SELECT * FROM tbl_food";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $f_title = $row['title'];
                $f_price = $row['price'];
                $f_description = $row['description'];
                $image_name = $row['image_name'];
                
                // Construct the Azure Blob Storage URL (Replace with actual storage account and container name)
                $azure_blob_url = "https://thefoodhouse94a9.blob.core.windows.net/images/" . $image_name;
                ?>

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <!-- Update image src to Azure Blob Storage URL -->
                        <img src="<?php echo $azure_blob_url; ?>" alt="<?php echo $f_title; ?>" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $f_title; ?></h4>
                        <p class="food-price"><?php echo "$" . $f_price; ?></p>
                        <p class="food-detail">
                            <?php echo $f_description; ?>
                        </p>
                        <br>

                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>

                <?php
            }
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- fOOD Menu Section Ends Here -->

<?php include ('partials-usr/footer.php');?>