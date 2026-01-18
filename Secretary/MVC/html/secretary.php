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
            <li><a href="forwarded_complaints.php">Forwarded Complaints</a></li>
            <li><a href="completed_complaints.php">Completed Complaints</a></li>
            <li><a href="../../User/MVC/html/login.php">Logout</a></li>
        </ul>
    </nav>

    <main>
        <h2>Welcome, Secretary</h2>

        <div class="cards">
            <div class="card">
                <h3>Forwarded Complaints</h3>
                <p>View complaints sent by counselors.</p>
                <a href="forwarded_complaints.php">Open</a>
            </div>

            <div class="card">
                <h3>Assign Complaints</h3>
                <p>Approve and assign complaints to workers.</p>
                <a href="forwarded_complaints.php">Assign</a>
            </div>

            <div class="card">
                <h3>Completed Complaints</h3>
                <p>View all resolved complaints.</p>
                <a href="completed_complaints.php">View</a>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Smart City Hub</p>
    </footer>
</body>
</html>
