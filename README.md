# Lab 10 - Profile Page and Edit Feature

## Overview

This lab demonstrates a simple user profile system with login and edit capabilities using PHP sessions and MySQL database.

## Files Created

1. **setup.php** - Creates database, user table, and inserts sample record
2. **login.php** - User login page with authentication
3. **profile.php** - Displays user profile with edit option
4. **update_profile.php** - Handles email update
5. **logout.php** - Ends user session

## Setup Instructions

### Step 1: Update Database Credentials (if needed)

All PHP files use these default credentials:

- Host: `localhost`
- Database: `lab10_db`
- Username: `root`
- Password: `` (empty)

If your database uses different credentials, update them in each PHP file.

### Step 2: Customize Your User Account

Open `setup.php` and replace these lines with your details:

```php
$username = 'YourName';        // Replace with your actual name
$password = 'YourStudentID';   // Replace with your student ID
```

### Step 3: Run Setup

1. Start your local server (XAMPP, WAMP, etc.)
2. Access: `http://localhost/lab-10/setup.php`
3. This will create the database and user table

### Step 4: Login

1. Access: `http://localhost/lab-10/login.php`
2. Enter your username and password (from step 2)
3. You'll be redirected to your profile page

## Features

### Login Page (`login.php`)

- Simple login form
- Validates username and password against database
- Creates session on successful login
- Redirects to profile page

### Profile Page (`profile.php`)

- Shows username and email
- Edit button next to email field
- Click "Edit" to reveal update form
- Logout button to end session

### Update Profile (`update_profile.php`)

- Processes email updates
- Uses SQL UPDATE query
- Redirects back to profile with success message

### Logout (`logout.php`)

- Destroys session
- Redirects to login page

## Security Note

This is a simple lab implementation. For production use, you should:

- Use prepared statements to prevent SQL injection
- Hash passwords (use `password_hash()` and `password_verify()`)
- Validate and sanitize user inputs
- Use HTTPS for secure communication
