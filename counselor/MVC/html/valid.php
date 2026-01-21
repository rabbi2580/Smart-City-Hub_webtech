 <?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require $_SERVER['DOCUMENT_ROOT']."/Smart-City-Hub_webtech/counselor/MVC/db/coun.php";
$area = $_SESSION['area'];
$result = mysqli_query($conn, "
    SELECT id, description, location, status
    FROM complaints
    WHERE status='valid' AND location = '{$_SESSION['area']}'
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Valid Complaints</title>

    <link rel="stylesheet" href="../css/valid.css">
    
</head>
<body>

<header>
    <h2>Valid Complaints</h2>
</header>

<div class="container">
    <table>
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Location</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td class="status valid"><?php echo $row['status']; ?></td>
            <td>
                <form method="post" action="../Controller/forward.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button class="btn-forward">Forward to Secretary</button>
                </form>
            </td>
        </tr>
        <?php } ?>

    </table>
</div>
<button class="back-btn" onclick="history.back()">← Back</button>

</body>
</html>
