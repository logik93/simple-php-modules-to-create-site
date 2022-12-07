<?php

// Define the path to the directory containing the videos
$videoDir = './videos/';

// Check if a video file has been requested
if (isset($_GET['video']) && !empty($_GET['video'])) {
  $fileName = $_GET['video'];

  // Check if the requested video exists and is in the video directory
  if (file_exists($videoDir . $fileName) && is_file($videoDir . $fileName)) {
    // Set the appropriate content type and file size headers
    header('Content-Type: video/mp4');
    header('Content-Length: ' . filesize($videoDir . $fileName));

    // Output the video file
    readfile($videoDir . $fileName);
    exit;
  } else {
    // The requested video does not exist or is not a file
    header('HTTP/1.0 404 Not Found');
    exit;
  }
}

// No video file has been requested, display a list of available videos
$videoFiles = scandir($videoDir);

foreach ($videoFiles as $file) {
  // Skip hidden files and the current and parent directories
  if (substr($file, 0, 1) == '.') {
    continue;
  }

  // Display a link to the video file
  echo '<a href="?video=' . $file . '">' . $file . '</a><br />';
}
