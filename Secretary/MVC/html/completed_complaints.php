<?php
session_start();

// 🔒 Only secretary can access
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'secretary') {
    header("Location: /Smart-City-Hub_webtech/User/MVC/html/login.php");
    exit;
}

require_once "../db/db.php";

// Fetch all completed complaints
$query = "SELECT * FROM complaints WHERE status='Completed' ORDER BY id DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database error: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Completed Complaints</title>
    <link rel="stylesheet" href="../css/secretary.css">
</head>
<body>
<header>
    <h1>Smart City Hub</h1>
    <p>Completed Complaints</p>
</header>

<nav>
    <ul>
        <li><a href="/Smart-City-Hub_webtech/Secretary/MVC/html/secretary.php">Dashboard</a></li>
        <li><a href="/Smart-City-Hub_webtech/Secretary/MVC/html/forwardcom.php">Forwarded Complaints</a></li>
        <li><a href="/Smart-City-Hub_webtech/Secretary/MVC/php/completed_complaints.php">Completed Complaints</a></li>
        <li><a href="/Smart-City-Hub_webtech/Secretary/MVC/php/logout.php">Logout</a></li>
    </ul>
</nav>

<main>
    <h2>Completed Complaints</h2>

    <?php if (mysqli_num_rows($result) === 0): ?>
        <p style="text-align:center;">No completed complaints yet.</p>
    <?php else: ?>
        <div class="cards">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="card">
                    <h3>Complaint #<?= $row['id'] ?></h3>
                    <p><strong>Description:</strong> <?= htmlspecialchars($row['description']) ?></p>
                    <p><strong>Location:</strong> <?= htmlspecialchars($row['location']) ?></p>
                    <p><strong>Status:</strong> <?= htmlspecialchars($row['status']) ?></p>
                </div>
            <?php } ?>
        </div>
    <?php endif; ?>
</main>
<a href="secretary.php" class="back-btn">← Back to Dashboard</a>
</body>
</html>
