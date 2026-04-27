<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Registration - Skill Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            margin: 0; padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #a855f7 0%, #3b82f6 100%);
            display: flex; justify-content: center; align-items: center;
            height: 100vh;
        }
        .register-container {
            background-color: white; padding: 45px; border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            width: 100%; max-width: 850px;
            display: flex; align-items: center; justify-content: space-around;
        }
        .avatar-section { flex: 1; display: flex; justify-content: center; align-items: center; border-right: 1px solid #f0f2f5; }
        .avatar-circle {
            background-color: #f0f2f5; width: 220px; height: 220px; border-radius: 50%;
            display: flex; justify-content: center; align-items: center; border: 5px solid #3b82f6;
        }
        .avatar-circle i { font-size: 110px; color: #3b82f6; }
        .form-section { flex: 1.2; padding: 0 40px; text-align: center; }
        h2 { margin-bottom: 25px; color: #333; font-size: 28px; font-weight: bold; }
        .input-group { position: relative; margin-bottom: 15px; }
        .input-group i { position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #3b82f6; }
        input {
            width: 100%; padding: 14px 14px 14px 50px; border-radius: 35px;
            border: 1px solid #ddd; background-color: #f8f9fa; font-size: 16px;
            box-sizing: border-box; outline: none; transition: 0.3s;
        }
        input:focus { border-color: #3b82f6; box-shadow: 0 0 10px rgba(59, 130, 246, 0.2); }
        .btn-reg {
            background-color: #3b82f6; color: white; padding: 15px;
            border: none; border-radius: 35px; width: 100%;
            font-weight: bold; font-size: 18px; cursor: pointer; margin-top: 15px;
            text-transform: uppercase; letter-spacing: 1px;
        }
        .btn-reg:hover { background-color: #2563eb; }
        .footer-links { margin-top: 25px; font-size: 14px; color: #666; }
        .footer-links a { text-decoration: none; color: #3b82f6; font-weight: bold; }
    </style>
</head>
<body>

    <div class="register-container">
        <div class="avatar-section">
            <div class="avatar-circle">
                <i class="fas fa-user-shield"></i>
            </div>
        </div>

        <div class="form-section">
            <h2>Supervisor Account</h2>
            <form action="reg_sup_action.php" method="POST">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="full_name" placeholder="Full Name" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Supervisor Email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Create Password" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-id-badge"></i>
                    <input type="text" name="department" placeholder="Department (Optional)">
                </div>
                <input type="hidden" name="role" value="supervisor">
                
                <button type="submit" class="btn-reg">Create Supervisor Account</button>
            </form>
            
            <div class="footer-links">
                Already have an account? <a href="login.php">Login here</a>
            </div>
        </div>
    </div>

</body>
</html>