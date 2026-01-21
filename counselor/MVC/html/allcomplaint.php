<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require $_SERVER['DOCUMENT_ROOT']."/Smart-City-Hub_webtech/counselor/MVC/db/coun.php";
$area = $_SESSION['area'];
$result = mysqli_query($conn,"
    SELECT id, description, location, status
    FROM complaints
    WHERE location = '$area'
    ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/allcomplaint.css">
<title>All Complaints</title>
</head>
<body>

<header>
  <h2>Smart City Hub – Counselor Panel</h2>
  <div>All Complaints</div>
</header>

<div class="container">
<table>
<tr>
  <th>ID</th>
  <th>Description</th>
  <th>Location</th>
  <th>Status</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?= $row['id'] ?></td>
  <td><?= htmlspecialchars($row['description']) ?></td>
  <td><?= htmlspecialchars($row['location']) ?></td>
  <td><?= htmlspecialchars($row['status']) ?></td>
</tr>
<?php } ?>
<button class="back-btn" onclick="history.back()">← Back</button>

</table>
</div>
</body>
</html>
