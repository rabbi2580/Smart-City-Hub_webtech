<?php
require_once __DIR__ . "/../php/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Rewards</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>


    <div class="wrap">
        <div class="gov-left">
            <div class="seal">SC</div>
            <div class="brand">
                <div class="title">Smart City Citizen Portal</div>
                <div class="subtitle">My Rewards</div>
            </div>
        </div>

        <div class="gov-right">
            <a class="btn-logout" href="dashboard.php">Back</a>
        </div>
    </div>
</header>

<main class="container">
    <div class="card">
        <div class="card-head">
            <h2>Rewards</h2>
            <p>This module will show points and rewards earned from verified civic participation.</p>
        </div>

        <div class="card-body">
            <div class="notice">
                No rewards available yet. Once your complaints are marked as valid or forwarded, points will appear here.
            </div>

            <div class="actions" style="margin-top:14px;">
                <a class="btn btn-primary" href="dashboard.php">Back to Dashboard</a>
                <a class="btn" href="../php/complaint_list_controller.php">View My Complaints</a>
            </div>
        </div>
    </div>
</main>

</body>
</html>
