
<?php

// Connect to the MySQL database
$db_host = "localhost";
$db_username = "username";
$db_password = "password";
$db_name = "database_name";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Escape special characters to prevent SQL injection
  $username = $conn->real_escape_string($_POST['username']);
  $data = $conn->real_escape_string($_POST['data']);

  // Insert the data into the MySQL database
  $sql = "INSERT INTO forum_board (username, data) VALUES ('$username', '$data')";
  $conn->query($sql);
}

// Retrieve the data from the MySQL database
$sql = "SELECT * FROM forum_board";
$result = $conn->query($sql);

// Loop through the data and display it
while ($row = $result->fetch_assoc()) {
  echo "<p>Username: " . $row['username'] . "</p>";
  echo "<p>Data: " . $row['data'] . "</p>";
  echo "<p>Post ID: " . $row['postid'] . "</p>";
  echo "<hr>";
}

// Close the MySQL connection
$conn->close();

?>

