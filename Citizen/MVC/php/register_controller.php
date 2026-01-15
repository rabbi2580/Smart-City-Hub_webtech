<?php
session_start();
include "../../../../db.php";
$success=$error="";
$form_data=$_POST;
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $first_name = mysqli_real_escape_string($conn,trim($_POST['first_name'] ??''));
    $last_name = mysqli_real_escape_string($conn,trim($_POST['last_name'] ??''));
    $username = mysqli_real_escape_string($conn,trim($_POST['username'] ??''));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $id_number = mysqli_real_escape_string($conn,trim($_POST['id_number'] ??''));
    $phone = mysqli_real_escape_string($conn,trim($_POST['phone'] ??''));
    $location = mysqli_real_escape_string($conn,trim($_POST['location'] ??''));
    $phone_clean=preg_replace('/\D/', '', $phone);
    if (strlen($phone_clean)!==11){
        $error='Phone number must be 11 digit ';
    }  elseif($password!==$confirm_password){
        $error="Pass do not mathched";
    }
       elseif(strlen($password)<8)
    {
        $error="Pass must be > 8 characters";
    }
        elseif(empty($first_name)||empty($last_name)||empty($username)||empty($id_number)||empty($phone)||empty($location)){
            $error="fillup all the box";
        }
        else{
            $check_sql="SELECT id FROM users WHERE username='$username' OR id_number='$id_number'";
            $check_result=mysqli_query($conn,$check_sql);
            if(mysqli_num_rows($check_result)>0){
                $error="username or id is already registered";

            } 
            else{
                $hashed=password_hash($password,PASSWORD_DEFAULT);
                $full_name =$first_name." ". $last_name;
                $sql="INSERT INTO users (username, password, name, id_number, phone, location, role) 
                    VALUES ('$username', '$hashed', '$full_name', '$id_number', '$phone_clean', '$location', 'citizen')";
                if(mysqli_query($conn,$sql)){
                    $success="Registration successful";
                
                }
                else{
                    $error="Error". mysqli_error($conn);
                }


            }
        }
    }
$message=$success?'<p style ="color:green;">'. $success . '</p>': ($error ? '<p style="color:red;">'. $error . '</p>' : '');
include '../html/register.php';
?>