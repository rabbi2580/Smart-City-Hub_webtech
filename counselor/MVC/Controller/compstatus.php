<?php
session_start();
require "../db/db.php";

$id = $_POST['id'];
$status = $_POST['status'];

mysqli_query($conn, "UPDATE complaints SET status='$status' WHERE id=$id");

header("Location: ../html/counselor.php");
exit;
