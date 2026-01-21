<?php
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../../../db.php';

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = "Please fill in all fields";
    } else {
        $stmt = $conn->prepare(
            "SELECT id, username, password, role, name 
             FROM users 
             WHERE username = ? AND role = 'mayor'"
        );
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['username']  = $user['username'];
                $_SESSION['role']      = $user['role'];
                $_SESSION['user_name'] = $user['name'];

                header("Location: mayor_dashboard_controller.php");
                exit;
            } else {
                $error = "Incorrect password";
            }
        } else {
            $error = "No mayor account found with this username";
        }
        $stmt->close();
    }
}

include '../html/mayor_login.html';
