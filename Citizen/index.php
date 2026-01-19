<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: Citizen/MVC/html/login_view.php");
    exit();
}

$role = strtolower(trim($_SESSION["role"] ?? ""));

if ($role === "citizen") {
    header("Location: Citizen/MVC/html/dashboard.php");
    exit();
}

if ($role === "counselor") {
    header("Location: Counselor/MVC/html/dashboard.php");
    exit();
}

if ($role === "secretary") {
    header("Location: Secretary/MVC/html/dashboard.php");
    exit();
}

if ($role === "mayor") {
    header("Location: Mayor/MVC/html/dashboard.php");
    exit();
}

header("Location: Citizen/MVC/html/login_view.php?error=role");
exit();
