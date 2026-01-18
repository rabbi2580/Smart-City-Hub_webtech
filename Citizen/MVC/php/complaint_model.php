<?php
require_once __DIR__ . "/../db/db.php";

function complaint_create($citizen_id, $title, $description, $type, $location) {
    global $conn;

    $stmt = $conn->prepare(
        "INSERT INTO complaints (citizen_id, title, description, type, location)
         VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("issss", $citizen_id, $title, $description, $type, $location);
    return $stmt->execute();
}

function complaint_get_by_user($citizen_id) {
    global $conn;

    $stmt = $conn->prepare(
        "SELECT id, title, type, status, location
         FROM complaints
         WHERE citizen_id = ?
         ORDER BY id DESC"
    );
    $stmt->bind_param("i", $citizen_id);
    $stmt->execute();
    return $stmt->get_result();
}
