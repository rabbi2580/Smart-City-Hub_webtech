<?php
require_once __DIR__ . "/db.php";

function complaint_create($user_id, $title, $description, $location) {
    global $conn;

    $sql = "INSERT INTO complaints (user_id, title, description, location, status)
            VALUES (?, ?, ?, ?, 'Pending')";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $title, $description, $location);

    return $stmt->execute();
}

function complaint_get_by_user($user_id) {
    global $conn;

    $sql = "SELECT id, title, status, created_at
            FROM complaints
            WHERE user_id = ?
            ORDER BY created_at DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    return $stmt->get_result();
}
?>
