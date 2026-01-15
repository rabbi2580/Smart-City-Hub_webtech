<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Rewards - Mayor</title>
    <link rel="stylesheet" href="../css/mayor-style.css">
</head>
<body>
    <div class="container">
        <h1>Send Rewards Message</h1>
        <a href="mayor_dashboard.php" class="back-btn"><- Back to Dashboard</a>
        <form method="POST">
            <label>selected Complaints</label>
            <input type="text" readonly value="">
            <label>Reward Message</label>
            <textarea name="reward_message" rows="5" required> Thank you for ur report . your issue will be solved in asap</textarea>
            <button type="submit">Send reward</button>    
        </form>
    </div>
</body>
</html>