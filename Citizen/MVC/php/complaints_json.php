<?php
require_once __DIR__ . "/auth.php";
require_once __DIR__ . "/../db/db.php";

header("Content-Type: application/json; charset=utf-8");

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    http_response_code(405);
    echo json_encode(["ok" => false, "message" => "Method not allowed"]);
    exit();
}

$citizen_id = (int) $_SESSION["user_id"];

$stmt = $conn->prepare(
    "SELECT id, title, status, location
     FROM complaints
     WHERE citizen_id = ?
     ORDER BY id DESC"
);
$stmt->bind_param("i", $citizen_id);
$stmt->execute();

$res = $stmt->get_result();
$rows = [];

while ($row = $res->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode(["ok" => true, "data" => $rows]);
