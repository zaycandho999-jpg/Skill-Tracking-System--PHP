<?php
include('db_connect.php');

$id = $_GET['id'];

if(isset($_POST['comment'])){
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("UPDATE skill_logs SET status='rejected', supervisor_comment=? WHERE id=?");
    $stmt->bind_param("si", $comment, $id);
    $stmt->execute();

    header("Location: supervisor_dashboard.php");
}
?>

<form method="POST">
<textarea name="comment" placeholder="Reason for rejection" required></textarea>
<button>Submit</button>
</form>