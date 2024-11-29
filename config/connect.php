<?php

    session_start();

    $db_username = "rohan";
    $server_password = "Admin123";
    $db_name = "food-order";
    $home_url = "https://thefoodhouse-dbdzf2ematahbfg0.canadacentral-01.azurewebsites.net/";
    $host = "food-house.mysql.database.azure.com";
    $conn = mysqli_connect($host, $db_username, $server_password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $db_select = mysqli_select_db($conn, $db_name);

    if (!$db_select) {
        die("Database selection failed: " . mysqli_error($conn));
    }

?>


<?php
    session_start();

    // Cosmos DB credentials
    $account_url = "https://food-house.documents.azure.com:443/";
    $primary_key = "appWPJpDsESTD3cwkqMsz3MFRqv8QFnHk7BXBWlbSHE1GwwJZMaxGLHqG8zYId1PPs4l77zgjWhzACDbMiWhXQ==";
    $database_id = "food-order"; // Same as your MySQL database name
    $collection_id = "tbl_users";  // Replace with your Cosmos DB collection name
    $home_url = "https://thefoodhouse-dbdzf2ematahbfg0.canadacentral-01.azurewebsites.net/";

    // Function to send requests to Cosmos DB
    function cosmos_request($url, $method = "GET", $body = null) {
        global $primary_key;

        // Set headers for authentication
        $headers = [
            "Authorization: " . $primary_key,
            "x-ms-date: " . gmdate('D, d M Y H:i:s T'),
            "x-ms-version: 2018-12-31",
            "Content-Type: application/json"
        ];

        // Initialize cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        if ($body) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        }

        // Execute request and handle errors
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            die("cURL Error: " . curl_error($ch));
        }
        curl_close($ch);

        return json_decode($response, true);
    }

    // Test connection
    $db_url = $account_url . "dbs/$database_id/colls/$collection_id/docs";
    $response = cosmos_request($db_url);

    if (!$response) {
        die("Connection to Cosmos DB failed.");
    }

    echo "Connected to Cosmos DB successfully!";
?>