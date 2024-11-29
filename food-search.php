<?php include('partials-usr/menu.php'); 
        $search = $_POST['search'];
?>

<!-- Food sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search; ?></a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php

        $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $f_title = $row['title'];
                $f_price = $row['price'];
                $desc = $row['description'];
                $image_name = $row['image_name'];

                $res_id = $row['res_id'];
                $res_query = "SELECT * FROM tbl_restaurants WHERE ID = $res_id";
                $res_result = mysqli_query($conn, $res_query);
                $res_row = mysqli_fetch_assoc($res_result);
                $res_name = $res_row['Name'];
                $sas_token = "sp=r&st=2024-11-29T15:55:23Z&se=2024-12-04T23:55:23Z&sv=2022-11-02&sr=c&sig=rdsRcK6vUfxfbO84ExIggwcvEKQ5DiwZ5FTjI%2BTxLU4%3D";
                // Construct the Azure Blob Storage URL
                $azure_blob_url = "https://thefoodhouse94a9.blob.core.windows.net/images/" . $image_name . "?" . $sas_token;
                ?>
                
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="<?php echo $azure_blob_url; ?>" alt=<?php echo $f_title; ?> class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $f_title, " - ", $res_name;?></h4>
                        <p class="food-price"><?php echo $f_price;?></p>
                        <p class="food-detail">
                            <?php echo $desc; ?>
                        </p>
                        <br>

                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
                <?php
            }
        }
        else {
            echo "<div class='error'>No Food Found. Try Another Food :(</div>";
        
        }
        ?>
        <div class="clearfix"></div>
    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-usr/footer.php'); ?>