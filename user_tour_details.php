<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

// Database connection
include("connection.php");


// Get user details
$user_id = $_SESSION['id'];
$user_query = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
$user_query->bind_param("i", $user_id);
$user_query->execute();
$user_result = $user_query->get_result();
$user = $user_result->fetch_assoc();

$tour = null;
$booking_status = null;

if (isset($_SESSION['selected_tour_id'])) {
    $tour_id = $_SESSION['selected_tour_id'];

    $tour_query = $conn->prepare("SELECT * FROM tour_plans WHERE id = ?");
    $tour_query->bind_param("i", $tour_id);
    $tour_query->execute();
    $tour_result = $tour_query->get_result();
    $tour = $tour_result->fetch_assoc();

    // // Check booking
    // $booking_query = $conn->prepare("SELECT status FROM user_tours WHERE user_id = ? AND tour_id = ?");
    // $booking_query->bind_param("ii", $user_id, $tour_id);
    // $booking_query->execute();
    // $booking_result = $booking_query->get_result();

    // if ($booking_result->num_rows > 0) {
    //     $booking = $booking_result->fetch_assoc();
    //     $booking_status = $booking['status'];
    // }

    // Remove session tour ID after processing
    unset($_SESSION['selected_tour_id']);
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Tour Details</title>
    <script src="https://js.stripe.com/v3/"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
<div class="container">
    <h2>Your Tour Details</h2>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">Your Info</div>
        <div class="card-body">
            <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        </div>
    </div>

    <?php if ($tour): ?>
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">Tour Info</div>
            <div class="card-body">
                <p><strong>Destination:</strong> <?= htmlspecialchars($tour['destination']) ?></p>
                <p><strong>Cost:</strong> ₹<?= number_format($tour['estimated_cost']) ?></p>
                <p><strong>Plan:</strong> <?= nl2br(htmlspecialchars($tour['tour_plan'])) ?></p>
                <?php if ($booking_status): ?>
                    <div class="alert alert-success mt-3">
                        Booking Status: <?= ucfirst($booking_status) ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Stripe Payment Form -->
        <form id="payment-form" method="POST" action="stripe_payment.php">
            <input type="hidden" name="email" value="<?= htmlspecialchars($user['email']) ?>">
            <input type="hidden" name="holdername" value="<?= htmlspecialchars($user['name']) ?>">
            <input type="hidden" name="destination" value="<?= htmlspecialchars($tour['destination']) ?>">
            <input type="hidden" name="cost" value="<?= $tour['estimated_cost'] ?>">

            <div class="mb-3">
                <label for="card-element">Credit or debit card</label>
                <div id="card-element" class="form-control p-2"></div>
                <div id="card-errors" class="text-danger mt-2"></div>
            </div>

            <button id="payBtn" class="btn btn-success">Pay Now</button>
        </form>
    <?php endif; ?>
</div>

<script>
    const stripe = Stripe("pk_test_51RBUi7B0Pd8uVfnlkaRNvYCgjW8OUvZkPec9BdtXwsyLVSXvFeP8zpWdHIg3PKA5gQiVMttFa3nc3nWkz6fxdKVa00FIp4nQO0"); // Replace with your publishable key
    const elements = stripe.elements();
    const card = elements.create("card");
    card.mount("#card-element");

    const paymentForm = document.getElementById("payment-form");

    paymentForm.addEventListener("submit", async function (event) {
        event.preventDefault();

        const {token, error} = await stripe.createToken(card);

        if (error) {
            document.getElementById("card-errors").textContent = error.message;
        } else {
            const hiddenInput = document.createElement("input");
            hiddenInput.setAttribute("type", "hidden");
            hiddenInput.setAttribute("name", "stripeToken");
            hiddenInput.setAttribute("value", token.id);
            paymentForm.appendChild(hiddenInput);
            paymentForm.submit(); // ✅ Working submit
        }
    });
</script>
</body>
</html>
