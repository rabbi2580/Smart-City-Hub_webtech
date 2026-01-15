<?php
session_start();
include '../../../db.php';
if(!isset($_SESSION['user_id'])||$_SESSION['role']!=='mayor'){
    echo "Unauthorized access!";
    exit;
}
