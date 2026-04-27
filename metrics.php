<?php
require_once 'db.php';

// Fetch total users
$query = $pdo->query("SELECT COUNT(*) AS total_users FROM users");
$total_users = $query->fetch(PDO::FETCH_ASSOC)['total_users'];

// Fetch total trainers
$query = $pdo->query("SELECT COUNT(*) AS total_trainers FROM trainers");
$total_trainers = $query->fetch(PDO::FETCH_ASSOC)['total_trainers'];

// Fetch total revenue
$query = $pdo->query("SELECT SUM(amount) AS total_revenue FROM payments");
$total_revenue = $query->fetch(PDO::FETCH_ASSOC)['total_revenue'];

// Fetch daily active users
$query = $pdo->query("SELECT COUNT(DISTINCT user_id) AS daily_active FROM activity_log WHERE DATE(login_time) = CURDATE()");
$daily_active = $query->fetch(PDO::FETCH_ASSOC)['daily_active'];

echo json_encode([
    'total_users' => $total_users,
    'total_trainers' => $total_trainers,
    'total_revenue' => $total_revenue,
    'daily_active' => $daily_active
]);
?>
