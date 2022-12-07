<?php

// Check if the user has granted permission to access the camera
if (isset($_POST['allow_camera_access']) && $_POST['allow_camera_access'] == 1) {

  // Get the image data from the camera
  $imgData = $_POST['image_data'];

  // Save the image to a file
  $fileName = 'photo.png';
  $filePath = './photos/' . $fileName;
  file_put_contents($filePath, base64_decode($imgData));

  // Redirect the user to the photo gallery
  header('Location: ./photo_gallery.php');
} else {
  // Display a form asking the user to grant permission to access the camera
  ?>
  <form method="post">
    <input type="hidden" name="allow_camera_access" value="1" />
    <input type="submit" value="Allow Camera Access" />
  </form>
  <?php
}
