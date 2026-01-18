<?php
session_start();
require_once __DIR__ . "/user_model.php";
require_once __DIR__ . "/../db/db.php";

function auth_login_with_cookie() {
    global $conn;

    if (isset($_SESSION["user_id"])) {
        return true;
    }

    if (!isset($_COOKIE["remember_token"]) || $_COOKIE["remember_token"] === "") {
        return false;
    }

    $tokenHash = hash("sha256", $_COOKIE["remember_token"]);

    $stmt = $conn->prepare(
        "SELECT rt.user_id, u.username, u.role
         FROM remember_tokens rt
         JOIN users u ON u.id = rt.user_id
         WHERE rt.token_hash = ? AND rt.expires_at > NOW()
         LIMIT 1"
    );
    $stmt->bind_param("s", $tokenHash);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();

    if (!$row) {
        return false;
    }

    $_SESSION["user_id"] = (int) $row["user_id"];
    $_SESSION["username"] = $row["username"];
    $_SESSION["role"] = $row["role"];
    return true;
}

if (!auth_login_with_cookie()) {
    header("Location: ../html/login_view.php");
    exit();
}
