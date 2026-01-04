<?php
session_start();
include "SmartCityHub/Citizen/MVC/db/db_connection.php";
$message='';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $id_number = trim($_POST['id_number']);
    $phone = trim($_POST['phone']);
    $location = trim($_POST['location']);
    if($password!==$confirm_password){
        $message="Pass do not mathched";

    }
    elseif(strlen($password)<8)
    {
        $message="Pass must be > 8 characters";



    }
    else{
        try{
            $check=$pdo->prepare("SELECT id FROM users WHERE username=? OR id_number=?");
            $check->execute([$username,$id_number]);
            if($check->rowCount()>0){
                $message="Username or ID is already Registerd";

            }
            else{
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $full_name = $first_name . " " . $last_name;

                $stmt = $pdo->prepare("INSERT INTO users (username, password, name, id_number, phone, location, role) 
                                       VALUES (?, ?, ?, ?, ?, ?, 'citizen')");
                $stmt->execute([$username, $hashed, $full_name, $id_number, $phone, $location]);
                $message = "Registration successful! You can now login.";
            }
             
            }
        catch(PDOException $e){
            $message="Error:" . $e->getMessage(); 

        }

        }
    }
include "SmartCityHub/Citizen/MVC/html/register.php"
?>