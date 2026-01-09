<?php
require_once __DIR__ . "/../php/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
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
        <div class="card-head">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!</h2>
            <p>Use the options below to submit complaints and track your requests.</p>
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

</body>
</html>
