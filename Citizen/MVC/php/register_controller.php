<?php
session_start();
require_once __DIR__ . "/../db/db.php";

$_SESSION["reg_message"] = "";
$_SESSION["reg_form_data"] = $_POST;

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../html/register_view.php");
    exit();
}

$first_name = trim($_POST["first_name"] ?? "");
$last_name = trim($_POST["last_name"] ?? "");
$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";
$confirm_password = $_POST["confirm_password"] ?? "";
$id_number = trim($_POST["id_number"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$location = trim($_POST["location"] ?? "");

$phone_clean = preg_replace("/\D/", "", $phone);

if ($first_name === "" || $last_name === "" || $username === "" || $id_number === "" || $phone === "" || $location === "") {
    $_SESSION["reg_message"] = "Please fill in all fields.";
    header("Location: ../html/register_view.php");
    exit();
}

if (strlen($phone_clean) !== 11) {
    $_SESSION["reg_message"] = "Phone number must be 11 digits.";
    header("Location: ../html/register_view.php");
    exit();
}

if ($password !== $confirm_password) {
    $_SESSION["reg_message"] = "Passwords do not match.";
    header("Location: ../html/register_view.php");
    exit();
}

if (strlen($password) < 8) {
    $_SESSION["reg_message"] = "Password must be at least 8 characters.";
    header("Location: ../html/register_view.php");
    exit();
}

$stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR id_number = ? LIMIT 1");
$stmt->bind_param("ss", $username, $id_number);
$stmt->execute();
$exists = $stmt->get_result()->fetch_assoc();

if ($exists) {
    $_SESSION["reg_message"] = "Username or ID number already exists.";
    header("Location: ../html/register_view.php");
    exit();
}

$hashed = password_hash($password, PASSWORD_DEFAULT);
$full_name = $first_name . " " . $last_name;
$role = "citizen";

$stmt2 = $conn->prepare(
    "INSERT INTO users (username, password, name, id_number, phone, location, role)
     VALUES (?, ?, ?, ?, ?, ?, ?)"
);
$stmt2->bind_param("sssssss", $username, $hashed, $full_name, $id_number, $phone_clean, $location, $role);

if ($stmt2->execute()) {
    $_SESSION["reg_message"] = "Registration successful. You may now login.";
    $_SESSION["reg_form_data"] = [];
} else {
    $_SESSION["reg_message"] = "Registration failed. Please try again.";
}

header("Location: ../html/register_view.php");
exit();
