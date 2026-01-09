<?php
session_start();
require_once __DIR__ . "/../db/user_model.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../html/login.php");
    exit();
}

$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";

if ($username === "" || $password === "") {
    header("Location: ../html/login.php?error=1");
    exit();
}

$user = user_find_by_username($username);

if (!$user || !password_verify($password, $user["password"])) {
    header("Location: ../html/login.php?error=1");
    exit();
}

session_regenerate_id(true);

$_SESSION["user_id"] = $user["id"];
$_SESSION["user_name"] = $user["name"];
$_SESSION["user_role"] = $user["role"];

header("Location: ../html/dashboard.php");
exit();
