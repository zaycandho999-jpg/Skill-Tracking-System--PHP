<?php
session_start();
include('db_connect.php');

if(!isset($_SESSION['user_id']) || $_SESSION['role']!='admin'){
    header("Location: login.php");
    exit();
}

// STATS
$total_users = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM users"))['t'];
$total_students = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM users WHERE role='student'"))['t'];
$total_supervisors = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM users WHERE role='supervisor'"))['t'];

$total_hours = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(hours) as t FROM skill_logs"))['t'];
$approved_hours = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(hours) as t FROM skill_logs WHERE status='approved'"))['t'];
$pending = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as t FROM skill_logs WHERE status='pending'"))['t'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<style>
body {font-family: Arial; background:#f4f6f9; margin:0;}
.header {background:#111827; color:white; padding:20px; text-align:center;}
.container {padding:20px;}
.cards {display:flex; gap:20px; flex-wrap:wrap;}
.card {background:white; padding:20px; border-radius:10px; flex:1; min-width:200px; box-shadow:0 4px 10px rgba(0,0,0,0.1);}
.card h2 {margin:0;}
.table {width:100%; margin-top:20px; border-collapse:collapse;}
.table th, .table td {padding:10px; border-bottom:1px solid #ddd;}
.badge {padding:5px 10px; border-radius:5px;}
.approved {background:green; color:white;}
.pending {background:orange; color:white;}
.rejected {background:red; color:white;}
</style>
</head>
<body>

<div class="header">
<h1>Admin Dashboard</h1>
</div>

<div class="container">

<div class="cards">
<div class="card"><h2><?php echo $total_users ?></h2><p>Total Users</p></div>
<div class="card"><h2><?php echo $total_students ?></h2><p>Students</p></div>
<div class="card"><h2><?php echo $total_supervisors ?></h2><p>Supervisors</p></div>
<div class="card"><h2><?php echo $total_hours ?></h2><p>Total Hours</p></div>
<div class="card"><h2><?php echo $approved_hours ?></h2><p>Approved Hours</p></div>
<div class="card"><h2><?php echo $pending ?></h2><p>Pending Requests</p></div>
</div>

<h2>All Activities</h2>

<table class="table">
<tr>
<th>Student</th>
<th>Task</th>
<th>Hours</th>
<th>Status</th>
<th>Date</th>
</tr>

<?php
$result = mysqli_query($conn,"SELECT skill_logs.*, users.full_name 
FROM skill_logs JOIN users ON users.id = skill_logs.user_id");

while($row = mysqli_fetch_assoc($result)){
echo "<tr>
<td>{$row['full_name']}</td>
<td>{$row['skill_name']}</td>
<td>{$row['hours']}</td>
<td><span class='badge {$row['status']}'>{$row['status']}</span></td>
<td>{$row['created_at']}</td>
</tr>";
}
?>

</table>

</div>
</body>
</html>