<?php 
session_start(); 
include('db_connect.php');
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_SESSION['user_id'];
    $skill = mysqli_real_escape_string($conn, $_POST['skill_name']);
    $hours = mysqli_real_escape_string($conn, $_POST['hours']);
    $query = "INSERT INTO skill_logs (user_id, skill_name, hours, status) VALUES ('$uid', '$skill', '$hours', 'pending')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Saacadaha waa la gudbiyey!'); window.location.href='dashboard.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Hours - Skill Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { margin: 0; padding: 0; font-family: sans-serif; background: linear-gradient(135deg, #a855f7 0%, #3b82f6 100%); display: flex; justify-content: center; align-items: center; height: 100vh; }
        .form-container { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); width: 800px; display: flex; align-items: center; }
        .avatar-side { flex: 1; text-align: center; border-right: 1px solid #eee; }
        .avatar-side i { font-size: 100px; color: #3b82f6; background: #f0f7ff; padding: 40px; border-radius: 50%; }
        .input-side { flex: 1.5; padding-left: 40px; }
        h2 { color: #444; margin-bottom: 30px; }
        .input-group { position: relative; margin-bottom: 20px; }
        .input-group i { position: absolute; left: 15px; top: 15px; color: #3b82f6; }
        input { width: 100%; padding: 12px 12px 12px 45px; border-radius: 25px; border: 1px solid #ddd; background: #f9f9f9; box-sizing: border-box; }
        .btn-submit { background: #3b82f6; color: white; border: none; padding: 12px; width: 100%; border-radius: 25px; font-weight: bold; cursor: pointer; text-transform: uppercase; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #3b82f6; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="avatar-side">
            <i class="fas fa-clock"></i>
            <p style="margin-top:15px; color:#666; font-weight:bold;">Track Your Progress</p>
        </div>
        <div class="input-side">
            <h2>Gudbi Saacadaha</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <i class="fas fa-lightbulb"></i>
                    <input type="text" name="skill_name" placeholder="Magaca Skill-ka (Tusaale: PHP)" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-hourglass-half"></i>
                    <input type="number" name="hours" placeholder="Saacadaha aad shaqaysay" required>
                </div>
                <button type="submit" class="btn-submit">Submit Hours</button>
                <a href="dashboard.php" class="back-link">Back to Dashboard</a>
            </form>
        </div>
    </div>
</body>
</html>