<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mayor') {
    header('Location: ../../../Citizen/MVC/html/login.php');
    exit;
}
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


$name = $_SESSION['name'] ?? 'Mayor';
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayor Dashboard</title>
    <link rel="stylesheet" href="../css/mayor-style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome, <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?></h1>

            <a href="../php/change_information_controller.php"
               class="change_info_button">
                Change Profile Information
            </a>
        </div>

        <p>This is your Smart City Hub control panel</p> 
        
        <div class="menu">
            <a href="/Smart-City-Hub_webtech/Mayor/MVC/php/view_all_complaints_controller.php" class="btn">View All Complaints</a>
            <a href="/Smart-City-Hub_webtech/Mayor/MVC/php/view_statistics_controller.php" class="btn">View Statistics</a>
            <a href="/Smart-City-Hub_webtech/Mayor/MVC/php/final_approvals_controller.php" class="btn">Final Approvals</a>
        </div>

        <div class="logout-section">
            <a href="/Smart-City-Hub_webtech/Mayor/MVC/php/logout.php"
               class="logout-button">
               Logout
            </a>
        </div>
    </div>
</body>
</html>
