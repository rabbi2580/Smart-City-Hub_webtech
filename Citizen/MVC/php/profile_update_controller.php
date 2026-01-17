<?php
require_once __DIR__ . "/auth.php";
require_once __DIR__ . "/user_model.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../html/profile_update_view.php");
    exit();
}

$name = trim($_POST["name"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$location = trim($_POST["location"] ?? "");
$area = trim($_POST["area"] ?? "");
$areaValue = $area === "" ? null : $area;

if ($name === "" || $phone === "" || $location === "") {
    header("Location: ../html/profile_update_view.php?msg=fail");
    exit();
}

$ok = user_update_profile_details((int) $_SESSION["user_id"], $name, $phone, $location, $areaValue);

if (!$ok) {
    header("Location: ../html/profile_update_view.php?msg=fail");
    exit();
}

header("Location: ../html/profile_update_view.php?msg=ok");
exit();
