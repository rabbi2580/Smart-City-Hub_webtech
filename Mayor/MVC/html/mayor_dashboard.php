<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayor Dashboard </title>
    <link rel="stylesheet" href="../css/mayor-style.css">
</head>
<body>
    <div class ="container">
        <div class ="header">
            <h1>Welcome,Mayor</h1>
            <a href="change_information.php" class="change_info_button">Change Profile Information</a>
        </div>
        <p>This is your Smart City Hub control panel</p> 
        
        <div class="menu">
        <a href="../php/view_all_complaints_controller.php" class="btn">View All Complaints</a>    
        <a href="../php/view_statistics_controller.php" class="btn">View Statistics</a>
        <a href="../php/final_approvals_controller.php" class="btn">Final Approvals</a>
        </div>
        <div class="logout-section">
            <a href="../../../Citizen/MVC/html/login.php?logout=1" class="logout">logout</a>

        </div>
    </div>
</body>
</html>