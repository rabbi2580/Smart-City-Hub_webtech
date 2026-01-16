<?php
$host="localhost";
$user="root";
$pass ="";
$dbname="smart_city_hub";
$conn=mysqli_connect($host,$user,$pass,$dbname);
if(!$conn){
    die("connection fail".mysqli_connect_error());

}
?>