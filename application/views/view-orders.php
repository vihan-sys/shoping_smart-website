<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .order-details {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Order Details</h1>

    <?php if (!empty($orders)) : ?>
        <?php foreach ($orders as $order) : ?>
            <h2>Order #<?= $order['order_id']; ?></h2>
            <p><strong>User ID:</strong> <?= $order['user_id']; ?></p>
            <p><strong>Order Date:</strong> <?= $order['order_date']; ?></p>

            <?php if (!empty($order['items'])) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Sub Order ID</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order['items'] as $item) : ?>
                            <tr>
                                <td><?= $item['sub_order_id']; ?></td>
                                <td><img src="<?= $item['pro_image']; ?>" alt="<?= $item['pro_name']; ?>" style="max-width: 100px;"></td>
                                <td><?= $item['pro_name']; ?></td>
                                <td><?= getStatusLabel($item['pro_status']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No items found for this order.</p>
            <?php endif; ?>
            <hr class="order-details">
        <?php endforeach; ?>
    <?php else : ?>
        <p>No orders found.</p>
    <?php endif; ?>

    <?php
    function getStatusLabel($status) {
        switch ($status) {
            case 1:
                return 'Order Placed';
            case 2:
                return 'Pending';
            case 3:
                return 'Out for Delivery';
            case 4:
                return 'Delivered';
            case 5:
                return 'Cancelled';
            default:
                return 'Unknown';
        }
    }
    ?>
</body>
</html>
