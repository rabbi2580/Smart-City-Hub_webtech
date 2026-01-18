<?php
require_once __DIR__ . "/auth.php";
require_once __DIR__ . "/complaint_model.php";

header("Content-Type: application/json; charset=utf-8");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["ok" => false, "message" => "Method not allowed"]);
    exit();
}

$title = trim($_POST["title"] ?? "");
$description = trim($_POST["description"] ?? "");
$type = trim($_POST["type"] ?? "");
$location = trim($_POST["location"] ?? "");

$allowedTypes = ["waste_management", "drainage", "road_damage", "streetlight", "other"];

if ($title === "" || $description === "" || $type === "" || $location === "") {
    http_response_code(400);
    echo json_encode(["ok" => false, "message" => "All fields are required."]);
    exit();
}

if (!in_array($type, $allowedTypes, true)) {
    http_response_code(400);
    echo json_encode(["ok" => false, "message" => "Invalid complaint type."]);
    exit();
}

$ok = complaint_create((int) $_SESSION["user_id"], $title, $description, $type, $location);

if (!$ok) {
    http_response_code(500);
    echo json_encode(["ok" => false, "message" => "Server error. Complaint not submitted."]);
    exit();
}

echo json_encode(["ok" => true, "message" => "Complaint submitted successfully."]);
