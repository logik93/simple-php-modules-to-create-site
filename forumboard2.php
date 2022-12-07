<?php
//connect to database
$mysqli = new mysqli("localhost", "username", "password", "database");

//check for connection errors
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

//check for form submission
if (isset($_POST['submit'])) {
  //get form data
  $username = $_POST['username'];
  $date = date("Y-m-d H:i:s");
  $postid = uniqid();
  $message = $_POST['message'];
  
  //insert data into database
  $query = "INSERT INTO forum (username, date, postid, message) VALUES ('$username', '$date', '$postid', '$message')";
  $result = $mysqli->query($query);
  
  //check for query errors
  if (!$result) {
    printf("Error: %s\n", $mysqli->error);
    exit();
  }
  
  //success message
  echo "Your message has been posted!";
}

//display forum board
$query = "SELECT * FROM forum ORDER BY date DESC";
$result = $mysqli->query($query);

//check for query errors
if (!$result) {
  printf("Error: %s\n", $mysqli->error);
  exit();
}

//display forum posts
echo "<h2>Forum Board</h2>";
while ($row = $result->fetch_assoc()) {
  echo "<h4>Username: " . $row['username'] . "</h4>";
  echo "<p>Date: " . $row['date'] . "</p>";
  echo "<p>Post ID: " . $row['postid'] . "</p>";
  echo "<p>Message: " . $row['message'] . "</p>";
}

//form to submit new forum posts
echo "<h2>Post a message</h2>";
echo "<form method='post'>";
echo "<p>Username: <input type='text' name='username'></p>";
echo "<p>Message: <textarea name='message'></textarea></p>";
echo "<input type='submit' name='submit' value='Submit'>";
echo "</form>";

//close database connection
$mysqli->close();
?>