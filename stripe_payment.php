<?php

// Add these at the very top
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database connection
$conn = new mysqli("localhost", "root", "", "tour_india");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Stripe Secret Key
\Stripe\Stripe::setApiKey('sk_test_51RBUi7B0Pd8uVfnlKBVII6s1cixxtQ0n03VaRKSt2NgVSYsZWcEbcrr9i9QOyDm1qfiP8NafWKnIyRCFguTXE4ST00NeTTplmv');


// Initialize variables
$statusMsg = 'Error on form submission.';
$ordStatus = 'error';
$transactionID = $paidAmount = $paidCurrency = $payment_status = $destination = $price = $currency = '';

// Process payment
if (!empty($_POST['stripeToken']) && !empty($_POST['email']) && !empty($_POST['holdername']) && !empty($_POST['destination']) && !empty($_POST['cost'])) {
    $token       = $_POST['stripeToken'];
    $name        = $_POST['holdername'];
    $email       = $_POST['email'];
    $destination = $_POST['destination'];
    $price       = $_POST['cost'];
    $currency    = 'usd';

    try {
        // Create a Customer
        $customer = \Stripe\Customer::create([
            'email'       => $email,
            'source'      => $token,
            'name'        => $name,
            'description' => $destination
        ]);

        // Create a Charge
        $charge = \Stripe\Charge::create([
            'customer'    => $customer->id,
            'amount'      => $price * 100, // in cents
            'currency'    => $currency,
            'description' => $destination,
            'metadata'    => ['order_id' => uniqid()]
        ]);

        // Check if payment was successful
        if (
            $charge->amount_refunded == 0 &&
            empty($charge->failure_code) &&
            $charge->paid == 1 &&
            $charge->captured == 1
        ) {
            $transactionID  = $charge->balance_transaction;
            $paidAmount     = $charge->amount / 100;
            $paidCurrency   = strtoupper($charge->currency);
            $payment_status = $charge->status;
            $dt_tm          = date('Y-m-d H:i:s');

            // Insert into registration table
            $stmt = $conn->prepare("INSERT INTO registration 
                (name, email, destination, fees, status, paymentid, added_date)
                VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(
                "sssssss",
                $name,
                $email,
                $destination,
                $price,
                $payment_status,
                $transactionID,
                $dt_tm
            );
            $stmt->execute();
            $stmt->close();

            $ordStatus = 'success';
            $statusMsg = 'Your Payment has been Successful!';

            // Send email receipt
            $mail = new PHPMailer(true);
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'pratham.21beitv135@gmail.com'; // your Gmail
                $mail->Password   = 'isnk smlt tagn mjqz'; // Gmail app password (NOT your Gmail login password)
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                // Recipients
                $mail->setFrom('pratham.21beitv135@gmail.com', 'TOUR-INDIA');
                $mail->addAddress($email, $name); // user email

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Your Tour Booking Receipt';

                $mail->Body = "
                        <div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f4f6f8; color: #333;'>
                            <h2 style='color: #007bff;'>🎉 TOUR-INDIA Booking Confirmation</h2>
                            <p>Hi <strong>$name</strong>,</p>
                            <p>Thank you for booking your tour with us! Here are your payment and trip details:</p>

                            <div style='background-color: #e9f7ef; padding: 15px; border-radius: 10px; margin: 15px 0;'>
                                <h3 style='color: green;'>✅ Payment Information</h3>
                                <p><strong>Transaction ID:</strong> $transactionID</p>
                                <p><strong>Amount Paid:</strong> ₹" . number_format($price, 2) . "</p>
                                <p><strong>Status:</strong> " . ucfirst($payment_status) . "</p>
                                <p><strong>Date:</strong> $dt_tm</p>
                            </div>

                            <div style='background-color: #f0f8ff; padding: 15px; border-radius: 10px;'>
                                <h3 style='color: #007bff;'>🧳 Tour Details</h3>
                                <p><strong>Destination:</strong> " . htmlspecialchars($destination) . "</p>
                            </div>

                            <p style='margin-top: 20px;'>If you have any questions, reply to this email or contact our support team.</p>
                            <p style='margin-top: 10px;'>Best regards,<br><strong>TOUR-INDIA Team</strong></p>
                        </div>
                    ";


            $mail->AltBody = "TOUR-INDIA Booking Confirmation

            Hi $name,

            Thank you for booking with TOUR-INDIA. Your tour details are below:

            Transaction ID: $transactionID
            Amount Paid: ₹" . number_format($price, 2) . "
            Status: " . ucfirst($payment_status) . "
            Date: $dt_tm

            Destination: " . htmlspecialchars($destination) . "

            If you have any questions, reply to this email.

            Best regards,
            TOUR-INDIA Team";


                $mail->send();
            } catch (Exception $e) {
                // Log email error but don't show to user
                error_log("Email could not be sent. Mailer Error: {$mail->ErrorInfo}");
            }
        } else {
            $statusMsg = "Transaction failed!";
        }
    } catch (Exception $e) {
        $statusMsg = "Error: " . $e->getMessage();
    }
} else {
    $statusMsg = "Invalid payment submission.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Payment Status - TOUR-INDIA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1.success {
            color: green;
        }

        h1.error {
            color: red;
        }

        .btn-continue {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-continue:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 style="text-align: center; color: #007bff; margin-bottom: 20px;">🎉 TOUR-INDIA Payment Receipt</h2>

        <div style="background-color: #e9f7ef; padding: 20px; border-radius: 10px; margin-bottom: 20px;">
            <h4 style="color: green;">✅ Payment Successful</h4>
            <p><strong>Transaction ID:</strong> <?php echo $transactionID; ?></p>
            <p><strong>Paid Amount:</strong> ₹<?php echo number_format($price, 2); ?></p>
            <p><strong>Payment Status:</strong> <?php echo ucfirst($payment_status); ?></p>
        </div>

        <div style="background-color: #f0f8ff; padding: 20px; border-radius: 10px; margin-bottom: 20px;">
            <h4 style="color: #007bff;">🧳 Tour Details</h4>
            <p><strong>Destination:</strong> <?php echo htmlspecialchars($destination); ?></p>
            <p><strong>Booking Time:</strong> <?php echo $dt_tm; ?></p>
        </div>

        <div class="alert alert-success mt-3 text-center fw-bold">
            📧 A receipt has been sent to your email: <?php echo htmlspecialchars($email); ?>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="index.php" class="btn-continue">🏠 Back to Home</a>
        </div>
    </div>

</body>

</html>