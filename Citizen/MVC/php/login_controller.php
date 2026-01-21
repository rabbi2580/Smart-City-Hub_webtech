<?php
session_start();

require_once __DIR__ . "/user_model.php";
require_once __DIR__ . "/../db/db.php";

function remember_token_set($user_id)
{
    global $conn;

    $stmt = $conn->prepare("DELETE FROM remember_tokens WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $token = bin2hex(random_bytes(32));
    $tokenHash = hash("sha256", $token);
    $expiresAt = date("Y-m-d H:i:s", time() + (60 * 60 * 24 * 30));

    $stmt = $conn->prepare(
        "INSERT INTO remember_tokens (user_id, token_hash, expires_at) VALUES (?, ?, ?)"
    );
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
    $remember = isset($_POST["remember_me"]);

    if ($username === "" || $password === "") {
        header("Location: ../html/login_view.php?error=1");
        exit;
    }

    
    $user = user_find_by_username($username);
    

    if (!$user) {
        header("Location: ../html/login_view.php?error=1");
        exit;
    }

    
    if (!password_verify($password, $user["password"])) {
        header("Location: ../html/login_view.php?error=1");
        exit;
    }

    
    session_regenerate_id(true);

    $_SESSION["user_id"]  = (int)$user["id"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["role"]     = strtolower(trim($user["role"]));
    $_SESSION["name"]     = $user["name"] ?? "";
    $_SESSION["area"]     = $user["area"] ?? "";

    if ($remember) {
        remember_token_set((int)$user["id"]);
    }

    
    switch ($_SESSION["role"]) {
        case "citizen":
            header("Location: /Smart-City-Hub_webtech/Citizen/MVC/html/dashboard.php");
            break;
        case "mayor":
            header("Location: /Smart-City-Hub_webtech/Mayor/MVC/html/mayor_dashboard.php");
            break;
        case "counselor":
            header("Location: /Smart-City-Hub_webtech/counselor/MVC/html/counselor.php");
            break;
        case "secretary":
            header("Location: /Smart-City-Hub_webtech/Secretary/MVC/html/secretary.php");
            break;
        default:
            session_destroy();
            header("Location: ../html/login_view.php");
    }

    exit;
}

// Direct access: show login
require_once __DIR__ . "/../html/login_view.php";
