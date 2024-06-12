<?php
session_start();
// Include database connection script (assuming it's in a separate file)
require_once('../../db/dbconnect.php');

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Error handling variables
$error = false;
$errorMsg = "";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Validate title
  $title = trim($_POST['title']);
  if (empty($title)) {
    $error = true;
    $errorMsg .= "Please enter a title for your media.";
  }

  // Validate description
  $description = trim($_POST['description']);
  if (empty($description)) {
    $error = true;
    $errorMsg .= "Please enter a description for your media.";
  }

  // Validate uploaded file
  if (isset($_FILES['media']) && !empty($_FILES['media']['name'])) {
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'mp3', 'wav', 'ogg', 'mp4', 'webm', 'ogv']; // Add more extensions if needed
    $fileInfo = pathinfo($_FILES['media']['name']);
    $extension = strtolower($fileInfo['extension']);

    if (!in_array($extension, $allowedExtensions)) {
      $error = true;
      $errorMsg .= "Invalid file type. Only images, audio and video files are allowed.";
    } else {
      // Move uploaded file to a secure location 
      $targetFile = '../../assets/server/' . uniqid() . '.' . $extension;
      if (move_uploaded_file($_FILES['media']['tmp_name'], $targetFile)) {
        $media_url = $targetFile; // Update with your actual URL path if needed
      } else {
        $error = true;
        $errorMsg .= "Error uploading file.";
      }
    }
  } else {
    $error = true;
    $errorMsg .= "Please select a file to upload.";
  }

  // Insert data if no errors
  if (!$error) {
    $media_type = "";
    if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
      $media_type = 'image';
    } else if (in_array($extension, ['mp3', 'wav', 'ogg'])) {
      $media_type = 'audio';
    } else {
      $media_type = 'video';
    }

    $sql = "INSERT INTO media (user_id, media_type, media_url, description, media_title) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "issss", $user_id, $media_type, $media_url, $description, $title);

    if (mysqli_stmt_execute($stmt)) {
      // Success! Redirect to main page
      header("Location: ../main.php?page=profile");
      exit();
    } else {
      $error = true;
      $errorMsg .= "Error inserting data into database.";
    }

    mysqli_stmt_close($stmt);
  }
}

// Redirect back to upload form with error message (if any)
if ($error) {
  $encodedErrorMsg = base64_encode($errorMsg);
  header("Location: ../main.php?page=upload&msg=" . $encodedErrorMsg);
  exit();
}

// Close database connection (assuming it's done in db_connect.php)
mysqli_close($conn);

?>
