<?php
session_start();
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nadiifinta xogta si looga hortago SQL Injection
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Hubinta haddii email-ku hore u jiray
    $check_email = "SELECT id FROM users WHERE email = '$email' LIMIT 1";
    $result = $conn->query($check_email);

    if ($result->num_rows > 0) {
        echo "<script>alert('Khalad: Email-kan hore ayaa loo diiwaangeliyey!'); window.location.href='register.php';</script>";
    } else {
        $sql = "INSERT INTO users (full_name, email, password, role) VALUES ('$full_name', '$email', '$password', '$role')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Diiwaangelintu waa guul! Hadda soo gal.'); window.location.href='login.php';</script>";
        } else {
            echo "Khalad ayaa dhacay: " . $conn->error;
        }
    }
}
$conn->close();
?>