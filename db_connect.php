<?php
// Xogta isku xirka
$host = "127.0.0.1"; // Iska dhaaf localhost, isticmaal IP-ga
$user = "root";
$pass = "";
$db   = "skill_tracker";
$port = 3307; // Port-ka sawirkaaga ka muuqda

// Isku xirka
$conn = mysqli_connect($host, $user, $pass, $db, $port);

// Hubinta
if (!$conn) {
    die("Xiriirka fashilmay: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>