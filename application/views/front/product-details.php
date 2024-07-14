<!doctype html>
<html lang="zxxe">
<head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Shopclusive - All product in one place</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/x-icon" href="">
    <?php $this->load->view('front/links');?>
   </head>
   <?php $this->load->view('front/header');?>
   <main>
         <section class="breadcrumb__area breadcrumb__style-2 include-bg pt-50 pb-20">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="breadcrumb__content p-relative z-index-1">
                        <div class="breadcrumb__list has-icon">
                           <span class="breadcrumb-icon">
                              <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M1.42393 16H15.5759C15.6884 16 15.7962 15.9584 15.8758 15.8844C15.9553 15.8104 16 15.71 16 15.6054V6.29143C16 6.22989 15.9846 6.1692 15.9549 6.11422C15.9252 6.05923 15.8821 6.01147 15.829 5.97475L8.75305 1.07803C8.67992 1.02736 8.59118 1 8.5 1C8.40882 1 8.32008 1.02736 8.24695 1.07803L1.17098 5.97587C1.11791 6.01259 1.0748 6.06035 1.04511 6.11534C1.01543 6.17033 0.999976 6.23101 1 6.29255V15.6063C1.00027 15.7108 1.04504 15.8109 1.12451 15.8847C1.20398 15.9585 1.31165 16 1.42393 16ZM10.1464 15.2107H6.85241V10.6202H10.1464V15.2107ZM1.84866 6.48977L8.4999 1.88561L15.1517 6.48977V15.2107H10.9946V10.2256C10.9946 10.1209 10.95 10.0206 10.8704 9.94654C10.7909 9.87254 10.683 9.83096 10.5705 9.83096H6.42848C6.316 9.83096 6.20812 9.87254 6.12858 9.94654C6.04904 10.0206 6.00435 10.1209 6.00435 10.2256V15.2107H1.84806L1.84866 6.48977Z" fill="#55585B" stroke="#55585B" stroke-width="0.5"/>
                              </svg>
                           </span>
                           <span><a href="#">Home</a></span>
                           <span><?=$this->homeModel->category_name($arr->category)?></span>
                           <span><?=ellipsize($arr->pro_name,50)?></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="tp-product-details-area">
            <div class="tp-product-details-top pb-115">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-7 col-lg-6">
                        <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                           <div class="tab-content m-img" id="productDetailsNavContent">
                              <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab" tabindex="0">
                                 <div class="tp-product-details-nav-main-thumb">
                                    <img src="uploads/<?=$arr->pro_main_image?>" alt="">
                                 </div>
                              </div>
                            </div>
                        </div>
                     </div> 
                     <div class="col-xl-5 col-lg-6">
                        <div class="tp-product-details-wrapper">
                           <div class="tp-product-details-category">
                              <span><?=$this->homeModel->category_name($arr->category)?></span>
                           </div>
                           <h3 class="tp-product-details-title"><?=ellipsize($arr->pro_name, 90)?></h3>
                           <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                              <div class="tp-product-details-stock mb-10">
                              <p>Product ID: <?=$arr->pro_id?></p>
                                <?php if($arr->stock >= 1): ?>
                                 <span>In Stock: <b><?=$arr->stock?></b></span>
                                 <?php else: ?>
                                 <span>Out Of Stock</span>
                                <?php endif; ?>
                              </div>
                           </div>
                           <p><?=$arr->highlights?></p>
                           <div class="tp-product-details-price-wrapper mb-20">
                              <span class="tp-product-details-price old-price">₹<?=number_format($arr->mrp)?></span>
                              <span class="tp-product-details-price new-price">₹<?=number_format($arr->selling_price)?></span>
                           </div>
                           <?=form_open('cart/add-to-cart')?>
                           <div class="tp-product-details-action-wrapper">
                              <h3 class="tp-product-details-action-title">Quantity</h3>
                              <div class="tp-product-details-action-item-wrapper d-flex align-items-center">
                                 <div class="tp-product-details-quantity">
                                    <div class="tp-product-quantity mb-15 mr-15">
                                       <span class="tp-cart-minus">
                                          <svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>                                                            
                                       </span>
                                       <input class="tp-cart-input" type="text" readonly name="pro_qty" value="1">
                                       
                                       <span class="tp-cart-plus">
                                          <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="tp-product-details-add-to-cart mb-15 w-100">
                                 <input type="hidden" name="pro_id" value="<?=$arr->pro_id?>">
                                 <button class="tp-product-details-buy-now-btn w-100" <?= $arr->stock <= 0 ? 'disabled' : '' ?>>
                                    <?= $arr->stock <= 0 ? 'Out of Stock' : 'Add To Cart' ?>
                                 </button>
                                 </div>
                              </div>
                              <?=form_close()?>
                           </div>
                           <div class="tp-product-details-action-sm">
                           </div>
                           <div class="tp-product-details-query">
                              
                              <div class="tp-product-details-query-item d-flex align-items-center">
                                 <span>Category:  </span>
                                 <p><?=$this->homeModel->category_name($arr->category)?></p>
                              </div>
                           </div>
                           
                           <div class="tp-product-details-msg mb-15">
                              <ul>
                                 <li>No return after purchase</li>
                                 <li>Order yours before 2.30pm to get delivery on next day</li>
                              </ul>
                           </div>
                           <div class="tp-product-details-payment d-flex align-items-center flex-wrap justify-content-between">
                              <p>Guaranteed safe <br> & secure checkout</p>
                              <img src="assets/img/product/icons/payment-option.png" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tp-product-details-bottom pb-140">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="tp-product-details-tab-nav tp-tab">
                           <nav>
                              <div class="nav nav-tabs justify-content-center p-relative tp-product-tab" id="navPresentationTab" role="tablist">
                                <a class="nav-link active" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="" role="tab" aria-controls="nav-description" aria-selected="true">Description</a>
                                <span id="productTabMarker" class="tp-product-details-tab-line"></span>
                              </div>
                            </nav>  
                            <div class="tab-content" id="navPresentationTabContent">
                              <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab" tabindex="0">
                                 <div class="tp-product-details-desc-wrapper pt-80">
                                    <div class="row justify-content-center">
                                       <div class="col-xl-10">
                                          <div class="tp-product-details-desc-item pb-105">
                                             <div class="row">
                                                <div class="col-lg-12">
                                                   <div class="tp-product-details-desc-content pt-25">
                                                      <p><?=$arr->description?></p>
                                                   </div>
                                                </div>
                                                
                                             </div>
                                          </div>
                                          
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="nav-addInfo" role="tabpanel" aria-labelledby="nav-addInfo-tab" tabindex="0">
                                 
                                 
                              </div>
                              
                            </div>                                                
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>

   <?php $this->load->view('front/footer');?>