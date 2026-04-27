<?php
// Include the database connection file
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    // Prepare the SQL query using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO member (name, email, contact) VALUES (:name, :email, :contact)");

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contact', $contact);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to the dashboard page with a success message
        header("Location: index.php?status=success");
        exit();
    } else {
        // Display PDO error if the query execution fails
        $errorInfo = $stmt->errorInfo();
        echo "Error: " . $errorInfo[2]; // Get the detailed error message
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Add New Member</h1>
    <form action="add_member.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" required>

        <button type="submit">Add Member</button>
            
}

    </form>

    <br>
    <a href="index.php">Back to Dashboard</a>

</body>
</html>
