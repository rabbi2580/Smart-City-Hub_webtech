
<!DOCTYPE html>
<html>
<head>
    <title>Forwarded Complaints</title>
    <link rel="stylesheet" href="../css/secretary.css">
</head>
<body>

<header>
    <h1>Smart City Hub</h1>
    <p>Forwarded Complaints</p>
</header>

<nav>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="forwarded_complaints.php">Forwarded Complaints</a></li>
    </ul>
</nav>

<main>
    <div class="cards">
        <h2>Forwarded Complaints List</h2>

        <table>
            <tr>
           <th>ID</th>
       <th>Description</th>
         <th>Location</th>
                <th>Status</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['description']; ?></td>
       <td><?php echo $row['location']; ?></td>
      <td><?php echo $row['status']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</main>

<footer>
  Smart City Hub
</footer>

</body>
</html>
