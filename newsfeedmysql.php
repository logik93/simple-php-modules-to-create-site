<?php
// Connect to the database
$db = new mysqli("host", "username", "password", "database");

// Query the database for the latest news items
$result = $db->query("SELECT * FROM news ORDER BY date DESC LIMIT 10");

// Loop through the result set and display the news items
while ($row = $result->fetch_assoc()) {
  echo "<h2>" . $row["title"] . "</h2>";
  echo "<p>" . $row["body"] . "</p>";
  echo "<p><em>Posted on " . $row["date"] . "</em></p>";
}

// Close the database connection
$db->close();
