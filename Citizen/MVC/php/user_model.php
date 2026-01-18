<?php
require_once __DIR__ . "/../db/db.php";

function user_find_by_username($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function user_find_by_id($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function user_username_exists($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT 1 FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res && $res->num_rows > 0;
}

function user_create_citizen($username, $password_hash, $name, $id_number, $phone, $location, $area) {
    global $conn;

    $role = "citizen"; // your enum uses lowercase citizen

    $stmt = $conn->prepare(
        "INSERT INTO users (username, password, name, id_number, phone, location, area, role)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssssssss",
        $username,
        $password_hash,
        $name,
        $id_number,
        $phone,
        $location,
        $area,
        $role
    );

    return $stmt->execute();
}

function user_update_profile_details($id, $name, $phone, $location, $area) {
    global $conn;
    $stmt = $conn->prepare(
        "UPDATE users SET name = ?, phone = ?, location = ?, area = ? WHERE id = ?"
    );
    $stmt->bind_param("ssssi", $name, $phone, $location, $area, $id);
    return $stmt->execute();
}
