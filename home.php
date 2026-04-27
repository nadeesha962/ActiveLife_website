<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html'); // Redirect to login form if not logged in
    exit();
}

// Welcome the user
echo "<h1>Welcome to Active Life!</h1>";
echo "<p>You are logged in as: " . htmlspecialchars($_SESSION['email']) . "</p>";

// Logout link
echo '<a href="logout.php">Logout</a>';
?>