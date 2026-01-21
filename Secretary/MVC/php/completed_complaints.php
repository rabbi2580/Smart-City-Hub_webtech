<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'secretary') {
    header("Location: ../../User/MVC/html/login.php");
    exit;
}

require_once "db.php";
$query = "SELECT * FROM complaints WHERE status='Completed' ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
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
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="forwardcom.php">Forwarded Complaints</a></li>
        <li><a href="completed_complaints.php">Completed Complaints</a></li>
        <li><a href="../../User/MVC/html/login.php">Logout</a></li>
    </ul>
</nav>

<main>
    <div class="cards">
        <h2>Completed Complaints</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Location</th>
                <th>Status</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
                <td><?php echo htmlspecialchars($row['location']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</main>

</body>
</html>
