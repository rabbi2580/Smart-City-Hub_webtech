<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Complaints - Mayor</title>
    <link rel="stylesheet" href="../css/mayor-style.css">
</head>
<body>
    <div class="container">
        <h1>All Complaints</h1>
        <a href="mayor_dashboard.php" class="back-btn"><- Back To Dashboard</a>
        <?php if(empty($complaints)):?>
            <p>No complaint found.</p>
        <?php else:?>
        <table>
            <thead>
                <tr>
            
                <th>ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>Citizen</th>
                <th>Location</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($complaints as $c): ?>
                    <tr>
                        <td><?php echo $c['id']; ?></td>
                        <td><?php echo htmlspecialchars($c['title']);  ?> </td>
                        <td><?php echo htmlspecialchars($c['type']);  ?> </td>
                        <td><?php echo htmlspecialchars($c['status']);  ?> </td>
                        <td><?php echo htmlspecialchars($c['citizen_name']);  ?> </td>
                        <td><?php echo htmlspecialchars($c['location']);  ?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</body>
</html>