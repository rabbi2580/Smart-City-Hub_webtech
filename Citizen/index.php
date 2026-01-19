<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: Citizen/MVC/html/dashboard.php");
} else {
    header("Location: Citizen/MVC/html/login_view.php");
}
exit();