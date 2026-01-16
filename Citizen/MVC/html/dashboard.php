<?php
require_once __DIR__ . "/../php/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Citizen Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header class="gov-header">
    <div class="wrap">
        <div class="gov-left">
            <div class="seal">SC</div>
            <div class="brand">
                <div class="title">Smart City Citizen Portal</div>
                <div class="subtitle">Citizen Dashboard</div>
            </div>
        </div>

        <div class="gov-right">
            <div style="font-size:13px; opacity:0.95;">
                Logged in as <b><?php echo htmlspecialchars($_SESSION["user_name"]); ?></b>
            </div>
            <a class="btn-logout" href="../php/logout.php">Logout</a>
        </div>
    </div>
</header>

<main class="container">

    <div class="card">

        <div class="card-head" style="display:flex; align-items:center; justify-content:space-between; gap:12px;">
            <div>
                <h2 style="margin-bottom:4px;">Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!</h2>
                <p style="margin:0;">Use the options below to manage your account and submit complaints.</p>
            </div>

            <a href="profile_edit.php"
               style="
                   font-size:13px;
                   padding:6px 12px;
                   border-radius:10px;
                   border:1px solid #d7e0ee;
                   background:#f8fafc;
                   color:#0f172a;
                   font-weight:600;
                   text-decoration:none;
                   white-space:nowrap;
               ">
                Update Personal Details
            </a>
        </div>

        <div class="card-body">

            <div class="actions">
                <a class="btn btn-primary" href="complaint_new.php">Submit Complaint</a>
                <a class="btn" href="complaints.php">My Complaints</a>
                <a class="btn" href="rewards.php">My Rewards</a>
            </div>

            <div class="notice">
                Keep your account information private. If you suspect unauthorized access, contact support.
            </div>

        </div>

    </div>

</main>

<ul>
    <li><a href="../php/complaint_create_controller.php">Submit Complaint</a></li>
    <li><a href="../php/complaint_list_controller.php">My Complaints</a></li>
    <li><a href="../php/profile_update_controller.php">Edit Profile</a></li>
    <li><a href="../php/logout.php">Logout</a></li>
</ul>

</body>
</html>
