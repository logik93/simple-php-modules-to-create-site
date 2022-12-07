<?php

// connect to MySQL
$db = mysqli_connect('localhost', 'username', 'password', 'database_name');

// get the categories from the database
$query = "SELECT * FROM categories";
$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_array($result)) {
  // display the categories
  echo "<h2>" . $row['name'] . "</h2>";

  // get the pages from this category
  $query = "SELECT * FROM pages WHERE category_id = " . $row['id'];
  $pages = mysqli_query($db, $query);

  while ($page = mysqli_fetch_array($pages)) {
    // display the pages
    echo "<h3>" . $page['title'] . "</h3>";
    echo "<p>" . $page['content'] . "</p>";
  }
}

?>
