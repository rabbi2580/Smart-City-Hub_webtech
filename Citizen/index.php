<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: MVC/html/dashboard.php");
} else {
    header("Location: MVC/html/login_view.php");
}
exit();