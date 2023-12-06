<?php include('partials-usr/menu.php');
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_restaurants WHERE ID = $id";
    $result = mysqli_query($conn, $sql);
    if($result == true) {
        $count = mysqli_num_rows($result);
        if($count == 1) {
            $rows = mysqli_fetch_assoc($result);
            $title = $rows['Name'];
            $description = $rows['Description'];
            $current_image = $rows['image_name'];
        } else {
            $_SESSION['no-restaurant-found'] = "<div class='error'>Restaurant Not Found :(</div>";
            header("location:".$home_url."restaurants.php");
        }
    }
} else {
    header("location:".$home_url."restaurants.php");
}
?>

<section class="food-search text-center">
    <div class="container">

        <form action="food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Restaurant.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>

<!-- Restaurant Menu -->

<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        $foods = "SELECT * FROM tbl_food WHERE res_id = $id AND active = 'Yes'";
        $result = mysqli_query($conn, $foods);
        $count = mysqli_num_rows($result);
        if($count > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $f_title = $row['title'];
                $f_price = $row['price'];
                $f_desc = $row['description'];
                $image_name = $row['image_name'];
                ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="<?php echo $home_url; ?>images/restaurant/<?php echo $image_name; ?>"
                            alt="<?php echo $f_title; ?>" class="img-responsive img-curve">
                    </div>
                    <div class="food-menu-desc">
                        <h4><?php echo $f_title;?></h4>
                        <p class="food-price"><?php echo $f_price;?></p>
                        <p class="food-detail">
                            <?php echo $f_desc;?>
                        </p>
                        <br>

                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                <?php
            }
        } else {
            echo "<div class='error'>Sorry! We are out of Yummy Foods :(</div>";
        }
        ?>
        </div>
        <div class="clearfix"></div>
    </div>

</section>
<!-- Restaurant Menu Ends Here -->


<?php include('partials-usr/footer.php'); ?>