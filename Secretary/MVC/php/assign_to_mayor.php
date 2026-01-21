<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'secretary') {
    header("Location: ../../User/MVC/html/login.php");
    exit;
}
require_once "../db/db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['complaint_id'])) {
    $complaint_id = (int) $_POST['complaint_id'];
    $stmt = $conn->prepare("UPDATE complaints SET status = 'Completed' WHERE id = ?");
    $stmt->bind_param("i", $complaint_id);

    if ($stmt->execute()) {
        
        header("Location: /Smart-City-Hub_webtech/Secretary/MVC/html/forwardcom.php?success=1");

        exit;
    } else {
        die("Error updating complaint: " . $conn->error);
    }

} else {
    header("Location:../html/forwardcom.php");
    exit;
}
