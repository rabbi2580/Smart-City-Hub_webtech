<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'counselor') {
    header("Location: ../login_view.php");
    exit;
}


$counselor_name = $_SESSION['name'];
$counselor_area = $_SESSION['area'];


require $_SERVER['DOCUMENT_ROOT'] . "/Smart-City-Hub_webtech/counselor/MVC/db/coun.php";

$stmt = $conn->prepare("
    SELECT id, description, location, image_path, status, counselor_comment
    FROM complaints
    WHERE location = ? AND status = 'submitted'
    ORDER BY id DESC
");
$stmt->bind_param("s", $counselor_area);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Counselor Dashboard | Smart City Hub</title>
    <link rel="stylesheet" href="../css/counselor.css">
</head>
<body>

<header>
    <h1>Smart City Hub – Counselor Dashboard</h1>
    <div class="user-info">
        Welcome, <?= htmlspecialchars($counselor_name) ?> |
        <a href="profile.php">Profile</a> |
        <a href="/Smart-City-Hub_webtech/counselor/MVC/html/logout.php" class="btn">Logout</a>

    </div>
</header>

<div class="menu">
    <a href="allcomplaint.php">All Complaints</a>
    <a href="verification.php">Pending Verification</a>
    <a href="valid.php">Valid Complaints</a>
</div>

<div class="container">
    <h2>Complaints in Your Area (<?= htmlspecialchars($counselor_area) ?>)</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Location</th>
            <th>Status</th>
            <th>Comment</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>

            <td><?= htmlspecialchars($row['description']) ?></td>

            <td>
                <?php if (!empty($row['image_path'])): ?>
                    <img src="<?= htmlspecialchars($row['image_path']) ?>" width="80" alt="Complaint Image">
                <?php endif; ?>
            </td>

            <td><?= htmlspecialchars($row['location']) ?></td>
            <td><?= htmlspecialchars($row['status']) ?></td>

            <td>
                <form method="post" action="../Controller/saveComment.php">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <textarea name="comment"><?= htmlspecialchars($row['counselor_comment']) ?></textarea>
                    <button type="submit">Save</button>
                </form>
            </td>

            <td>
                <form method="post" action="../Controller/markValid.php" style="display:inline-block;">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit">Valid</button>
                </form>

                <form method="post" action="../Controller/markInvalid.php" style="display:inline-block;">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit">Invalid</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<footer>
    © 2026 Smart City Hub | Counselor Panel
</footer>

</body>
</html>
