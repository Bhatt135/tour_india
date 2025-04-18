<?php
include("connection.php");

// Handle all form submissions
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

// Get registration data for the chart
$chart_data = $conn->query("SELECT DATE(added_date) as reg_date, SUM(fees) as daily_total 
                           FROM registration 
                           GROUP BY DATE(added_date) 
                           ORDER BY added_date ASC");
$labels = [];
$data = [];
while ($row = $chart_data->fetch_assoc()) {
    $labels[] = date('M j', strtotime($row['reg_date']));
    $data[] = $row['daily_total'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    body {
        padding-left: 270px; /* Same as sidebar width */
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
    }
    
    /* Chart styling */
.card-body canvas {
    width: 100% !important;
    height: 300px !important;
}
    .sidebar {
        width: 250px;
        position: fixed;
        left: 0;
        top: 0;
        height: 100vh;
        background: #2c3e50;
        color: white;
        padding: 20px;
        z-index: 1000;
        overflow-y: auto;
    }
    
    .dashboard-header {
        position: relative;
        width: 100%;
        background-color: var(--secondary-color);
        color: white;
        padding: 1.5rem 0;
        margin-bottom: 2rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    /* Remove the margin-left from all container divs */
    .container {
        width: 100%;
        max-width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --success-color: #2ecc71;
            --info-color: #17a2b8;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .dashboard-header {
            background-color: var(--secondary-color);
            color: white;
            padding: 1.5rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .stat-card {
            border-radius: 10px;
            transition: transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .action-btn {
            margin: 0.5rem;
            min-width: 120px;
        }
        
        .modal-xl {
            max-width: 90%;
        }
        
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        
        .table thead {
            background-color: var(--primary-color);
            color: white;
        }
        
        .badge-admin {
            background-color: var(--danger-color);
        }
        
        .badge-user {
            background-color: var(--info-color);
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center mb-4">Menu</h4>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <button class="btn btn-primary w-100 text-start" data-bs-toggle="modal" data-bs-target="#toursModal">
                <i class="bi bi-map me-2"></i> Manage Tours
            </button>
        </li>
        <li class="nav-item mb-2">
            <button class="btn btn-info w-100 text-start" data-bs-toggle="modal" data-bs-target="#registrationsModal">
                <i class="bi bi-list-check me-2"></i> Manage Registrations
            </button>
        </li>
        <li class="nav-item mb-2">
            <button class="btn btn-secondary w-100 text-start" data-bs-toggle="modal" data-bs-target="#usersModal">
                <i class="bi bi-people me-2"></i> Manage Users
            </button>
        </li>
        <li class="nav-item">
            <button class="btn btn-success w-100 text-start" data-bs-toggle="modal" data-bs-target="#addTourModal">
                <i class="bi bi-plus-circle me-2"></i> Add New Tour
            </button>
        </li>
    </ul>
</div>
    <!-- Dashboard Header -->
<header class="dashboard-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1><i class="bi bi-speedometer2"></i> Admin Dashboard</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="tour_table.php" class="btn btn-outline-light"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </div>
        </div>
    </div>
</header>

    <div class="container">
        <!-- Statistics Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="stat-card card text-white bg-success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title"><i class="bi bi-map"></i> Total Tours</h5>
                                <h2 class="mb-0"><?= $tour_count ?></h2>
                            </div>
                            <i class="bi bi-map-fill" style="font-size: 2.5rem; opacity: 0.3;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card card text-white bg-info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title"><i class="bi bi-people"></i> Total Users</h5>
                                <h2 class="mb-0"><?= $user_count ?></h2>
                            </div>
                            <i class="bi bi-people-fill" style="font-size: 2.5rem; opacity: 0.3;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card card text-white bg-warning">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title"><i class="bi bi-cash-coin"></i> Total Revenue</h5>
                                <h2 class="mb-0">₹<?= number_format($total_fees) ?></h2>
                            </div>
                            <i class="bi bi-cash-stack" style="font-size: 2.5rem; opacity: 0.3;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registration Fees Graph -->
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title"><i class="bi bi-bar-chart"></i> Registration Fees Over Time</h5>
    </div>
    <div class="card-body">
        <canvas id="feesChart" height="300"></canvas>
    </div>
</div>

        <!-- Tours Modal -->
        <div class="modal fade" id="toursModal" tabindex="-1" aria-labelledby="toursModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="toursModalLabel"><i class="bi bi-map"></i> Manage Tours</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>City Name</th>
                                        <th>Estimated Cost</th>
                                        <th>Tour Details</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $tours->fetch_assoc()) : ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['destination']) ?></td>
                                            <td>₹<?= number_format($row['estimated_cost']) ?></td>
                                            <td><?= nl2br(htmlspecialchars($row['tour_plan'])) ?></td>
                                            <td>
                                                <a href="edit_tour.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <a href="delete_tour.php?id=<?= $row['id'] ?>" 
                                                   onclick="return confirm('Are you sure you want to delete this tour?')" 
                                                   class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registrations Modal -->
        <div class="modal fade" id="registrationsModal" tabindex="-1" aria-labelledby="registrationsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="registrationsModalLabel"><i class="bi bi-list-check"></i> Manage Registrations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Destination</th>
                                <th>Fees</th>
                                <th>Status</th>
                                <th>Date</th> <!-- Added Date column header -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $n = 1;
                            while ($row = $registrations->fetch_assoc()) : ?>
                                <tr>
                                    <td><?= $n ?></td>
                                    <td><?= htmlspecialchars($row['name']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td><?= htmlspecialchars($row['destination']) ?></td>
                                    <td>₹<?= number_format($row['fees']) ?></td>
                                    <td>
                                        <span class="badge bg-<?= $row['status'] == 'paid' ? 'success' : 'warning' ?>">
                                            <?= htmlspecialchars($row['status']) ?>
                                        </span>
                                    </td>
                                    <td><?= date('Y-m-d H:i:s', strtotime($row['added_date'])) ?></td> <!-- Added Date column data -->
                                    <td>
                                        <a href="delete_registration.php?id=<?= $row['id'] ?>" 
                                           onclick="return confirm('Are you sure you want to delete this registration?')" 
                                           class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php 
                            $n = $n + 1;
                            endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

        <!-- Users Modal -->
        <div class="modal fade" id="usersModal" tabindex="-1" aria-labelledby="usersModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-secondary text-white">
                        <h5 class="modal-title" id="usersModalLabel"><i class="bi bi-people"></i> Manage Users</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php if (isset($role_error)) : ?>
                            <div class="alert alert-danger"><?= $role_error ?></div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Current Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $users->fetch_assoc()) : ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['email']) ?></td>
                                            <td>
                                                <span class="badge <?= $row['role'] == 'admin' ? 'badge-admin' : 'badge-user' ?>">
                                                    <?= htmlspecialchars($row['role']) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <form method="POST" action="" class="d-inline">
                                                    <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
                                                    <div class="input-group input-group-sm">
                                                        <select name="new_role" class="form-select">
                                                            <option value="user" <?= $row['role'] == 'user' ? 'selected' : '' ?>>User</option>
                                                            <option value="admin" <?= $row['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                                        </select>
                                                        <button type="submit" name="update_role" class="btn btn-outline-primary">
                                                            <i class="bi bi-check-circle"></i> Update
                                                        </button>
                                                    </div>
                                                </form>
                                                <a href="delete_user.php?id=<?= $row['id'] ?>" 
                                                   onclick="return confirm('Are you sure you want to delete this user?')" 
                                                   class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Tour Modal -->
        <div class="modal fade" id="addTourModal" tabindex="-1" aria-labelledby="addTourModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="addTourModalLabel"><i class="bi bi-plus-circle"></i> Add New Tour</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                                <textarea class="form-control" id="tour_plan" name="tour_plan" rows="6" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="add_tour" class="btn btn-success">Save Tour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Handle form submission and modal close
            const addTourForm = document.querySelector('#addTourModal form');
            if (addTourForm) {
                addTourForm.addEventListener('submit', function(e) {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('addTourModal'));
                    setTimeout(() => {
                        if (modal) modal.hide();
                    }, 1000);
                });
            }
        });
    </script>
    <script>
    // Registration Fees Chart
    const ctx = document.getElementById('feesChart').getContext('2d');
    const feesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Daily Fees Collected (₹)',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return '₹' + context.raw.toLocaleString();
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '₹' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
</script>
</body>
</html>