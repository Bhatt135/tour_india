<?php
$conn = new mysqli("localhost", "root", "", "tour_india");
$id = $_GET['id'];

$conn->query("DELETE FROM users WHERE id='$id'");
header("Location: admin_dashboard.php");
?>
