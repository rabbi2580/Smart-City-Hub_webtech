<?php
session_start();
require $_SERVER['DOCUMENT_ROOT']."/Smart-City-Hub_webtech/counselor/MVC/db/coun.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'counselor') {
    header("Location: ../login_view.php");
    exit;
}

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$area = $_POST['area'];
$password = $_POST['password'];

if (!empty($password)) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE counselors SET name=?, email=?, area=?, password=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $email, $area, $hashedPassword, $id);
} else {
    $stmt = $conn->prepare("UPDATE counselors SET name=?, email=?, area=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $area, $id);
}

if ($stmt->execute()) {
    $_SESSION['name'] = $name; 
    $_SESSION['area'] = $area;
    header("Location: ../html/profile.php?success=1");
} else {
    header("Location: ../html/profile.php?error=1");
}
exit;
