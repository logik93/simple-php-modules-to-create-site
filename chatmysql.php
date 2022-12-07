<?php

// connect to MySQL
$db = mysqli_connect('localhost', 'username', 'password', 'database_name');

if (isset($_POST['submit'])) {
  // get the user input
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $message = mysqli_real_escape_string($db, $_POST['message']);

  // insert the chat message into the database
  $query = "INSERT INTO chatbox (username, message) VALUES ('$username', '$message')";
  mysqli_query($db, $query);
}

// get the chat messages from the database
$query = "SELECT * FROM chatbox ORDER BY id ASC";
$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_array($result)) {
  // display the chat messages
  echo "<p><strong>" . $row['username'] . ":</strong> " . $row['message'] . "</p>";
}

?>

<form method="post" action="">
  <label for="username">Username:</label>
  <input type="text" name="username" id="username" />
  <br />
  <label for="message">Message:</label>
  <input type="text" name="message" id="message" />
  <br />
  <input type="submit" name="submit" value="Submit" />
</form>
