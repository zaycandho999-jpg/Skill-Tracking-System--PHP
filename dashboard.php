<?php
session_start();
include('db_connect.php');

if($_SESSION['role']!='student'){header("Location: login.php");exit();}

$uid=$_SESSION['user_id'];

$total=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(hours) t FROM skill_logs WHERE user_id=$uid"))['t'] ?? 0;
$approved=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(hours) t FROM skill_logs WHERE user_id=$uid AND status='approved'"))['t'] ?? 0;
$pending=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) t FROM skill_logs WHERE user_id=$uid AND status='pending'"))['t'] ?? 0;
$rejected=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) t FROM skill_logs WHERE user_id=$uid AND status='rejected'"))['t'] ?? 0;

$res=mysqli_query($conn,"SELECT * FROM skill_logs WHERE user_id=$uid ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
body{margin:0;font-family:sans-serif;background:#0f172a;color:white;display:flex;}
.sidebar{width:230px;background:#020617;padding:20px;height:100vh;}
.sidebar a{display:block;color:white;margin:15px 0;text-decoration:none;}
.main{flex:1;padding:20px;}
.cards{display:flex;gap:20px;margin-bottom:20px;}
.card{
flex:1;
background:rgba(255,255,255,0.08);
padding:20px;
border-radius:15px;
backdrop-filter: blur(10px);
box-shadow:0 0 30px rgba(0,0,0,0.4);
}
.table{width:100%;border-collapse:collapse;}
.table th,.table td{padding:10px;border-bottom:1px solid #333;}
.badge{padding:5px 10px;border-radius:10px;}
.approved{background:#22c55e;}
.pending{background:#facc15;}
.rejected{background:#ef4444;}
</style>
</head>
<body>

<div class="sidebar">
<h3>Student</h3>
<a href="#">Dashboard</a>
<a href="submit_hours.php">Submit</a>
<a href="reports.php">Reports</a>
<a href="logout.php">Logout</a>
</div>

<div class="main">

<h2>Welcome <?php echo $_SESSION['name']; ?></h2>

<div class="cards">
<div class="card">Total Hours: <?php echo $total; ?></div>
<div class="card">Approved: <?php echo $approved; ?></div>
<div class="card">Pending: <?php echo $pending; ?></div>
<div class="card">Rejected: <?php echo $rejected; ?></div>
</div>

<canvas id="chart"></canvas>

<script>
new Chart(document.getElementById("chart"),{
type:'doughnut',
data:{
labels:['Approved','Pending','Rejected'],
datasets:[{
data:[<?php echo $approved; ?>,<?php echo $pending; ?>,<?php echo $rejected; ?>]
}]
}
});
</script>

<h3>Recent Activities</h3>

<table class="table">
<tr><th>Task</th><th>Hours</th><th>Status</th></tr>

<?php
while($r=mysqli_fetch_assoc($res)){
$status=$r['status'];
echo "<tr>
<td>{$r['task_title']}</td>
<td>{$r['hours']}</td>
<td><span class='badge $status'>$status</span></td>
</tr>";
}
?>
</table>

</div>
</body>
</html>