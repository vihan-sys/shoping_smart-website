<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Order</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .thank-you-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: #343a40;
            margin-bottom: 20px;
        }
        p {
            color: #6c757d;
            margin-bottom: 20px;
        }
        .order-summary {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: left;
        }
        .order-summary h2 {
            color: #343a40;
            margin-bottom: 10px;
        }
        .order-summary p {
            color: #495057;
            margin: 5px 0;
        }
        .order-summary .highlight {
            font-weight: bold;
            color: #007bff;
        }
        .order-summary .total {
            font-size: 1.2em;
            color: #28a745;
            font-weight: bold;
            margin-top: 20px;
        }
        .order-summary hr {
            border: none;
            border-top: 1px solid #dee2e6;
            margin: 10px 0;
        }
        .thank-you-image {
            margin-top: 20px;
        }
        .profile-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .profile-button:hover {
            background-color: #0056b3;
        }
        @media (max-width: 600px) {
            .thank-you-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="thank-you-container">
        <h1>Thank You for Your Order!</h1>
        <p>We appreciate your business. Your order is being processed and you will receive a confirmation email shortly.</p>
        <div class="thank-you-image">
            <img src="<?= base_url('uploads/order.gif') ?>" alt="Order Confirmation" width="450">
        </div>
        <div class="order-summary">
            <h2>Order Summary</h2>
            <p>Order ID: <span class="highlight">#<?= $order_id ?></span></p>
            <p>Payment ID: <span class="highlight">#<?= $payment_id ?></span></p>
            <p>Payment Mode: <span class="highlight"><?= $payment_mode ?></span></p>
            <p>Order Date: <span class="highlight"><?= $order_date ?></span></p>
            <hr>
            <p>Total Amount: <span class="total">₹<?= $total_amount ?></span></p>
        </div>
        <button class="profile-button" onclick="window.location.href='<?= base_url('profile') ?>'">Go to Profile</button>
    </div>
</body>
</html>
