<?php
session_start();
// Include database connection script (assuming it's in a separate file)
require_once('../../db/dbconnect.php');

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Error handling variables
$error = false;
$errorMsg = "";
$has_profile = false;

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Validate event name
  $ename = trim($_POST['ename']);
  
  if (empty($ename)) {
    $error = true;
    $errorMsg .= "Please enter a name of your event.";
  }

  // Validate description
  $description = trim($_POST['description']);
  if (empty($description)) {
    $error = true;
    $errorMsg .= "Please enter a description for your event.";
  }
  // Validate location
  $location = trim($_POST['location']);
  if (empty($description)) {
    $error = true;
    $errorMsg .= "Please enter a location where your event will done.";
  }
  // Validate start_date
  $start_date = trim($_POST['start_date']);
  if (empty($description)) {
    $error = true;
    $errorMsg .= "Please enter a date when your event will start.";
  }
  // Validate end_date
  $end_date = trim($_POST['end_date']);
  if (empty($description)) {
    $error = true;
    $errorMsg .= "Please enter a date when your event will end.";
  }
  // Validate audience
  $audience = trim($_POST['audience']);
  if (empty($description)) {
    $error = true;
    $errorMsg .= "Please you have to choose an audience.";
  }

  // Validate uploaded file
  if (isset($_FILES['media']) && !empty($_FILES['media']['name'])) {
    $has_profile = true;
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'mp3', 'wav', 'ogg', 'mp4', 'webm', 'ogv', 'm4a']; // Add more extensions if needed
    $fileInfo = pathinfo($_FILES['media']['name']);
    $extension = strtolower($fileInfo['extension']);

    if (!in_array($extension, $allowedExtensions)){
      $error = true;
      $errorMsg .= "Invalid file type. Only images, audio, and video files are allowed.";
    } else {
      // Validate file size (max 15 MB)
      $maxFileSize = 25 * 1024 * 1024; // 15 MB in bytes
      if ($_FILES['media']['size'] > $maxFileSize) {
        $error = true;
        $errorMsg .= "File size should not exceed 25 MB.";
      } else {
        // Move uploaded file to a secure location 
        $targetFile = '../../assets/server/' . uniqid() . '.' . $extension;
        if (move_uploaded_file($_FILES['media']['tmp_name'], $targetFile)) {
          // Validate file length for audio and video (less than 1 minute)
          $media_url = $targetFile; // Update with your actual URL path if needed

          if (in_array($extension, ['mp3', 'wav', 'ogg', 'm4a', 'mp4', 'webm', 'ogv'])) {
            // Get media duration using ffmpeg
            $output = shell_exec("ffmpeg -i " . escapeshellarg($targetFile) . " 2>&1");
            if (preg_match('/Duration: (\d{2}):(\d{2}):(\d{2})\.(\d{2})/', $output, $matches)) {
              $hours = $matches[1];
              $minutes = $matches[2];
              $seconds = $matches[3];
              $totalSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;

              if ($totalSeconds > 240) {
                $error = true;
                $errorMsg .= "Audio and video files must be less than 4 minute in length.";
              }
            } else {
              $error = true;
              $errorMsg .= "Error retrieving media duration.";
            }
          }
        } else {
          $error = true;
          $errorMsg .= "Error uploading file.";
        }
      }
    }
  } else {
    $has_profile = false;
    // $error = true;
    // $errorMsg .= "Please select a file to upload.";
    $sql = "INSERT INTO events (event_name, description, location, start_date, end_date, audience, user_id)
    VALUES (?, ?, ?, ?, ?,?,?)";
   $stmt = mysqli_prepare($conn, $sql);

   mysqli_stmt_bind_param($stmt, "sssssss", $ename,$description,$location,$start_date, $end_date,$audience,$user_id);

   if (mysqli_stmt_execute($stmt)) {
     // Success! Redirect to main page
     header("Location: ../main.php?page=addevent&&status=success");
     exit();
   } else {
     $error = true;
     $errorMsg .= "Error inserting data into database.";
   }

   mysqli_stmt_close($stmt);
  }

  // Insert data if no errors
  if (!$error && $has_profile) {
    $media_type = "";
    if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
      $media_type = 'image';
    } else if (in_array($extension, ['mp3', 'wav', 'ogg', 'm4a'])) {
      $media_type = 'audio';
    } else {
      $media_type = 'video';
    }

    $sql = "INSERT INTO events (event_name, description, location, start_date, end_date, audience, user_id,profile,profile_type)
     VALUES (?, ?, ?, ?, ?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sssssssss", $ename,$description,$location,$start_date, $end_date,$audience,$user_id, $media_url,$media_type);

    if (mysqli_stmt_execute($stmt)) {
      // Success! Redirect to main page
      header("Location: ../main.php?page=addevent&&status=success");
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
  header("Location: ../main.php?page=addevent&msg=" . $encodedErrorMsg);
  exit();
}

// Close database connection (assuming it's done in db_connect.php)
mysqli_close($conn);
?>
