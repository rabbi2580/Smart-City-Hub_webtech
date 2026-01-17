<?php
require_once __DIR__ . "/../db/db.php";

/*
  IMPORTANT:
  Change ONLY this variable if your complaints table uses a different column name
  for the logged-in citizen reference (examples: user_id, userid, citizen_user_id).
*/
const COMPLAINT_USER_COL = "citizen_id";

function complaint_create($user_id, $title, $description, $location) {
    global $conn;

    $col = COMPLAINT_USER_COL;

    $sql = "INSERT INTO complaints ($col, title, description, location, status)
            VALUES (?, ?, ?, ?, 'Pending')";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $title, $description, $location);
    return $stmt->execute();
}

function complaint_get_by_user($user_id) {
    global $conn;

    $col = COMPLAINT_USER_COL;

    // SELECT * so it works even if created_at does not exist
    $sql = "SELECT * FROM complaints WHERE $col = ? ORDER BY id DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    return $stmt->get_result();
}
