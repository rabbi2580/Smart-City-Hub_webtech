<?php
session_start();
include '../../../db.php';
if (!isset($_SESSION['user_id'])||$_SESSION['role']!=='mayor'){
    header('Location: ../../../Citizen/MVC/html/login.php');
    exit;
}
$selected_ids=[];
if(isset($_GET['selected'])){
    $selected_ids=explode(',',$_GET['selected']);
    $selected_ids=array_map('intval',$selected_ids);
    
}
$complaints_info=[];
if(!empty($selected_ids)){
    $placeholders=implode(',',array_fill(0,count($selected_ids),'?'));
    $stmt = $conn->prepare("SELECT id, title FROM complaints WHERE id IN ($placeholders)");
    $stmt->bind_param(str_repeat('i', count($selected_ids)), ...$selected_ids);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $complaints_info[] = $row;
    }
}
include '../html/send_rewards.php';
?>