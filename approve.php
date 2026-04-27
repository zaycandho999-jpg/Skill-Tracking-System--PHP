<?php
include('db_connect.php');

$id = $_GET['id'];

$stmt = $conn->prepare("UPDATE skill_logs SET status='approved' WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: supervisor_dashboard.php");
?>