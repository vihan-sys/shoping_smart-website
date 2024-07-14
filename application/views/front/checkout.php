<!doctype html>
<html class="no-js" lang="en">
<head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Shopclusive - All product in one place</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/x-icon" href="">
      <?php $this->load->view('front/links');?>
      <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script>
   </head>
    <?php $this->load->view('front/header');?>
    <main>
         <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Checkout</h3>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
            <div class="container">
            <script>
            function validatePaymentOption() {
               var codChecked = document.getElementById('cod').checked;
               var razorpayChecked = document.getElementById('razorpay').checked;
               if (!codChecked && !razorpayChecked) {
                  alert('Please select a payment option.');
                  return false;
               }
               return true;
            }
            </script>         
            <?= form_open('checkout/place_order', 'onsubmit="return validatePaymentOption()"') ?>
               <div class="row">
                  <div class="col-xl-7 col-lg-7">
                     <div class="tp-checkout-verify">
                        
                     </div>
                  </div>
                  <div class="col-lg-7">
                     <div class="tp-checkout-bill-area">
                        <h3 class="tp-checkout-bill-title">Billing Details</h3>
                        <div class="tp-checkout-bill-form">
                              <div class="tp-checkout-bill-inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Full Name <span>*</span></label>
                                          <input type="text" name="del_username" placeholder=" Enter full Name" value="<?= set_value('del_username', $user['del_username']) ?>">
                                          <?=form_error('del_username')?>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="tp-checkout-input">
                                          <label>State<span>*</span></label>
                                          <input type="text" name="del_state" placeholder="Enter your state" value="<?= set_value('del_state', $user['del_state']) ?>">
                                          <?=form_error('del_state')?>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="tp-checkout-input">
                                          <label>City<span>*</span></label>
                                          <input type="text" name="del_city" placeholder="Enter your city" value="<?= set_value('del_city', $user['del_city']) ?>">
                                          <?=form_error('del_city')?>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="tp-checkout-input">
                                          <label>Pincode<span>*</span></label>
                                          <input type="number" name="del_pincode" placeholder="Enter address pincode" value="<?= set_value('del_pincode', $user['del_pincode']) ?>">
                                          <?=form_error('del_pincode')?>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Address<span>*</span></label>
                                          <textarea type="text" name="del_address" placeholder="Enter your address"><?= set_value('del_address', $user['del_address']) ?></textarea>
                                          <?=form_error('del_address')?>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Phone <span>*</span></label>
                                          <input type="number" name="del_phone" placeholder="Enter mobile number" value="<?= set_value('del_phone', $user['del_phone']) ?>">
                                          <?=form_error('del_phone')?>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="tp-checkout-input">
                                          <label>Email address <span>*</span></label>
                                          <input type="email" name="del_email" placeholder="Enter email addreess" value="<?= set_value('del_email', $user['del_email']) ?>">
                                          <?=form_error('del_email')?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-5">
                     <div class="tp-checkout-place white-bg">
                        <h3 class="tp-checkout-place-title">Your Order</h3>
                        <div class="tp-order-info-list">
                           <ul>
                              <li class="tp-order-info-list-header">
                                 <h4>Product</h4>
                                 <h4>Total</h4>
                              </li>
                              <?php foreach ($cart_items as $item): ?>
                              <li class="tp-order-info-list-desc">
                                 <p><?= ellipsize($item['pro_name'], 40) ?> <span> x <?= $item['pro_qty'] ?></span></p>
                                 <span>₹<?= number_format($item['pro_price'] * $item['pro_qty'], 2) ?></span>
                              </li>
                              <?php endforeach; ?>
                              <li class="tp-order-info-list-subtotal">
                                 <span>Subtotal</span>
                                 <span>₹<?= number_format($cart_total, 2) ?></span>
                              </li>
                              <li class="tp-order-info-list-shipping">
                                 <span>Shipping</span>
                                 <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                    <?php if($cart_total>10000):?>
                                       <p>Free shipping</p>
                                    <?php else:?>
                                       <p>Shipping charges: ₹80</p>
                                    <?php endif; ?>
                                    
                                 </div>
                              </li>
                              <li class="tp-order-info-list-total">
                                 <span>Total</span>
                                    <?php if($cart_total>10000):?>
                                       <span>₹<?= number_format($cart_total + 0, 2) ?></span>
                                    <?php else:?>
                                       <span>₹<?= number_format($cart_total + 80, 2) ?></span>
                                    <?php endif; ?>
                              </li>
                           </ul>
                        </div>
                        <div class="tp-checkout-payment">
                        <?php foreach ($cart_items as $item): ?>
                           <input type="hidden" name="cart_items[<?= $item['pro_id'] ?>][pro_id]" value="<?= $item['pro_id'] ?>">
                           <input type="hidden" name="cart_items[<?= $item['pro_id'] ?>][pro_name]" value="<?= $item['pro_name'] ?>">
                           <input type="hidden" name="cart_items[<?= $item['pro_id'] ?>][pro_image]" value="<?= $item['pro_image'] ?>">
                           <input type="hidden" name="cart_items[<?= $item['pro_id'] ?>][pro_qty]" value="<?= $item['pro_qty'] ?>">
                           <input type="hidden" name="cart_items[<?= $item['pro_id'] ?>][pro_price]" value="<?= $item['pro_price'] ?>">
                          <input type="hidden" name="cart_items[<?= $item['pro_id'] ?>][slug]" value="<?= $item['slug'] ?>">
                        <?php endforeach; ?>
                           <input type="hidden" name="cart_total" value="<?= $cart_total ?>">
                           <input type="hidden" name="shipping_cost" value="80">
                           <input type="hidden" name="total" value="<?= $total ?>">
                           <div class="tp-checkout-payment-item">
                              <input type="radio" id="cod" name="pay_mode" value="COD">
                              <label for="cod">Cash on Delivery</label>
                           </div>
                           <div class="tp-checkout-payment-item paypal-payment">
                              <input type="radio" id="razorpay" name="pay_mode" value="RazorPay">
                              <label for="razorpay">RazorPay</label>
                           </div>
                        </div>
                        <div class="tp-checkout-btn-wrapper">
                           <button type="submit" class="tp-checkout-btn w-100">Place Order</button>
                        </div>
                     </div>
                  </div>
               </div>
               <?=form_close()?>
            </div>
         </section>
      </main>

    <?php $this->load->view('front/footer');?>