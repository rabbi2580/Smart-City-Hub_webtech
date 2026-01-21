<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'secretary') {
    header("Location: ../../User/MVC/html/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secretary Dashboard</title>
    <link rel="stylesheet" href="../css/secretary.css">
</head>
<body>
    <header>
        <h1>Smart City Hub</h1>
        <p>Secretary Dashboard</p>
    </header>

    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="forwardcom.php">Forwarded Complaints</a></li>
            <li><a href="../php/logout.php">Logout</a></li>
        </ul>
    </nav>

    <main>
        <h2>Welcome, Secretary</h2>

        <div class="cards">
            <div class="card">
                <h3>Forwarded Complaints</h3>
                <p>View complaints sent by counselors.</p>
                <a href="forwardcom.php">Open</a>
            </div>

            <div class="card">
                <h3>Assign Complaints</h3>
                <p>Approve and assign complaints to workers.</p>
                <a href="forwardcom.php">Assign</a>
            </div>
        </div>
        

    </main>
</body>
</html>
