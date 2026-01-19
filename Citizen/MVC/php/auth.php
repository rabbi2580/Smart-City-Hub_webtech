<?php
session_start();

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

if (!isset($_SESSION["user_id"])) {
    header("Location: ../html/login_view.php");
    exit();
}

$role = strtolower(trim($_SESSION["role"] ?? ""));
if ($role !== "citizen") {
    redirect_to_dashboard_by_role($role);
}
