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

// Create connection
$conn = new mysqli($host, $db_user, $db_pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user details
$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        .profile-container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
        }
        .profile-info {
            margin: 20px 0;
        }
        .profile-item {
            padding: 10px;
            margin: 10px 0;
            background-color: #f9f9f9;
            border-radius: 3px;
        }
        .profile-item strong {
            display: inline-block;
            width: 100px;
        }
        .edit-btn {
            padding: 5px 10px;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            font-size: 12px;
            margin-left: 10px;
        }
        .edit-btn:hover {
            background-color: #007399;
        }
        .edit-form {
            display: none;
            margin-top: 10px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .edit-form input[type="email"] {
            width: 70%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .edit-form input[type="submit"] {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .edit-form input[type="submit"]:hover {
            background-color: #45a049;
        }
        .logout-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #f44336;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 3px;
            margin-top: 20px;
        }
        .logout-btn:hover {
            background-color: #da190b;
        }
        .success {
            color: green;
            text-align: center;
        }
    </style>
    <script>
        function toggleEdit() {
            var form = document.getElementById('editForm');
            if (form.style.display === 'none') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <div class="profile-container">
        <h2>User Profile</h2>
        
        <?php if (isset($_GET['success'])): ?>
            <p class="success">Profile updated successfully!</p>
        <?php endif; ?>
        
        <div class="profile-info">
            <div class="profile-item">
                <strong>Username:</strong>
                <?php echo $user['username']; ?>
            </div>
            
            <div class="profile-item">
                <strong>Email:</strong>
                <?php echo $user['email']; ?>
                <button class="edit-btn" onclick="toggleEdit()">Edit</button>
                
                <div id="editForm" class="edit-form">
                    <form method="POST" action="update_profile.php">
                        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
        
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
