<!DOCTYPE html>
<html lang="en">
<head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayor Dashboard </title>
    <link rel="stylesheet" href="../css/mayor-style.css">
</head>
<body>
    <div class ="container">
        <div class ="header">
            <h1>Welcome,Mayor</h1>
            <a href="change_information.php" class="change_info_button">Change Information</a>
        </div>
        <p>This is your Smart City Hub control panel</p> 
        
        <div class="menu">
            <a href="view_all_complaints.php" class="btn">View All Complaints</a>
            <a href="view_statistics.php" class="btn">View Statistics </a>
            <a href="send_rewards.php" class="btn">Send Rewards</a>
            <a href="final_approvals.php" class="btn"> Final Approvals </a>

        </div>
        <div class="logout-section">
            <a href="../../../Citizen/MVC/html/login.php?logout=1" class="logout">logout</a>

        </div>
    </div>
</body>
</html>