<?php
require_once __DIR__ . "/auth.php";
require_once __DIR__ . "/complaint_model.php";

$success = "";
$error = "";

$allowedTypes = ["waste_management", "drainage", "road_damage", "streetlight", "other"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $type = trim($_POST["type"] ?? "");
    $location = trim($_POST["location"] ?? "");

    if ($title === "" || $description === "" || $type === "" || $location === "") {
        $error = "All fields are required.";
    } else if (!in_array($type, $allowedTypes, true)) {
        $error = "Invalid complaint type.";
    } else {
        $ok = complaint_create((int) $_SESSION["user_id"], $title, $description, $type, $location);

        if ($ok) {
            $success = "Complaint submitted successfully.";
        } else {
            $error = "Failed to submit complaint. Please try again.";
        }
    }
}

require_once __DIR__ . "/../html/complaint_create_view.php";
