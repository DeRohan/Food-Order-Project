<!DOCTYPE html>
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
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="restaurants.php">Restaurants</a>
                    </li>
                    <li>
                        <a href="order.php">Order</a>
                    </li>
                    <li class="dropdown" onclick="toggleDropdown()">
                        <a href="#" class="account-link">Account</a>
                        <ul class="dropdown-content" id="accountDropdown">
                            <li><a href="#">Edit Details</a></li>
                            <br>
                            <li><a href="feedback.html">Feedback</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- Restaurant Section Starts Here -->
    <section class="restaurants">
        <div class="container">
            <h2 class="text-center">Explore Restaurants</h2>

            <!-- Restaurant 1 -->
            <a href="restaurant-details.html">
                <div class="box-3 float-container">
                    <img src="images/burger.jpg" alt="Restaurant 1" class="img-responsive img-curve">
                    <div class="overlay">
                        <h3>Restaurant 1</h3>
                        <p>Description of Restaurant 1 goes here.</p>
                    </div>
                </div>
            </a>

            <!-- Restaurant 2 -->
            <a href="restaurant-details.html">
                <div class="box-3 float-container">
                    <img src="images/pizza.jpg" alt="Restaurant 2" class="img-responsive img-curve">
                    <div class="overlay">
                        <h3>Restaurant 2</h3>
                        <p>Description of Restaurant 2 goes here.</p>
                    </div>
                </div>
            </a>

            <!-- Restaurant 3 -->
            <a href="restaurant-details.html">
                <div class="box-3 float-container">
                    <img src="images/momo.jpg" alt="Restaurant 3" class="img-responsive img-curve">
                    <div class="overlay">
                        <h3>Restaurant 3</h3>
                        <p>Description of Restaurant 3 goes here.</p>
                    </div>
                </div>
            </a>
             <!-- Restaurant 4 -->
             <a href="restaurant-details.html">
                <div class="box-3 float-container">
                    <img src="images/drink.jpg" alt="Restaurant 4" class="img-responsive img-curve">
                    <div class="overlay">
                        <h3>Restaurant 4</h3>
                        <p>Description of Restaurant 4 goes here.</p>
                    </div>
                </div>
            </a>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Restaurant Section Ends Here -->

<?php include ('partials-usr/footer.php');?>