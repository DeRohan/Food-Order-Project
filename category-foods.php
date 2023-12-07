<?php include ('partials-usr/menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"Category"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    <section class="food-menu">
    <div class="container">
        <h2 class="text-center">Our Popular Foods!</h2>
        <?php
        $cat_id = $_GET['id'];
        $p_foods = "SELECT * FROM tbl_food WHERE cat_id = $cat_id";
        $result2 = mysqli_query($conn, $p_foods);
        $count = mysqli_num_rows($result2);
        if($count > 0) {
            while($row = mysqli_fetch_assoc($result2)) {
                $f_id = $row['id'];
                $f_title = $row['title'];
                $f_price = $row['price'];
                $f_desc = $row['description'];
                $image_name = $row['image_name'];
                $res_id = $row['res_id'];
                $res_query = "SELECT * FROM tbl_restaurants WHERE ID = $res_id";
                $res_result = mysqli_query($conn, $res_query);
                $res_row = mysqli_fetch_assoc($res_result);
                $res_name = $res_row['Name'];
                ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="<?php echo $home_url; ?>images/restaurant/<?php echo $image_name;?>" alt="<?php echo $f_title;?>" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $f_title, " - ", $res_name?></h4>
                        <p class="food-price"><?php echo $f_price;?></p>
                        <p class="food-detail">
                            <?php echo $f_desc; ?>
                        </p>
                        <br>

                        <a href="order.php?id=<?php echo $f_id;?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<div class='error'>We are new here so explore! :D</div>";
        }
        ?>
        <div class="clearfix"></div>
    </div>
    <p class="text-center">
        <a href="restaurants.php">See All Foods</a>
    </p>
</section>

<?php include ('partials-usr/footer.php');?>