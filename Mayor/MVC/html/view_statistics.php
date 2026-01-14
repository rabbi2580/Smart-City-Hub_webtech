<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics - Mayor</title>
    <link rel="stylesheet" href="../css/mayor-style.css">
</head>
<body>
    <div class="container">
        <h1>Complaint Statistics</h1>
        <a href="mayor_dashboard.php" class="back-btn"><- Back to Dashboard</a>
        <div class="states">
            <p><strong>Total Complaints:</strong><?php echo $total; ?></p>
            <p><strong>Completed:</strong><?php echo $completed; ?></p>
        
            <p><strong>Pending </strong><?php echo $pending; ?></strong></p>
            <p><strong>Rejected:</strong><?php echo $rejected; ?></p>


        </div>
    </div>
</body>
</html>