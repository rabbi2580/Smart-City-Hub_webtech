<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /Smart-City-Hub_webtech/Citizen/MVC/html/login_view.php");
    exit;
}

require $_SERVER['DOCUMENT_ROOT']."/Smart-City-Hub_webtech/counselor/MVC/db/coun.php";
$area = $_SESSION['area'];
$result = mysqli_query($conn, "
    SELECT id, description
    FROM complaints
    WHERE status='submitted' AND location = '$area'
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pending Verification Complaints</title>
    <link rel="stylesheet" href="../css/verification.css">
</head>
<body>

<header>
    <h2>Pending Verification Complaints</h2>
</header>

<div class="container">
<table>
<tr>
    <th>ID</th>
    <th>Description</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= htmlspecialchars($row['description']); ?></td>
</tr>
<?php } ?>

</table>
</div>
<button class="back-btn" onclick="history.back()">← Back</button>

</body>
</html>
