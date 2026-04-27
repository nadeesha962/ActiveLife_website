<?php
// Include the database connection file
include 'db.php';

// Check if the member ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the member from the database
    $stmt = $conn->prepare("DELETE FROM member WHERE id = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: index.php?status=deleted");
        exit();
    } else {
        echo "Error deleting member.";
    }
} else {
    echo "No member ID provided.";
}
?>
