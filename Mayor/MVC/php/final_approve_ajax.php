<?php
session_start();
include '../../../db.php';
if(!isset($_SESSION['user_id'])||$_SESSION['role']!=='mayor'){
    echo "Unauthorized access!";
    exit;
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $action =$_POST['action'];
    $selected=$_POST['selected']??[];
    if(empty($selected)){
        echo "No complain selected";
        exit;
    }
    $new_status=($action=='approve')?'final_approved': 'rejected';
    $ids= implode(',',array_map('intval',$selected));
    $sql="UPDATE complaints SET status ='$new_status',mayor_id={$_SESSION['user_id']} WHERE id IN ($ids)";
    mysqli_query($conn,$sql);
    echo($action=='approve')? "selected complaints approved successfully" :"slected complaint rejected";

}
?>