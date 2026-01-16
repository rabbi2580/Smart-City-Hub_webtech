<?php
session_start();
require_once __DIR__ . "/user_model.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if ($username === "" || $email === "" || $password === "") {
        $error = "All fields are required";
    } elseif (user_find_by_username($username)) {
        $error = "Username already exists";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if (user_create($username, $email, $hash)) {
            $success = "Registration successful";
        } else {
            $error = "Registration failed";
        }
    }
}

require_once __DIR__ . "/../html/register_view.php";
