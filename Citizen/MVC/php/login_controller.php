<?php
session_start();
require_once __DIR__ . "/user_model.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if ($username === "" || $password === "") {
        $error = "All fields are required";
    } else {
        $user = user_find_by_username($username);
        if (!$user || !password_verify($password, $user["password_hash"])) {
            $error = "Invalid credentials";
        } else {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            header("Location: ../html/dashboard.php");
            exit;
        }
    }
}

require_once __DIR__ . "/../html/login_view.php";
