<?php
$conn = new mysqli("localhost", "root", "", "tour_india");
$name = $_GET['id'];

$conn->query("DELETE FROM tour_plans WHERE place_name='$name'");
header("Location: admin_dashboard.php");
?>
