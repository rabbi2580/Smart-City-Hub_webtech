<?php
session_start();
include '../../../db.php';
if(!isset($_SESSION['user_id'])||$_SESSION['role']!=='mayor'){
    header('Location: ../../../Citizen/MVC/html/login.php');
    exit;
}
$total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM complaints"))[0];
$completed = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM complaints WHERE status IN ('completed', 'final_approved')"))[0];
$pending = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM complaints WHERE status IN ('submitted', 'valid', 'forwarded')"))[0];
$rejected = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM complaints WHERE status = 'rejected'"))[0];

include '../html/view_statistics.php';
?>