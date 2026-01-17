<?php
session_start();
require_once __DIR__ . "/../db/db.php";
global $conn;

if (isset($_COOKIE["remember_token"]) && $_COOKIE["remember_token"] !== "") {
    $tokenHash = hash("sha256", $_COOKIE["remember_token"]);
    $stmt = $conn->prepare("DELETE FROM remember_tokens WHERE token_hash = ?");
    $stmt->bind_param("s", $tokenHash);
    $stmt->execute();
}

setcookie("remember_token", "", time() - 3600, "/");

session_unset();
session_destroy();

header("Location: ../html/login_view.php");
exit();
