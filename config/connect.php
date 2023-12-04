<?php

    session_start();

    $db_username = "root";
    $server_password = "";
    $db_name = "food-order";
    $home_url = "http://localhost/food-order-project/";
    $conn = mysqli_connect('localhost', $db_username, $server_password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $db_select = mysqli_select_db($conn, $db_name);

    if (!$db_select) {
        die("Database selection failed: " . mysqli_error($conn));
    }

?>