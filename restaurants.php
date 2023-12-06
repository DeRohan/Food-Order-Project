<!DOCTYPE html>
<?php include('partials-usr/menu.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .box-3 {
            position: relative;
            overflow: hidden;
        }

        .box-3 img {
            transition: transform 0.3s ease-in-out;
        }

        .box-3 .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            z-index: 1;
        }

        .box-3:hover img {
            transform: scale(1.1);
        }

        .box-3:hover .overlay {
            opacity: 1;
        }

        .overlay h3,
        .overlay p {
            margin: 0;
            padding: 5px;
        }
    </style>
</head>
<body>
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Restaurant.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>

    <!-- Restaurant Section Starts Here -->
    <section class="restaurants">
        <div class="container">
            <h2 class="text-center">Explore Restaurants</h2>
            <?php 
                $sql = "SELECT * FROM tbl_restaurants";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);

                if($count > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['ID'];
                        $title = $row['Name'];
                        $description = $row['Description'];
                        $image_name = $row['image_name'];
                        ?>
                            <a href="restaurant-details.php">
                                <div class="box-3 float-container">
                                    <?php
                                    if($image_name===NULL) {
                                        ?>
                                        <img src="<?php echo $home_url; ?>images/restaurant/restaurant_default.jpg" alt="Restaurant Image" class="img-responsive img-curve">
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <img src="<?php echo $home_url;?>images/restaurant/<?php echo $image_name;?>" alt="Restaurant Image" class="img-responsive img-curve">
                                        <?php
                                    }
                                    ?>
                                    <div class="overlay">
                                        <h3> <?php echo $title; ?></h3>
                                        <p> <?php echo $description; ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php
                    }
                }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Restaurant Section Ends Here -->

<?php include ('partials-usr/footer.php');?>