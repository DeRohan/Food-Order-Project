<?php
    include ('config/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
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
                    <li>
                        <a href="<?php echo $home_url;?>order.php">Order</a>
                    </li>
                    <li class="dropdown" onclick="toggleDropdown()">
                        <a href="#" class="account-link">Account</a>
                        <ul class="dropdown-content" id="accountDropdown">
                            <li><a href="#">Edit Details</a></li>
                            <br>
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
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->