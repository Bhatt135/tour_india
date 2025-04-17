<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE tour_plans SET estimated_cost=?, tour_plan=? WHERE id=?");
    $stmt->bind_param("ssi", $_POST['cost'], $_POST['plan'], $_POST['id']);
    
    if ($stmt->execute()) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        die("Error updating tour: " . $stmt->error);
    }
}

// Get the tour name from URL parameter
$name = $_GET['id'] ?? null;

if (!$name) {
    die("No tour specified");
}

// Fetch tour data with prepared statement
$stmt = $conn->prepare("SELECT * FROM tour_plans WHERE id=?");
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();
$tour = $result->fetch_assoc();

if (!$tour) {
    die("Tour not found");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tour</title>
    <style>
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
        }
        textarea {
            width: 100%;
            height: 200px;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
        }
    </style>
</head>
<body>
    <form method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($tour['id']) ?>">
        <label>
            Estimated Cost:
            <input type="number" name="cost" value="<?= htmlspecialchars($tour['estimated_cost']) ?>">
        </label><br>
        <label>
            Tour Plan:
            <textarea name="plan"><?= htmlspecialchars($tour['tour_plan']) ?></textarea>
        </label><br>
        <button type="submit">Update Tour</button>
    </form>
</body>
</html>