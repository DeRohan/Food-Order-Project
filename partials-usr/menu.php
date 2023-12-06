<?php
    include ('config/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo $home_url; ?>index.php" title="Logo">
                    <img src="images/tr_logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo $home_url; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo $home_url;?>restaurants.php">Restaurants</a>
                    </li>
                    <li class="dropdown" onclick="toggleDropdown()">
                        <a href="#" class="account-link">Account</a>
                        <ul class="dropdown-content" id="accountDropdown">
                            <?php if(isset($_SESSION['customer'])) {
                                ?>
                                <li><a href="usr-update.php">Edit Details</a></li>
                                <br>
                                <?php
                            }
                            ?>
                            <li><a href="<?php echo $home_url; ?>feedback.php">Feedback</a></li>
                            <li>
                                <?php 
                                    if(isset($_SESSION['customer'])) {
                                        echo '<a href="'.$home_url.'usr-sout.php">Sign Out</a>';
                                    } else {
                                        echo '<a href="'.$home_url.'select-option.php">Login/Sign Up</a>';
                                    }
                                ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onclick="toggleCart()">Cart</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <section class="cart" id="cartSection">
        <div class="container">
            <!-- Cart items will be displayed here -->
        </div>
    </section>

    <script src="js/cart.js"></script> <!-- Add this line for the cart functionality -->
</body>

</html>
