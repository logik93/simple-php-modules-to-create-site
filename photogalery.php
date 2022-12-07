<?php

// Define the path to the directory containing the photos
$photoDir = './photos/';

// Get a list of the files in the photo directory
$photoFiles = scandir($photoDir);

// Loop through the files and display them as a gallery of images
foreach ($photoFiles as $file) {
  // Skip hidden files and the current and parent directories
  if (substr($file, 0, 1) == '.') {
    continue;
  }

  // Display the image
  echo '<img src="' . $photoDir . $file . '" alt="' . $file . '" />';
}
