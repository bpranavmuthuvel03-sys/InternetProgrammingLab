<?php

$host = "localhost";
$user = "root";
$password = "Monika@2006";
$database = "shopping_friend_db";

$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_errno) {
    die("Database connection failed: " . $connection->connect_error);
}

?>