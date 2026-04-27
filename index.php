<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <!-- header section starts  -->

    <header class="header">

        <a href="#" class="logo">ACTIVE <span>LIFE</span></a>

        <nav class="navbar">
            <a href="index.html">home</a>
            <a href="about.html">About</a>
            <a href="services.html">Services</a>
            <a href="news.html">news</a>
            <a href="contact.html">contact</a>
            <a class="active"href="index.php">Dashboard</a>
        </nav>

        <div class=" icons">
            <button><a href="Become a Member.html">Become a Member</a></button>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>


    </header>

    <!-- header section ends  -->

    <div class="dashboard">
        <div class="card">
            <h2>Total Users</h2>
            <p id="total-users">10</p>
        </div>
        <div class="card">
            <h2>Total Trainers</h2>
            <p id="total-trainers">3</p>
        </div>
        <div class="card">
            <h2>Total Revenue</h2>
            <p id="total-revenue">$0.00</p>
        </div>
        <div class="card">
            <h2>Daily Active Users</h2>
            <p id="daily-active">6</p>
        </div>
    </div>


    <h1>Welcome to the Member Dashboard</h1>
    <button onclick="window.location.href='add_member.php'" class="btn">Add Member</button>
    
    

    <?php
// Include the database connection file
include 'db.php';

// Fetch all members from the database
$query = "SELECT * FROM member";
$stmt = $conn->query($query);
$members = $stmt->fetchAll();
?>



    <h2>Current Members</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member): ?>
            <tr>
                <td><?php echo $member['id']; ?></td>
                <td><?php echo $member['name']; ?></td>
                <td><?php echo $member['email']; ?></td>
                <td><?php echo $member['contact']; ?></td>
                <td>
                    <!-- Update Button -->
                    <a href="update_member.php?id=<?php echo $member['id']; ?>">Update</a>
                    <!-- Delete Button -->
                    <a href="delete_member.php?id=<?php echo $member['id']; ?>" onclick="return confirm('Are you sure you want to delete this member?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="script.js"></script>



    <footer>
         <div class="credit">created by <span>Nadee web designer</span> | all right reserved</div>
    </footer>

    <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
   <script src="js/custom.js"></script>
</body>
</html>

