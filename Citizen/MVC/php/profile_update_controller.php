<?php
session_start();
require_once "user_model.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: ../html/login.php");
    exit();
}

$name = trim($_POST["name"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$location = trim($_POST["location"] ?? "");
$area = trim($_POST["area"] ?? "");

if ($name === "" || $phone === "" || $location === "") {
    header("Location: ../html/profile_edit.php");
    exit();
}

$areaValue = $area === "" ? null : $area;

$ok = user_update_profile(
    $_SESSION["user_id"],
    $name,
    $phone,
    $location,
    $areaValue
);

if ($ok) {
    $_SESSION["user_name"] = $name;
}

header("Location: ../html/profile_edit.php?msg=ok");
exit();
