<?php
session_start();
include '../../../db.php';
if (!isset($_SESSION['user_id'])||$_SESSION['role']!=='mayor'){
    header('Location: ../../../Citizen/MVC/html/login.php');
    exit;
}
$success =$error ="";
$selected_ids=[];
$complaints_info=[];
if(isset($_GET['selected'])&&!empty($_GET['selected'])){
    $selected_ids=explode(',',$_GET['selected']);
    $selected_ids=array_map('intval',$selected_ids);
    if(!empty($selected_ids)){
    $placeholders=implode(',',array_fill(0,count($selected_ids),'?'));
    $stmt = $conn->prepare("SELECT id, title FROM complaints WHERE id IN ($placeholders)");
    $stmt->bind_param(str_repeat('i', count($selected_ids)), ...$selected_ids);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $complaints_info[] = $row;
    }
    $stmt->close();
}
else{
    $error="databse error" . $conn->error;
}
if($_SERVER['REQUEST_METHOD']==='POST'){
    $posted_ids = explode(',', $_POST['selected_ids'] ?? '');
    $posted_ids = array_filter(array_map('intval', $posted_ids));
    $reward_message = trim($_POST['reward_message'] ?? '');

    if (empty($posted_ids) || empty($reward_message)) {
        $error = "No complaints selected or message is empty.";
}
else{
    $mayor_id = $_SESSION['user_id'];
        $now = date('Y-m-d H:i:s');

        
        $placeholders = implode(',', array_fill(0, count($posted_ids), '?'));
        $stmt = $conn->prepare("
            UPDATE complaints 
            SET reward_message = ?,
                reward_sent_at = ?,
                reward_sent_by = ?
            WHERE id IN ($placeholders)
        ");

        if ($stmt) {
            
            $types = 'ssi' . str_repeat('i', count($posted_ids));
            $stmt->bind_param($types, $reward_message, $now, $mayor_id, ...$posted_ids);

            if ($stmt->execute()) {
                $success = "Reward message sent successfully to " . $stmt->affected_rows . " citizen" . ($stmt->affected_rows === 1 ? '' : 's') . "!";
                header("Refresh: 2; url=../php/final_approvals_controller.php");
            } else {
                $error = "Failed to save reward: " . $stmt->error;
            }
            $stmt->close();
        }
        else{
            $error="prepare failed:".$conn->$error;
        }
}
}
}
include '../html/send_rewards.php';
?>