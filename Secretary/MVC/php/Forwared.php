<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'secretary') {
    header("Location: ../../User/MVC/html/login.php");
    exit;
}

include("../db/db.php");
$query = "SELECT * FROM complaints WHERE status='Forwarded' ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>
