<?php
require_once __DIR__ . "/../db/db.php";

function complaint_create($user_id, $title, $description, $location) {
    global $conn;

    $stmt = $conn->prepare(
        "INSERT INTO complaints (citizen_id, title, description, location, status)
         VALUES (?, ?, ?, ?, 'Pending')"
    );
    $stmt->bind_param("isss", $user_id, $title, $description, $location);
    return $stmt->execute();
}

function complaint_get_by_user($user_id) {
    global $conn;

    $stmt = $conn->prepare(
        "SELECT id, title, status, location, created_at
         FROM complaints
         WHERE citizen_id = ?
         ORDER BY created_at DESC"
    );
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    return $stmt->get_result();
}
