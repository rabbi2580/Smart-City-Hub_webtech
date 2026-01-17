<?php
require_once __DIR__ . "/auth.php";
require_once __DIR__ . "/complaint_model.php";

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $location = trim($_POST["location"] ?? "");

    if ($title === "" || $description === "" || $location === "") {
        $error = "All fields are required.";
    } else {
        $ok = complaint_create((int) $_SESSION["user_id"], $title, $description, $location);

        if ($ok) {
            $success = "Complaint submitted successfully.";
        } else {
            $error = "Failed to submit complaint. Please try again.";
        }
    }
}

require_once __DIR__ . "/../html/complaint_create_view.php";
