<?php
session_start();
require_once __DIR__ . "/user_model.php";

function redirect_to_dashboard_by_role($role) {
    $role = strtolower(trim($role));

    if ($role === "citizen") {
        header("Location: ../html/dashboard.php");
        exit();
    }

    if ($role === "counselor") {
        header("Location: ../../Counselor/MVC/html/dashboard.php");
        exit();
    }

    if ($role === "secretary") {
        header("Location: ../../Secretary/MVC/html/dashboard.php");
        exit();
    }

    if ($role === "mayor") {
        header("Location: ../../Mayor/MVC/html/dashboard.php");
        exit();
    }

    header("Location: ../html/login_view.php?error=role");
    exit();
}

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

    redirect_to_dashboard_by_role($_SESSION["role"]);
}

require_once __DIR__ . "/../html/login_view.php";
