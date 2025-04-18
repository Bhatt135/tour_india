<?php
session_start();
// if (!isset($_SESSION['admin'])) {
//     header("Location: login.php");
//     exit();
// }

include("connection.php");

// Handle form submission for adding new tour
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_tour'])) {
        $destination = $conn->real_escape_string($_POST['destination']);
        $estimated_cost = $conn->real_escape_string($_POST['estimated_cost']);
        $tour_plan = $conn->real_escape_string($_POST['tour_plan']);

        $sql = "INSERT INTO tour_plans (destination, estimated_cost, tour_plan) VALUES ('$destination', '$estimated_cost', '$tour_plan')";
        if ($conn->query($sql)) {
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $add_error = "Error adding tour: " . $conn->error;
        }
    } elseif (isset($_POST['update_role'])) {
        $user_id = $conn->real_escape_string($_POST['user_id']);
        $new_role = $conn->real_escape_string($_POST['new_role']);

        $sql = "UPDATE users SET role = '$new_role' WHERE id = '$user_id'";
        if ($conn->query($sql)) {
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $role_error = "Error updating role: " . $conn->error;
        }
    }
}

// Fetch data
$tours = $conn->query("SELECT * FROM tour_plans ORDER BY id ASC");
$users = $conn->query("SELECT * FROM users");
$registrations = $conn->query("SELECT * FROM registration");

$tour_count = $conn->query("SELECT COUNT(*) as total FROM tour_plans")->fetch_assoc()['total'];
$user_count = $conn->query("SELECT COUNT(*) as total FROM users")->fetch_assoc()['total'];
$total_fees = $conn->query("SELECT SUM(fees) as total FROM registration")->fetch_assoc()['total'] ?? 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .section {
            margin-bottom: 3rem;
        }

        .card {
            margin-bottom: 2rem;
        }

        .role-form {
            display: inline-block;
            margin-left: 0.5rem;
        }

        .display-6 {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <div class="row text-center mb-4">
            <div class="col-md-4">
                <div class="card bg-success text-white shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Tours</h5>
                        <p class="display-6"><?= $tour_count ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info text-white shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="display-6"><?= $user_count ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-dark shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Fees Collected</h5>
                        <p class="display-6">₹<?= number_format($total_fees) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Tour Form -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="text-center">Add New Tour</h4>
            </div>
            <div class="card-body">
                <?php if (isset($add_error)) : ?>
                    <div class="alert alert-danger"><?= $add_error ?></div>
                <?php endif; ?>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="destination" class="form-label">Place Name</label>
                        <input type="text" class="form-control" id="destination" name="destination" required>
                    </div>
                    <div class="mb-3">
                        <label for="estimated_cost" class="form-label">Estimated Cost (₹)</label>
                        <input type="number" class="form-control" id="estimated_cost" name="estimated_cost" required>
                    </div>
                    <div class="mb-3">
                        <label for="tour_plan" class="form-label">Tour Details</label>
                        <textarea class="form-control" id="tour_plan" name="tour_plan" rows="4" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="add_tour" class="btn btn-primary">Add Tour</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tours Section -->
        <div class="section">
            <h2 class="text-center mb-4">Manage Tours</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-primary">
                        <tr class="text-center">
                            <th>City name</th>
                            <th>Estimated Cost</th>
                            <th>Tour details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $tours->fetch_assoc()) : ?>
                            <tr>
                                <td><?= htmlspecialchars($row['destination']) ?></td>
                                <td>₹<?= number_format($row['estimated_cost']) ?></td>
                                <td><?= nl2br(htmlspecialchars($row['tour_plan'])) ?></td>
                                <td class="text-center">
                                    <a href="edit_tour.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="delete_tour.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this tour?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Registrations Section -->
        <div class="section">
            <h2 class="text-center mb-4">Manage Registrations</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-primary">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Destination</th>
                            <th>Fees</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $registrations->fetch_assoc()) : ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id']) ?></td>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['destination']) ?></td>
                                <td>₹<?= number_format($row['fees']) ?></td>
                                <td><?= htmlspecialchars($row['status']) ?></td>
                                <td class="text-center">
                                    <a href="delete_registration.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this registration?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Users Section -->
        <div class="section">
            <h2 class="text-center mb-4">Manage Users</h2>
            <?php if (isset($role_error)) : ?>
                <div class="alert alert-danger"><?= $role_error ?></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-primary">
                        <tr class="text-center">
                            <th>Email</th>
                            <th>Current Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $users->fetch_assoc()) : ?>
                            <tr>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td class="text-center"><?= htmlspecialchars($row['role']) ?></td>
                                <td class="text-center">
                                    <form method="POST" action="" class="role-form">
                                        <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
                                        <select name="new_role" class="form-select form-select-sm d-inline-block" style="width: auto;">
                                            <option value="user" <?= $row['role'] == 'user' ? 'selected' : '' ?>>User</option>
                                            <option value="admin" <?= $row['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        </select>
                                        <button type="submit" name="update_role" class="btn btn-primary btn-sm">Update</button>
                                    </form>
                                    <a href="delete_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this user?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>