<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: /Smart-City-Hub_webtech/Citizen/MVC/html/dashboard.php");
    

} else {
header("Location: /Smart-City-Hub_webtech/Citizen/MVC/html/login_view.php");

}
exit();