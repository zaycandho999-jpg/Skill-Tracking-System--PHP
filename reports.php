<?php
session_start();
include('db_connect.php');

$uid=$_SESSION['user_id'];

$weekly=mysqli_fetch_assoc(mysqli_query($conn,"
SELECT SUM(hours) t FROM skill_logs 
WHERE user_id=$uid AND YEARWEEK(activity_date)=YEARWEEK(NOW())
"))['t'];

$monthly=mysqli_fetch_assoc(mysqli_query($conn,"
SELECT SUM(hours) t FROM skill_logs 
WHERE user_id=$uid AND MONTH(activity_date)=MONTH(NOW())
"))['t'];
?>

<h2>Reports</h2>

<p>Weekly Hours: <?php echo $weekly ?? 0; ?></p>
<p>Monthly Hours: <?php echo $monthly ?? 0; ?></p>

<a href="dashboard.php">Back</a>