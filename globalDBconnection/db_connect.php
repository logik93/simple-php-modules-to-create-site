<?php

// Replace these values with your own database credentials
$host = 'localhost';
$user = 'username';
$password = 'password';
$database = 'database_name';

// Connect to the database
$conn = new mysqli($host, $user, $password, $database);

// Check for errors
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

