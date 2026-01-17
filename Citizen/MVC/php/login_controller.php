<?php
session_start();
require_once __DIR__ . "/user_model.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($username === "" || $password === "") {
        header("Location: ../html/login_view.php?error=1");
        exit();
    }

    $user = user_find_by_username($username);

    if (!$user || !password_verify($password, $user["password"])) {
        header("Location: ../html/login_view.php?error=1");
        exit();
    }

    $_SESSION["user_id"] = (int) $user["id"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["role"] = $user["role"];

    header("Location: ../html/dashboard.php");
    exit();
}

require_once __DIR__ . "/../html/login_view.php";
