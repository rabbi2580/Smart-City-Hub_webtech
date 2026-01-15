<?php
session_start();
include '../../../db.php';
if(!isset($_SESSION['user_id'])||$_SESSION['role']!=='mayor'){
    header('Location: ../../../Citizen/MVC/login.php');
    exit;
}
$user_id=$_SESSION['user_id'];
$sql="SELECT * FROM users WHERE id =$user_id";
$result=mysqli_query($conn,$sql);
$user=mysqli_fetch_array($result);
$success= $error ="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $location = mysqli_real_escape_string($conn, trim($_POST['location']));
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    if($password && $password!==$confirm){
        $error="pass not matchged";

    }
    else{
        
    }