<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'secretary') {
    header("Location: ../../User/MVC/html/login.php");
    exit;
}

require_once "../db/db.php";


$query = "SELECT * FROM complaints WHERE status='Forwarded' ORDER BY id DESC";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forwarded Complaints</title>
    <link rel="stylesheet" href="../css/forward.css">
</head>
<body>

<header>
    <h1>Smart City Hub</h1>
    <p>Forwarded Complaints</p>
</header>

<nav>
    <ul>
        <li><a href="secretary.php">Dashboard</a></li>
        <li><a href="forwardcom.php">Forwarded Complaints</a></li>
        <li><a href="completed_complaints.php">Completed Complaints</a></li>
        <li><a href="../php/logout.php">Logout</a></li>
    </ul>
</nav>

<main>
     <a href="secretary.php" class="back-btn">← Back to Dashboard</a>
    <div class="cards">
        <h2>Complaints to Forward</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Location</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['description']) ?></td>
                <td><?= htmlspecialchars($row['location']) ?></td>
                <td><?= htmlspecialchars($row['status']) ?></td>
                <td>
                    <form method="post" action="../php/assign_to_mayor.php">
                        <input type="hidden" name="complaint_id" value="<?= $row['id'] ?>">
                        <button type="submit">Forward to Mayor</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</main>

</body>
</html>
