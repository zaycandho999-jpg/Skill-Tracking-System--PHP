<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account - Skill Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; background: linear-gradient(135deg, #a855f7 0%, #3b82f6 100%); display: flex; justify-content: center; align-items: center; height: 100vh; }
        .register-container { background-color: white; padding: 45px; border-radius: 12px; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3); width: 100%; max-width: 850px; display: flex; align-items: center; justify-content: space-between; }
        .avatar-section { flex: 1; display: flex; justify-content: center; border-right: 1px solid #f0f2f5; }
        .avatar-circle { background-color: #f0f2f5; width: 220px; height: 220px; border-radius: 50%; display: flex; justify-content: center; align-items: center; border: 5px solid #3b82f6; }
        .avatar-circle i { font-size: 110px; color: #3b82f6; }
        .form-section { flex: 1.2; padding: 0 40px; text-align: center; }
        h2 { margin-bottom: 25px; color: #333; font-size: 30px; font-weight: 700; }
        .input-group { position: relative; margin-bottom: 18px; }
        .input-group i { position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #3b82f6; }
        input, select { width: 100%; padding: 14px 14px 14px 50px; border-radius: 35px; border: 1px solid #ddd; background-color: #f8f9fa; font-size: 16px; box-sizing: border-box; outline: none; transition: 0.3s; }
        input:focus { border-color: #3b82f6; box-shadow: 0 0 8px rgba(59, 130, 246, 0.3); }
        .btn-register { background-color: #3b82f6; color: white; padding: 15px; border: none; border-radius: 35px; width: 100%; font-weight: bold; font-size: 18px; cursor: pointer; margin-top: 15px; text-transform: uppercase; }
        .footer-links { margin-top: 25px; font-size: 14px; color: #666; }
        .footer-links a { text-decoration: none; color: #3b82f6; font-weight: bold; }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="avatar-section"><div class="avatar-circle"><i class="fas fa-user-plus"></i></div></div>
        <div class="form-section">
            <h2>Create Account</h2>
            <form action="register_action.php" method="POST">
                <div class="input-group"><i class="fas fa-user"></i><input type="text" name="full_name" placeholder="Full Name" required></div>
                <div class="input-group"><i class="fas fa-envelope"></i><input type="email" name="email" placeholder="Email Address" required></div>
                <div class="input-group"><i class="fas fa-lock"></i><input type="password" name="password" placeholder="Password" required></div>
                <div class="input-group"><i class="fas fa-briefcase"></i>
                    <select name="role" required>
                        <option value="" disabled selected>Select Your Role</option>
                        <option value="student">Student</option>
                        <option value="supervisor">Supervisor</option>
                    </select>
                </div>
                <button type="submit" class="btn-register">Sign Up</button>
            </form>
            <div class="footer-links">Already have an account? <a href="login.php">Login here</a></div>
        </div>
    </div>
</body>
</html>