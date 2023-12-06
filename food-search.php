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
                ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
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