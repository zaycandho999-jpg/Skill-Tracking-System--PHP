<?php
session_start();
include('db_connect.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // --- ISBEDELKA HALKAN AYUU KU JIRAA ---
        // Waxaan password-ka u barbar dhigaynaa si toos ah (maadaama uusan hashed ahayn DB-ga)
        if ($password == $user['password']) { 

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'supervisor') {
                header("Location: supervisor_dashboard.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();

        } else {
            $_SESSION['error'] = "Password waa khalad!";
            header("Location: login.php");
            exit();
        }

    } else {
        $_SESSION['error'] = "Email lama helin!";
        header("Location: login.php");
        exit();
    }

} else {
    header("Location: login.php");
    exit();
}
?>