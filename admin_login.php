<?php
session_start();
$conn = new mysqli("localhost", "root", "", "tour_india");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $email;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login here</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        form {
            margin: 20px auto;
            width: 300px;
        }

        input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: blue;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2 style='color: blue;' class='d-flex justify-content-center align-items-center'>Admin Login</h2>
    <form method="POST">
        <p style='color:blue; font-size: large;'>Enter your email</p>
        <input type="text" name="email" class="container form-control mb-3" required>
        <p style='color:blue; font-size: large;'>Enter your password</p>
        <input type="password" name="password" class="container form-control mb-3" required>
        <button type="submit" class="btn btn-primary w-100 fw-bold">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
