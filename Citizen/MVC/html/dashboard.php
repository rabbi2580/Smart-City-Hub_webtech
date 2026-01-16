<?php
require_once __DIR__ . "/../php/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Citizen Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Welcome, <?php echo $_SESSION["username"]; ?></h2>

<ul>
    <li><a href="profile_update_view.php">Edit Profile</a></li>
    <li><a href="#">Submit Complaint</a></li>
    <li><a href="../php/logout.php">Logout</a></li>
</ul>
</body>
</html>
