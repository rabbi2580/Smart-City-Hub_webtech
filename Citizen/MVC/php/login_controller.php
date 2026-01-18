<?php
session_start();
require_once __DIR__ . "/user_model.php";

function remember_token_set($user_id) {
    require_once __DIR__ . "/../db/db.php";
    global $conn;

    $token = bin2hex(random_bytes(32));
    $tokenHash = hash("sha256", $token);
    $expiresAt = date("Y-m-d H:i:s", time() + (60 * 60 * 24 * 30));

    $stmt = $conn->prepare("INSERT INTO remember_tokens (user_id, token_hash, expires_at) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $tokenHash, $expiresAt);
    $stmt->execute();

    setcookie("remember_token", $token, [
        "expires" => time() + (60 * 60 * 24 * 30),
        "path" => "/",
        "httponly" => true,
        "samesite" => "Lax"
    ]);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";
    $remember = isset($_POST["remember_me"]) && $_POST["remember_me"] === "1";

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

    if ($remember) {
        remember_token_set((int) $user["id"]);
    }

    header("Location: ../html/dashboard.php");
    exit();
}

require_once __DIR__ . "/../html/login_view.php";
