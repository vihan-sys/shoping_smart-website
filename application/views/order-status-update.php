<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Order Status Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= base_url() ?>">
    <?php $this->load->view('links'); ?>
    <style>
        .table-wrapper {
            overflow-x: auto;
            width: 100%;
        }
        .table {
            min-width: 1200px; /* Set a minimum width that exceeds the viewport width for scrolling */
        }
    </style>
</head>
<body>
    <?php $this->load->view('header'); ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('success') ?>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0 align-items-center d-flex pb-0">
                                <h4 class="card-title mb-0 flex-grow-1">Order Status Update</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-wrapper">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Sub Order ID</th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Product Status</th>
                                                <th>Order Date</th>
                                                <th>Update Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($orders)) { ?>
                                                <?php foreach ($orders as $order) { ?>
                                                    <tr>
                                                        <td><?= $order['user_id'] ?></td>
                                                        <td><?= $order['sub_order_id'] ?></td>
                                                        <td><img src="<?= base_url('uploads/' . $order['pro_image']) ?>" alt="<?= $order['pro_name'] ?>" width="80"></td>
                                                        <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                            <a href="profile/view-order-details/<?=$order['order_id']?>" target="_blank">
                                                                <?= ellipsize($order['pro_name'], 65) ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                switch ($order['pro_status']) {
                                                                    case 1:
                                                                        echo 'Order Placed';
                                                                        break;
                                                                    case 2:
                                                                        echo 'Pending';
                                                                        break;
                                                                    case 3:
                                                                        echo 'Out for Delivery';
                                                                        break;
                                                                    case 4:
                                                                        echo 'Delivered';
                                                                        break;
                                                                    case 5:
                                                                        echo 'Cancelled';
                                                                        break;
                                                                    default:
                                                                        echo 'Unknown';
                                                                        break;
                                                                }
                                                            ?>
                                                        </td>
                                                        <td><?= $order['order_date'] ?></td>
                                                        <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;">
                                                            <?= form_open('home/order_status_update') ?>
                                                                <input type="hidden" name="order_id" value="<?= $order['sub_order_id'] ?>">
                                                                <select name="pro_status" class="form-select">
                                                                    <option value="1" <?= $order['pro_status'] == 1 ? 'selected' : '' ?>>Order Placed</option>
                                                                    <option value="2" <?= $order['pro_status'] == 2 ? 'selected' : '' ?>>Pending</option>
                                                                    <option value="3" <?= $order['pro_status'] == 3 ? 'selected' : '' ?>>Out for Delivery</option>
                                                                    <option value="4" <?= $order['pro_status'] == 4 ? 'selected' : '' ?>>Delivered</option>
                                                                    <option value="5" <?= $order['pro_status'] == 5 ? 'selected' : '' ?>>Cancelled</option>
                                                                </select>
                                                                <button type="submit" class="btn btn-primary mt-2">Update</button>
                                                            <?= form_close() ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <tr>
                                                    <td colspan="7">No orders found.</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>
</body>
</html>
