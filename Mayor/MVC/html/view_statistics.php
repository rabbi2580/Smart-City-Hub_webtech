<?php
$username = 'Mayor';
if (!isset($total))     $total = 0;
if (!isset($completed)) $completed = 0;
if (!isset($pending))   $pending = 0;
if (!isset($rejected))  $rejected = 0;
?>
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
        <a href="/Smart-City-Hub_webtech/Mayor/MVC/html/mayor_dashboard.php" class="back-btn"><- Back to Dashboard</a>
        <div class="stats">
            <p><strong>Total Complaints:</strong> <?php echo $total; ?></p>
            <p><strong>Completed:</strong> <?php echo $completed; ?></p>
        
            <p><strong>Pending </strong> <?php echo $pending; ?></p>
            <p><strong>Rejected:</strong> <?php echo $rejected; ?></p>


        </div>
    </div>
</body>
</html>