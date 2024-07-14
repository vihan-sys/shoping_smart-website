<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shopclusive - All product in one place</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <?php $this->load->view('front/links'); ?>
    <style>
        body {
            background: #eee;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: 1rem;
        }

        .text-reset {
            --bs-text-opacity: 1;
            color: inherit!important;
        }

        a {
            color: #5465ff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php $this->load->view('front/header2'); ?>
<main>
    <div class="container-fluid">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <h2 class="h5 mb-0"><a href="#" class="text-muted">Order ID: #<?= $order['order_id'] ?></a></h2>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3 d-flex justify-content-between">
                                <div>
                                    <span class="me-3">Order date: <?= $order['order_date'] ?></span>
                                </div>
                                <div class="d-flex">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> Print</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <tbody>
                                <?php foreach ($order_items as $item): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex mb-4">
                                                <div class="flex-shrink-0">
                                                    <img src="uploads/<?= $item['pro_image'] ?>" alt="" width="80" class="img-fluid">
                                                </div>
                                                <div class="flex-lg-grow-1 ms-4">
                                                    <h6>
                                                        <a href="product/<?=$item['slug']?>" class="text-reset"><?=ellipsize($item['pro_name'],140)?></a>
                                                    </h6>
                                                    <span class="small" style="margin-right: 15px;">Sub order ID: #<?= $item['sub_order_id'] ?></span></span>
                                                    <span class="badge rounded-pill bg-info">
                                        <?php
                                        switch ($item['pro_status']) {
                                            case 1:
                                                echo 'Order Placed';
                                                break;
                                            case 2:
                                                echo 'Order Pending';
                                                break;
                                            case 3:
                                                echo 'Out for delivery';
                                                break;
                                            case 4:
                                                echo 'Order Delivered';
                                                break;
                                            case 5:
                                                echo 'Order Cancelled';
                                                break;
                                            default:
                                                echo 'Unknown Status';
                                                break;
                                        }
                                        ?>
                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="font-size: 16px;"><?= $item['pro_qty'] ?></td>
                                        <td class="text-end" style="font-size: 16px;">₹<?= $item['pro_price'] ?></td>

                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2" style="font-size: 16px;">Subtotal</td>
                                    <td class="text-end" style="font-size: 16px;">₹<?= $order['total']?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="font-size: 16px;">Delivery charge:</td>
                                    <td class="text-end" style="font-size: 16px;">₹<?= $order['delivery_charge'] ?></td>
                                </tr>
                                <?php
                                  $grand_total = 0;
                                  foreach ($order_items as $item) {
                                      if ($item['pro_status'] != 5) {
                                          $subtotal = $item['pro_price'] * $item['pro_qty'];
                                          $grand_total += $subtotal;
                                      }
                                  }
                                ?>
                                <tr class="fw-bold">
                                <td colspan="2" style="font-size: 16px;">Grand Total:</td>
                                <td class="text-end" style="font-size: 16px;">₹<?= number_format($grand_total + (float)$order['delivery_charge'], 2, '.', '') ?></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="h6">Payment Method</h3>
                                    <p>Payment mode: <?= $order['pay_mode'] ?><br>
                                        Total: ₹<?= $order['total'] ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="h6">Billing address</h3>
                                    <address>
                                        <strong><?= $bill_address['username'] ?></strong><br>
                                        <?= $bill_address['address'] ?><br>
                                        <?= $bill_address['city'] ?> - <?= $order['pincode'] ?><br>
                                        <?= $bill_address['state'] ?><br>
                                        <p title="Phone">Phone no.: <?= $bill_address['phone'] ?></p><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Shipping Information</h3>
                            <hr>
                            <h3 class="h6">Address</h3>
                            <address>
                                <strong><?= $order['cust_name'] ?></strong><br>
                                <?= $order['address'] ?><br>
                                <?= $order['city'] ?> - <?= $order['pincode'] ?><br>
                                <?= $order['state'] ?><br>
                                <p title="Phone">Phone no.: <?= $order['cust_mobile'] ?></p><br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('front/footer'); ?>
</body>
</html>
