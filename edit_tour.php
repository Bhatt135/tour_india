<?php
$conn = new mysqli("localhost", "root", "", "tour_india");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $cost = $_POST['cost'];
    $plan = $_POST['plan'];

    $query = "UPDATE tour_plans SET estimated_cost='$cost', tour_plan='$plan' WHERE place_name='$name'";
    $conn->query($query);

    header("Location: admin_dashboard.php");
    exit();
}

$name = $_GET['id'];
$tour = $conn->query("SELECT * FROM tour_plans WHERE place_name='$name'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="hidden" name="name" value="<?= $tour['place_name'] ?>">
        Estimated Cost: <input type="number" name="cost" value="<?= $tour['estimated_cost'] ?>"><br>
        Tour Plan: <textarea name="plan"><?= $tour['tour_plan'] ?></textarea><br>
        <button type="submit">Update</button>
    </form>
    
</body>
</html>
