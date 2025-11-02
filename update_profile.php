<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Database configuration
$host = 'localhost';
$dbname = 'lab10_db';
$db_user = 'root';
$db_pass = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_email = $_POST['email'];
    $username = $_SESSION['username'];

    // Create connection
    $conn = new mysqli($host, $db_user, $db_pass, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update email in database
    $sql = "UPDATE user SET email = '$new_email' WHERE username = '$username'";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to profile with success message
        header('Location: profile.php?success=1');
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    $conn->close();
} else {
    // If accessed directly without POST, redirect to profile
    header('Location: profile.php');
    exit();
}
