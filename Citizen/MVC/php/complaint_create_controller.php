<?php
require_once "auth.php";
require_once "complaint_model.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $location = trim($_POST["location"] ?? "");

    if ($title === "" || $description === "") {
        $error = "Title and description are required.";
    } else {
        if (complaint_create($_SESSION["user_id"], $title, $description, $location)) {
            $success = "Complaint submitted successfully.";
        } else {
            $error = "Failed to submit complaint.";
        }
    }
}

require_once __DIR__ . "/../html/complaint_create_view.php";
