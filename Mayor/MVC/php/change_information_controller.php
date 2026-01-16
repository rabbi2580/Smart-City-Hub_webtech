<?php
session_start();
include '../../../db.php';
if(!isset($_SESSION['user_id'])||$_SESSION['role']!=='mayor'){
    header('Location: ../../../Citizen/MVC/login.php');
    exit;
}
$user_id=$_SESSION['user_id'];
$sql="SELECT name, phone,location FROM users WHERE id=".intval($user_id);
$result=mysqli_query($conn,$sql);
$user=null;
$success="";
$error ="";
if($result && mysqli_num_rows($result)>0){
    $user =mysqli_fetch_assoc($result);
}
else{
    $error="User not found ";
}
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
        $sql="UPDATE users SET name ='$name', phone='$phone', location='$location'";
        if($password){
            $hashed=password_hash($password,PASSWORD_DEFAULT);
            $sql.=",password='$hashed'";

        }
        $sql.="WHERE id=$user_id";
        if(mysqli_query($conn,$sql)){
            $success ="Information update successfully";
            $user=[
                'name'=>$name,
                'phone'=>$phone,
                'location'=>$location
            ];

        }
        else{
            $error="Error". mysqli_errno($conn);
        }
    }
}

include '../html/change_information.php';
?>