<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require $_SERVER['DOCUMENT_ROOT']."/Smart-City-Hub_webtech/counselor/MVC/db/coun.php";

$result = mysqli_query($conn, "
    SELECT id, description
    FROM complaints
    WHERE status='submitted'
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pending Verification Complaints</title>
    <link rel="stylesheet" href="../css/verification.css">
</head>
<body>

<header>
    <h2>Pending Verification Complaints</h2>
</header>

<div class="container">
    <table>
        <tr>
            <th>ID</th>
            <th>Description</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['description']; ?></td>
        </tr>
        <?php } ?>

    </table>
</div>

</body>
</html>
