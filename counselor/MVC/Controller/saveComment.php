<?php
session_start();
require $_SERVER['DOCUMENT_ROOT']."/Smart-City-Hub_webtech/counselor/MVC/db/coun.php";

$id = $_POST['id'];
$comment = $_POST['comment'];

mysqli_query(
  $conn,
  "UPDATE complaints SET counselor_comment='$comment' WHERE id=$id"
);

header("Location: ../html/counselor.php");
exit;
