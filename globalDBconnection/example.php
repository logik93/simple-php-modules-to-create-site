<?php

// Include the database connection file
include 'db_connect.php';

// Select all rows from the users table
$result = $conn->query('SELECT * FROM users');

// Loop through the rows and output their values
while ($row = $result->fetch_assoc()) {
    echo $row['username'] . '<br>';
}

