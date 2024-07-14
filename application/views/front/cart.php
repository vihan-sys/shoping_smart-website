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
         <section class="breadcrumb__area include-bg pt-95 pb-50">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Shopping Cart</h3>
                        <div class="breadcrumb__list">
                           <span><a href="#">Home</a></span>
                           <span>Shopping Cart</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="tp-cart-area pb-120">
         <?=form_open('cart/cart-update')?>
            <div class="container">
               <div class="row">
               <?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success">
                    <?=$this->session->flashdata('success')?>
                </div>
            <?php } ?>
            <?php if($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger">
                    <?=$this->session->flashdata('error')?>
                </div>
            <?php } ?>
            <?php 
               if(!empty($cart)):?>
                  <div class="col-xl-9 col-lg-8">
                     <div class="tp-cart-list mb-25 mr-30">
                        <table class="table">
                           <thead>
                             <tr>
                               <th colspan="2" class="tp-cart-header-product">Product</th>
                               <th class="tp-cart-header-price">Price</th>
                               <th class="tp-cart-header-quantity">Quantity</th>
                               <th></th>
                             </tr>
                           </thead>
                           <tbody>
                           <?php foreach($cart as $arr):?>
                              <tr>
                                 <td class="tp-cart-img"><a href="product/<?=$arr->slug?>"> <img src="uploads/<?=$arr->pro_image?>" alt=""></a></td>
                                 <td class="tp-cart-title"><a href="product/<?=$arr->slug?>"><?=ellipsize($arr->pro_name, 55)?></a></td>
                                 <td class="tp-cart-price"><span>₹<?=number_format($arr->pro_price)?></span></td>
                                 <td class="tp-cart-quantity">
                                    <div class="tp-product-quantity mt-10 mb-10">
                                       <span class="tp-cart-minus">
                                          <svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>                                                             
                                       </span>
                                       <input class="tp-cart-input" type="text" readonly name="up_qty[]" value="<?=$arr->pro_qty?>">
                                       <span class="tp-cart-plus">
                                          <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                       </span>
                                    </div>
                                 </td>
                                 <td class="tp-cart-action">
                                    <a href="cart/delete-product/<?=$arr->pro_id?>" class="tp-cart-action-btn">
                                       <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"/>
                                       </svg>
                                       <span>Remove</span>
                                    </a>
                                    <input type="hidden" name="up_pro_id[]" value="<?=$arr->pro_id?>">
                                 </td>
                              </tr>
                              <?php endforeach; ?>
                           </tbody>
                         </table>
                     </div>
                     <div class="tp-cart-bottom">
                        <div class="row align-items-end">
                           <div class="col-xl-6 col-md-4">
                              <div class="tp-cart-update text-md-end">
                                 <button type="submit" class="tp-cart-update-btn">Update Cart</button>
                              </div>
                           </div>
                        </div>
                        <?=form_close()?>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-4 col-md-6">
                     <div class="tp-cart-checkout-wrapper">
                        <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                           <span class="tp-cart-checkout-top-title">Subtotal</span>
                           <span class="tp-cart-checkout-top-price">₹<?=number_format($total['subtotal'],2)?></span>
                        </div>
                        <div class="tp-cart-checkout-shipping">
                           <h4 class="tp-cart-checkout-shipping-title">Shipping</h4>
                           <div class="tp-cart-checkout-shipping-option-wrapper">
                              <?php if($total['subtotal']>2000):?>
                                 <p>Free shipping</p>
                              <?php else:?>
                                 <p>Shipping charges: ₹<?=number_format($total['delivery'],2)?></p>
                              <?php endif; ?>
                           </div>
                        </div>
                        <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                           <span>Total</span>
                           <span>₹<?=number_format($total['grandtotal'],2)?></span>
                        </div>
                        <div class="tp-cart-checkout-proceed">
                           <a href="checkout" class="tp-cart-checkout-btn w-100">Proceed to Checkout</a>
                           <br><br>
                           <div style="display: flex; justify-content: center; align-items: center;">
                              <a href="<?=base_url();?>" class="btn btn-primary">Continue Shopping</a>
                           </div>
                        </div>
                        </div>
                     </div>
                  </div>
               <?php else:?>
                  <tr>
                     <td class="tp-cart-img" colspan="4"><h5>No product in cart</h5></td>
                  </tr><br><br>
                  <div class="col-xl-6 col-md-4">
                        <div class="tp-cart-update text-md-end">
                              <a href="<?=base_url();?>" type="" class="btn btn-primary">Continue Shopping</a>
                        </div>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
         </section>
      </main>
      <?php $this->load->view('front/footer');?>