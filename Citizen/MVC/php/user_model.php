<?php
require_once __DIR__ . "/../db/db.php";

function user_create($username, $email, $password_hash) {
    global $conn;
    $stmt = $conn->prepare(
        "INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $username, $email, $password_hash);
    return $stmt->execute();
}

function user_find_by_username($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function user_update_profile($id, $username, $email) {
    global $conn;
    $stmt = $conn->prepare(
        "UPDATE users SET username = ?, email = ? WHERE id = ?"
    );
    $stmt->bind_param("ssi", $username, $email, $id);
    return $stmt->execute();
}
