<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "tour_india");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Store tour_id if coming from tour selection
if (isset($_GET['tour_id'])) {
    $_SESSION['selected_tour_id'] = (int)$_GET['tour_id'];
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!empty($name) && !empty($email) && !empty($password)) {
        // Check if user exists
        $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // User exists, verify password
            $stmt->bind_result($id, $existing_name, $stored_password, $role);
            $stmt->fetch();

            if ($password == $stored_password) {  // Note: You should implement password hashing
                $_SESSION["id"] = $id;
                $_SESSION["name"] = $existing_name;
                $_SESSION["role"] = $role;

                // Redirect based on role and tour selection
                if ($role == "admin") {
                    header("Location: admin_dashboard.php");
                } else {
                    if (isset($_SESSION['selected_tour_id'])) {
                        header("Location: user_tour_details.php");
                    } else {
                        header("Location: welcome.php");
                    }
                }
                exit;
            } else {
                echo "<h1 style='color:red;' class='d-flex justify-content-center align-items-center'>Incorrect password!</h1>";
            }
        } else {
            // Register new user with role "user"
            $role = "user";
            $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $password, $role);
            if ($stmt->execute()) {
                $_SESSION["id"] = $stmt->insert_id;
                $_SESSION["name"] = $name;
                $_SESSION["role"] = $role;
                
                if (isset($_SESSION['selected_tour_id'])) {
                    header("Location: user_tour_details.php");
                } else {
                    echo "<p style='color:green;' class='d-flex justify-content-center align-items-center'>Account created successfully! You can now log in.</p>";
                }
            } else {
                echo "<p style='color:red;' class='d-flex justify-content-center align-items-center'>Error registering user.</p>";
            }
        }
        $stmt->close();
    } else {
        echo "<p style='color:red;'>Please fill in all fields!</p>";
    }
}

$conn->close();
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
    <h2 style='color: blue;' class='d-flex justify-content-center align-items-center'>Login / Register</h2>
    <form method="POST">
        <p style='color:blue; font-size: large;'>Enter your name</p>
        <input type="text" name="name" value="user" class="container form-control mb-3" required>
        <p style='color:blue; font-size: large;'>Enter your email</p>
        <input type="email" value="user@gmail.com" name="email" class="container form-control mb-3" required>
        <p style='color:blue; font-size: large;'>Enter your password</p>
        <input type="password" value="1234" name="password" class="container form-control mb-3" required>
        <button type="submit" class="btn btn-primary w-100 fw-bold">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>