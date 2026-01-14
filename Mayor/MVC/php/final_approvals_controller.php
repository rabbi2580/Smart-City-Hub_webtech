<?php
session_start();
include '../../../db.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mayor') {
    header('Location: ../../../Citizen/MVC/html/login.php');
    exit;
}
$sql="SELECT c.id, c.title, c.type,c.status,u.name AS citizen_name
      FROM complaints c
      LEFT JOIN users u ON c.citizen_id=u.id
      WHERE c.status ='completed'
      ORDER BY c.submitted_at DESC";
$result = mysqli_query($conn,$sql);
$complaints =[];
while($row=mysqli_fetch_array($result)){
    $complaints[]=$row;
}
include '../html/final_approvals.php';
?>
