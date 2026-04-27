<?php
// Include the database connection file
include 'db.php';

// Check if the member ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the member's details
    $stmt = $conn->prepare("SELECT * FROM member WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $member = $stmt->fetch();

    if (!$member) {
        echo "Member not found.";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the updated form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    // Update member information in the database
    $updateStmt = $conn->prepare("UPDATE member SET name = :name, email = :email, contact = :contact WHERE id = :id");
    $updateStmt->bindParam(':name', $name);
    $updateStmt->bindParam(':email', $email);
    $updateStmt->bindParam(':contact', $contact);
    $updateStmt->bindParam(':id', $id);

    if ($updateStmt->execute()) {
        header("Location: index.php?status=updated");
        exit();
    } else {
        echo "Error updating member.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Member</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Update Member</h1>

    <form action="update_member.php?id=<?php echo $id; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $member['name']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $member['email']; ?>" required>

        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" value="<?php echo $member['contact']; ?>" required>

        <button type="submit">Update Member</button>
    </form>

    <br>
    <a href="index.php">Back to Dashboard</a>

</body>
</html>
