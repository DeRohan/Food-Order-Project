<?php 
    include('../config/connect.php'); 
    include('login-check.php'); 
?>

<html>
    <head>
        <title>Food Ordering Website - Home Page</title>
        <link rel="stylesheet" href="../css/rest.css">
    </head>

    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="manage-foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="manage-categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="manage-orders.php">Orders</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            
        </div>
        <!-- Menu Section Ends -->