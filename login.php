<?php 
session_start(); 
// Tani waxay ka hortagaysaa shaashadda cad haddii qalad jiro
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Design-kaaga siduu ahaa ayaan u daayey */
        body {
            margin: 0; padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #a855f7 0%, #3b82f6 100%);
            display: flex; justify-content: center; align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: white; padding: 40px; border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%; max-width: 800px;
            display: flex; align-items: center; justify-content: space-around;
        }
        .avatar-section { display: flex; justify-content: center; align-items: center; }
        .avatar-circle {
            background-color: #f0f2f5; width: 200px; height: 200px; border-radius: 50%;
            display: flex; justify-content: center; align-items: center; overflow: hidden;
        }
        .avatar-circle i { font-size: 100px; color: #1e293b; }
        .form-section { width: 350px; text-align: center; }
        h2 { margin-bottom: 30px; color: #333; font-size: 28px; }
        .input-group { position: relative; margin-bottom: 20px; }
        .input-group i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #666; }
        input {
            width: 100%; padding: 15px 15px 15px 45px; border-radius: 30px;
            border: 1px solid #ddd; background-color: #f0f2f5; font-size: 16px;
            box-sizing: border-box; outline: none;
        }
        .btn-login {
            background-color: #5cb85c; color: white; padding: 15px;
            border: none; border-radius: 30px; width: 100%;
            font-weight: bold; font-size: 18px; cursor: pointer; margin-top: 10px;
        }
        .footer-links { margin-top: 20px; font-size: 14px; color: #666; }
        .footer-links a { text-decoration: none; color: #3b82f6; font-weight: bold; }
        .signup-text { margin-top: 10px; display: block; }
        .error-msg { color: red; margin-bottom: 15px; font-size: 14px; }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="avatar-section">
            <div class="avatar-circle">
                <i class="fas fa-user-tie"></i>
            </div>
        </div>

        <div class="form-section">
            <h2>User Login</h2>

            <?php if(isset($_SESSION['error'])): ?>
                <div class="error-msg"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>

            <form action="login_action.php" method="POST">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email Id" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>
            
            <div class="footer-links">
                <a href="#">Forgot Username / Password?</a>
                <span class="signup-text">Don't have an account? <a href="register.php">Sign Up</a></span>
            </div>
        </div>
    </div>

</body>
</html>