<?php
session_start();
require $_SERVER['DOCUMENT_ROOT']."/Smart-City-Hub_webtech/counselor/MVC/db/coun.php";

$id = $_POST['id'];
$status = $_POST['status'];

mysqli_query($conn, "UPDATE complaints SET status='$status' WHERE id=$id");

echo json_encode([
    "success" => true,
    "status" => $status

]);
