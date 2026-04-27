<?php
// Start the session
session_start();
if (isset($_SESSION['user'])) {
    header('Location: index.html');
    exit;
}

// Initialize error message
$error_message = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include database connection
    include('db.php');

    // Ensure the database connection is initialized
    if (!$conn) {
        die('Database connection not established.');
    }

    // Validate input
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $error_message = 'Username and password are required.';
    } else {
        try {
            // Use a prepared statement to prevent SQL injection
            $query = 'SELECT * FROM users WHERE username = ? AND password = ?';
            $stmt = $conn->prepare($query);

            // Execute the query with parameters
            $stmt->execute([$username, $password]);

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Set session and redirect
                $_SESSION['user'] = $user;
                header('Location: index.html');
                exit;
            } else {
                $error_message = 'Invalid username or password.';
            }
        } catch (PDOException $e) {
            $error_message = 'Error: ' . $e->getMessage();
        }
    }
}
?>


