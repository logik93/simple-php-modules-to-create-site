<!DOCTYPE html>
<html>
<head>
  <title>Dark Mode Switch</title>

  <?php
  // Check if "dark_mode" is set in the URL query string.
  if (isset($_GET['dark_mode'])) {
    // Set a cookie to remember that dark mode is enabled.
    setcookie('dark_mode', 'enabled', time() + (86400 * 30), "/");

    // Add a CSS class to the body element to enable dark mode styles.
    echo '<style>body { class="dark-mode"; }</style>';
  } else {
    // Check if "dark_mode" cookie is set.
    if (isset($_COOKIE['dark_mode'])) {
      // Add a CSS class to the body element to enable dark mode styles.
      echo '<style>body { class="dark-mode"; }</style>';
    }
  }
  ?>

</head>
<body>
  <h1>Dark Mode Switch</h1>

  <?php
  // Check if "dark_mode" cookie is set.
  if (isset($_COOKIE['dark_mode'])) {
    // If the cookie is set, show a message that dark mode is enabled.
    echo '<p>Dark mode is enabled. <a href="?dark_mode=0">Disable dark mode</a></p>';
  } else {
    // If the cookie is not set, show a message that dark mode is disabled.
    echo '<p>Dark mode is disabled. <a href="?dark_mode=1">Enable dark mode</a></p>';
  }
  ?>
</body>
</html>
