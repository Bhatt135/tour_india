<!-- <?php
// session_start();
// require_once 'db_connection.php';

// $payment_id = $_GET['payment_id'] ?? '';

// // Get booking details
// $stmt = $conn->prepare("SELECT t.place_name, ut.booking_date 
//                        FROM user_tours ut
//                        JOIN tour_plans t ON ut.tour_id = t.id
//                        WHERE ut.payment_id = ? AND ut.user_id = ?");
// $stmt->bind_param("si", $payment_id, $_SESSION['id']);
// $stmt->execute();
// $result = $stmt->get_result();
// $booking = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .receipt {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="receipt">
            <h2 class="text-center mb-4">Booking Confirmed!</h2>
            <div class="alert alert-success">
                <h4>Payment Successful</h4>
                <p>Thank you for your booking. Here are your details:</p>
            </div>
            
            <div class="card mb-3">
                <div class="card-header">
                    Booking Information
                </div>
                <div class="card-body">
                    <p><strong>Tour:</strong> <?php // htmlspecialchars($booking['place_name']) ?></p>
                    <p><strong>Booking Date:</strong> <?php // date('F j, Y', strtotime($booking['booking_date'])) ?></p>
                    <p><strong>Payment ID:</strong> <?php // htmlspecialchars($payment_id) ?></p>
                    <p><strong>Payment Method:</strong> PayPal</p>
                </div>
            </div>
            
            <div class="text-center">
                <a href="tour_table.php" class="btn btn-primary">Browse More Tours</a>
                <a href="user_bookings.php" class="btn btn-secondary">View My Bookings</a>
            </div>
        </div>
    </div>
</body>
</html> -->
<?php
echo "hello" ;
?>