<?php
session_start();
require_once __DIR__ . "/../db/user_model.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../html/register.php");
    exit();
}

$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";
$confirm = $_POST["confirm_password"] ?? "";

$name = trim($_POST["name"] ?? "");
$id_number = trim($_POST["id_number"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$location = trim($_POST["location"] ?? "");
$area = trim($_POST["area"] ?? "");

if (
    $username === "" || $password === "" || $confirm === "" ||
    $name === "" || $id_number === "" || $phone === "" || $location === ""
) {
    header("Location: ../html/register.php?error=empty");
    exit();
}

if ($password !== $confirm) {
    header("Location: ../html/register.php?error=match");
    exit();
}

if (strlen($password) < 6) {
    header("Location: ../html/register.php?error=weak");
    exit();
}

if (user_username_exists($username)) {
    header("Location: ../html/register.php?error=user");
    exit();
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$areaValue = $area === "" ? null : $area;

$ok = user_create_citizen($username, $passwordHash, $name, $id_number, $phone, $location, $areaValue);

if (!$ok) {
    header("Location: ../html/register.php?error=fail");
    exit();
}

header("Location: ../html/login.php?registered=1");
exit();
