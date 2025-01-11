<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Debug message
echo "Starting debug process...<br>";

session_start();
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email and password from the form submission
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Hash the password using md5

    // Prepare the SQL query to check for matching email and password
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = ? AND password = ?");
    $stmt->execute([$email, $password]);
    $admin = $stmt->fetch();

    // Check if the admin record is found
    if ($admin) {
        // Store the admin email in the session for authentication
        $_SESSION['admin'] = $admin['email']; // Storing email in session
        header('Location: index.php'); // Redirect to the admin dashboard
    } else {
        echo "Invalid login details.";
    }
}
?>
