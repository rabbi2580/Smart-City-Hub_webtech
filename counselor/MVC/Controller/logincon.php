<?php
session_start();
require "../db/coun.php";

$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    echo "Email and Password required";
    exit;
}

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    if ($password == $row['password']) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];
        header("Location: /Smart-City-Hub_webtech/counselor/MVC/html/counselor.php");
        exit;
    }
}

echo "Invalid email or password";
