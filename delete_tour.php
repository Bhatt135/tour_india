<?php
include("connection.php");
$name = $_GET['id'];

$conn->query("DELETE FROM tour_plans WHERE id='$name'");
header("Location: admin_dashboard.php");
?>
