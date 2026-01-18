<?php


if (isset($_SESSION["user_id"])) {
    header("Location: html/dashboard.php");
} else {
    header("Location: html/login_view.php");
}
exit();
