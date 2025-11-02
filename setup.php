<?php
// Database configuration
$host = 'localhost';
$dbname = 'lab10_db';
$db_user = 'root';
$db_pass = '';

// Create connection
$conn = new mysqli($host, $db_user, $db_pass);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select database
$conn->select_db($dbname);

// Create user table
$sql = "CREATE TABLE IF NOT EXISTS user (
    username VARCHAR(50) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'user' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Insert sample record
$username = 'nguyen bao thien phuc';
$password = '105978092';
$email = '105978092@student.swin.edu.au';

$sql = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Sample user created successfully<br>";
    echo "Username: $username<br>";
    echo "Password: $password<br>";
} else {
    echo "Error: " . $conn->error . "<br>";
}

$conn->close();
echo "<br><a href='login.php'>Go to Login</a>";
