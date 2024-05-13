<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "tntbooking_tes1";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);

    // Check connection
    if ($conn->connect_error) {
        die("kết nối thất bại" . $conn->connect_error);
    }
?>