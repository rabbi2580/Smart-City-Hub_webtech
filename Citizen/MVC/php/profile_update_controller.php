<?php
require_once __DIR__ . "/auth.php";
require_once __DIR__ . "/user_model.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $email = trim($_POST["email"] ?? "");

    if ($username === "" || $email === "") {
        $error = "All fields are required";
    } else {
        if (user_update_profile($_SESSION["user_id"], $username, $email)) {
            $_SESSION["username"] = $username;
            $success = "Profile updated successfully";
        } else {
            $error = "Update failed";
        }
    }
}

require_once __DIR__ . "/../html/profile_update_view.php";
