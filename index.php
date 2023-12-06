<?php include('partials-usr/menu.php') ?>
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
<?php 
    if(isset($_SESSION['no-login'])) {
        echo $_SESSION['no-login'];
        unset($_SESSION['no-login']);
    }
    if(isset($_SESSION['order'])) {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
?>
<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Different Categories!</h2>

        <?php
        $sql = "SELECT * FROM tbl_categories WHERE featured = 'Yes' AND active = 'Yes' ";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row['cat_id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                ?>
                <a href="category-foods.php">
                    <div class="box-3 float-container">
                        <?php
                        if($image_name == "") {
                            echo "<div class='error'> Image Not Avaialble</div>";
                        } else {
                            ?>
                            <img src="<?php echo $home_url; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>"
                                class="img-responsive">
                            <?php
                        }
                        ?>
                        <h3 class="float-text text-white">
                            <?php echo $title; ?>
                        </h3>
                    </div>
                </a>
                <?php
            }
        } else {
            echo "<div class='error'>No Categories Available.</div>";
        }
        ?>
        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Our Popular Foods!</h2>
        <?php
        $p_foods = "SELECT * FROM tbl_food WHERE featured = 'Yes' AND active = 'Yes'";
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
<!-- fOOD Menu Section Ends Here -->
<?php include('partials-usr/footer.php') ?>