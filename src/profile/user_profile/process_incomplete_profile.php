<?php
session_start();
$id = $_SESSION['user_id'];
require_once("../../db/dbconnect.php");
// Function to handle errors and redirect with a message
function redirect_with_error($message) {
    $encoded_message = base64_encode($message);
    header("Location: ../main.php?page=profile&&msg=$encoded_message");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $fullname = $_POST['fullname'] ?? '';
    $birthdate = $_POST['birthdate'] ?? '';
    $location = $_POST['location'] ?? '';
    $address = $_POST['address'] ?? '';
    $talent = $_POST['talent'] ?? '';
    $myfile = $_FILES['profile'] ?? null;

    // Basic validation
    if (empty($username) || empty($fullname) || empty($birthdate) || empty($location) || empty($address) || empty($talent)) {
        redirect_with_error('Please fill in all required fields.');
    }

    // Handle file upload
    $fileSource = $myfile['tmp_name'];
    $name = $myfile['name'];
    $ext = explode('.',$name);
    $actualExt = strtolower(end($ext));
    $uid = uniqid(true, $name).'.'.$actualExt;
    $destination = "../../assets/server/".$uid;
    move_uploaded_file($fileSource, $destination);
   

   
    $stmt = "UPDATE users SET 
            username = '$username', 
            fullname = '$fullname', 
            date_of_birth = '$birthdate', 
            place_of_birth = '$location', 
            users.profile = '$destination', 
            current_address = '$address', 
            type_of_talent = '$talent', 
            status = 'complete' 
         WHERE user_id = $id";
$smt_query = mysqli_query($conn, $stmt);


    // Execute the statement
    if ($smt_query) {
       
        header("Location: ../main.php?page=profile&&required=all");
        exit();
    } else {
        redirect_with_error('Error inserting data into the database.');
    }

   
}

$conn->close();
?>
