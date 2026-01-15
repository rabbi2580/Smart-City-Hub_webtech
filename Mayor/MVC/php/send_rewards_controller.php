<?php
session_start();
include '../../../db.php';
if (!isset($_SESSION['user_id'])||$_SESSION['role']!=='mayor'){
    header('Location: ../../../Citizen/MVC/html/login.php');
    exit;
}
include '../html/send_rewards.php';
?>