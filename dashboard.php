<?php
session_start();
if(!isset($_SESSION["LoggedIn"])) { //redirection si le user n'est pas connectee
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">Our Site</div>
        <div class="logo">Navigation</div>
        <nav>
            <a href="dashboard.php">🏠 Dashboard</a>
            <a href="#">👤 Profile</a>
            <a href="#">⚙ Settings</a>
            <a href="logout.php">🚪 Logout</a>
        </nav>
    </div>

    <!-- Main -->
    <div class="main">
        <h1>👥Bienvenue, <span><?php echo isset($_SESSION["User"]) ? htmlspecialchars($_SESSION["User"]) : "Utilisateur" ?></span></h1>
        <div class="cards">
            <div class="card">
                <h2>Manage Profile</h2>
                <p>Update your information, password, and preferences.</p>
            </div>
            <div class="card">
                <h2>View Analytics</h2>
                <p>See your account statistics and recent activities.</p>
            </div>
            <div class="card">
                <h2>System Settings</h2>
                <p>Configure the platform the way you like it.</p>
            </div>
            <div class="card">
                <h2>Support Center</h2>
                <p>Need help? Contact our support team easily.</p>
            </div>
        </div>
    </div>
</body>
</html>
