<?php
// Database connection settings
$host = 'localhost';
$dbname = 'fitness_db';
$username = 'root'; // Change to your DB username
$password = '';     // Change to your DB password

try {
    // Create a new PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $membership_type = $_POST['membership-type'];

        // Prepare the SQL query
        $sql = "INSERT INTO members (name, email, phone, membership_type) VALUES (:name, :email, :phone, :membership_type)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':membership_type', $membership_type);

        // Execute the query
        if ($stmt->execute()) {
            echo "Membership registration successful!";
        } else {
            echo "Failed to register. Please try again.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
