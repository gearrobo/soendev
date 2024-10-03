<?php

    $servername = "localhost";
    $username = "soey7928_monsis";
    $password = "adminit2024";
    $db="soey7928_satkomproject";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>