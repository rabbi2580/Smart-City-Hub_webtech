<!DOCTYPE html>
<html>
<head>
    <title>My Complaints</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h2>My Complaints</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Title</th>
        <th>Status</th>
        <th>Location</th>
        <th>Submitted</th>
    </tr>

    <?php while ($row = $complaints->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row["title"]); ?></td>
            <td><?php echo $row["status"]; ?></td>
            <td><?php echo htmlspecialchars($row["location"]); ?></td>
            <td><?php echo $row["created_at"]; ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
