<?php
session_start();
include('db_connect.php');

if(!isset($_SESSION['user_id']) || $_SESSION['role']!='supervisor'){
    header("Location: login.php");
    exit();
}

$id = (int)$_GET['id'];
$status = $_GET['status'];
$comment = $_POST['comment'] ?? '';

$sql = "UPDATE skill_logs 
SET status='$status', supervisor_comment='$comment' 
WHERE id=$id";

if(mysqli_query($conn,$sql)){
    header("Location: supervisor_dashboard.php");
} else {
    echo mysqli_error($conn);
}
?>