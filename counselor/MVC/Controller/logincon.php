<?php
session_start();
require "../db/coun.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    die("Username and Password required");
}
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {


    if (password_verify($password, $row['password'])) {
        if ($row['role'] !== 'counselor') {
            die("Unauthorized role");
        }
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role']    = $row['role'];
        $_SESSION['name']    = $row['name'];
        $_SESSION['area']    = $row['area'];
        header("Location: /Smart-City-Hub_webtech/counselor/MVC/html/counselor.php");
        exit;
    }
}


echo "Invalid username or password";
