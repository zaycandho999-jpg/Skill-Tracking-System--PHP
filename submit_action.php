<?php
session_start();
include('db_connect.php');

// 1. Hubi inuu qofku login yahay
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$uid = $_SESSION['user_id'];

// 2. Soo qaado xogta foomka kana dhig doorsoomayaal (Variables)
// Tani waxay xallinaysaa bogga cad ee soo baxayay
$skill_name    = $_POST['skill_name'];
$category      = $_POST['category'];
$hours         = $_POST['hours'];
$description   = $_POST['description'];
$evidence_link = $_POST['evidence_link'];

// 3. U diyaari SQL-ka (Prepare statement)
$stmt = $conn->prepare("INSERT INTO skill_logs 
(user_id, skill_name, category, hours, description, evidence_link, status)
VALUES (?, ?, ?, ?, ?, ?, 'pending')");

// 4. Bind parameters (Hubi in "ississ" ay u kala horreeyaan sidii loogu talagalay)
$stmt->bind_param("ississ",
    $uid,
    $skill_name,
    $category,
    $hours,
    $description,
    $evidence_link
);

// 5. Fulinta (Execute)
if($stmt->execute()){
    header("Location: dashboard.php");
    exit();
} else {
    // Haddii uu qalad dhaco si aad u aragto halkii bog cadaan lahaa
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>