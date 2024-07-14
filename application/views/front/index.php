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
      <div id="header-sticky-2" class="tp-header-sticky-area">
         <div class="container">
            <div class="tp-mega-menu-wrapper p-relative">
               <div class="row align-items-center">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                     <div class="logo">
                        <a href="<?=base_url();?>">
                           <img src="assets_front/img/logo/shopclusive.png" width="200" alt="shopclusive">
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-block">
                     <div class="tp-header-sticky-menu main-menu menu-style-1">
                        <nav id="mobile-menu"> 
                        <ul>    
                                    <li><a href="shop">Shop</a></li>
                                    <li><a href="pages/about">About Us</a></li>
                                    <li><a href="pages/contact">Contact Us</a></li>
                                    <li><a href="pages/privacy">Privacy Policy</a></li>
                                 </ul>
                        </nav>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                     <div class="tp-header-action d-flex align-items-center justify-content-end ml-50">
                     <div class="tp-header-login d-none d-lg-block">
                              <a href="login" class="d-flex align-items-center">
                                 <div class="tp-header-login-icon">
                                    <span>
                                       <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="8.57894" cy="5.77803" r="4.77803" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.00002 17.2014C0.998732 16.8655 1.07385 16.5337 1.2197 16.2311C1.67736 15.3158 2.96798 14.8307 4.03892 14.611C4.81128 14.4462 5.59431 14.336 6.38217 14.2815C7.84084 14.1533 9.30793 14.1533 10.7666 14.2815C11.5544 14.3367 12.3374 14.4468 13.1099 14.611C14.1808 14.8307 15.4714 15.27 15.9291 16.2311C16.2224 16.8479 16.2224 17.564 15.9291 18.1808C15.4714 19.1419 14.1808 19.5812 13.1099 19.7918C12.3384 19.9634 11.5551 20.0766 10.7666 20.1304C9.57937 20.2311 8.38659 20.2494 7.19681 20.1854C6.92221 20.1854 6.65677 20.1854 6.38217 20.1304C5.59663 20.0773 4.81632 19.9641 4.04807 19.7918C2.96798 19.5812 1.68652 19.1419 1.2197 18.1808C1.0746 17.8747 0.999552 17.5401 1.00002 17.2014Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>                                       
                                    </span>
                                 </div>
                                 <div class="tp-header-login-content d-none d-xl-block">
                                    <span>Hello, <?=$this->session->userdata('username')?? 'User'?></span>
                                    <h5 class="tp-header-login-title">Your Account</h5>
                                 </div>
                              </a>
                           </div>
                        <div class="tp-header-action-item">
                           <a href="cart" type="" class="tp-header-action-btn cartmini-open-btn">
                              <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M7.70365 10.1018H7.74942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M13.5343 10.1018H13.5801" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>                                                                           
                           </a>
                        </div>
                        <div class="tp-header-action-item d-lg-none">
                           <button type="button" class="tp-header-action-btn tp-offcanvas-open-btn">
                              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16">
                                 <rect x="10" width="20" height="2" fill="currentColor"/>
                                 <rect x="5" y="7" width="25" height="2" fill="currentColor"/>
                                 <rect x="10" y="14" width="20" height="2" fill="currentColor"/>
                              </svg>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <main>
         <section class="tp-slider-area p-relative z-index-1">
            <div class="tp-slider-active tp-slider-variation swiper-container">
               <div class="swiper-wrapper">
                  <?php if(!empty($banner)){
                     foreach ($banner as $bann){ ?>
                  <div class="tp-slider-item tp-slider-height d-flex align-items-center swiper-slide green-dark-bg">
                     <div class="container">
                        <div class="row align-items-center">
                        <span style="color: white;">Banner ID: <?=$bann->bann_id?></span>
                           <div class="col-xl-5 col-lg-6 col-md-6">
                              <div class="tp-slider-content p-relative z-index-1">
                                 <span>New arrivals!</span>
                                 <h3 class="tp-slider-title"><?=ellipsize($bann->headline, 25)?></h3>
                                 <p><?=ellipsize($bann->tagline, 35)?>.</p>
   
                                 <div class="tp-slider-btn">
                                    <a href="shop" class="tp-btn tp-btn-2 tp-btn-white">Shop Now
                                       <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M16 6.99976L1 6.99976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M9.9502 0.975414L16.0002 6.99941L9.9502 13.0244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                    </a>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-7 col-lg-6 col-md-6">
                              <div class="tp-slider-thumb text-end">
                                 <img src="uploads/<?=$bann->bann_image?>" width="420" height="520" alt="slider-img">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php }} ?>
                  
               <div class="tp-slider-arrow tp-swiper-arrow d-none d-lg-block">
                  <button type="button" class="tp-slider-button-prev">
                     <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 13L1 7L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     </svg>                        
                  </button>
                  <button type="button" class="tp-slider-button-next">
                     <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7 7L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     </svg>                        
                  </button>
               </div>
               <div class="tp-slider-dot tp-swiper-dot"></div>
            </div>
         </section>
         <section class="tp-product-category pt-60 pb-15">
            <div class="container">
               <div class="row row-cols-xl-5 row-cols-lg-5 row-cols-md-4">
               <?php if (!empty($get_category_nav)):
                  $counter = 0;
                  foreach ($get_category_nav as $cat):
                     if ($counter < 5): ?>
                     <div class="col">
                        <div class="tp-product-category-item text-center mb-40">
                           <div class="tp-product-category-thumb fix">
                              <a href="shop-category.html">
                                 <img src="uploads/<?= $cat->image ?>" width="110" alt="product-category">
                              </a>
                           </div>
                           <div class="tp-product-category-content">
                              <h3 class="tp-product-category-title">
                                 <a href="shop-category.html"><?= $cat->cate_name ?></a>
                              </h3>
                           </div>
                        </div>
                     </div>
                     <?php
                        $counter++;
                        endif;
                        endforeach;
                        endif;?>
               </div>
            </div>
         </section>
         <section class="tp-feature-area tp-feature-border-radius pb-70">
            <div class="container">
               <div class="row gx-1 gy-1 gy-xl-0">
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                     <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                           <span>
                              <svg width="33" height="27" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M10.7222 1H31.5555V19.0556H10.7222V1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M10.7222 7.94446H5.16667L1.00001 12.1111V19.0556H10.7222V7.94446Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M25.3055 26C23.3879 26 21.8333 24.4454 21.8333 22.5278C21.8333 20.6101 23.3879 19.0555 25.3055 19.0555C27.2232 19.0555 28.7778 20.6101 28.7778 22.5278C28.7778 24.4454 27.2232 26 25.3055 26Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M7.25001 26C5.33235 26 3.77778 24.4454 3.77778 22.5278C3.77778 20.6101 5.33235 19.0555 7.25001 19.0555C9.16766 19.0555 10.7222 20.6101 10.7222 22.5278C10.7222 24.4454 9.16766 26 7.25001 26Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>                                                        
                           </span>
                        </div>
                        <div class="tp-feature-content">
                           <h3 class="tp-feature-title">Free Delivary</h3>
                           <p>Available for Bardhaman</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                     <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                           <span>
                              <svg width="21" height="35" viewBox="0 0 21 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M10.3636 1V34" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M17.8636 7H6.61365C5.22126 7 3.8859 7.55312 2.90134 8.53769C1.91677 9.52226 1.36365 10.8576 1.36365 12.25C1.36365 13.6424 1.91677 14.9777 2.90134 15.9623C3.8859 16.9469 5.22126 17.5 6.61365 17.5H14.1136C15.506 17.5 16.8414 18.0531 17.826 19.0377C18.8105 20.0223 19.3636 21.3576 19.3636 22.75C19.3636 24.1424 18.8105 25.4777 17.826 26.4623C16.8414 27.4469 15.506 28 14.1136 28H1.36365" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>                                                        
                           </span>
                        </div>
                        <div class="tp-feature-content">
                           <h3 class="tp-feature-title">Return & Refund</h3>
                           <p>No return or refund available</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                     <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                           <span>
                              <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <mask id="mask0_1211_583" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="31" height="30">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H30.0024V29.9998H0V0Z" fill="white"/>
                                 </mask>
                                 <g mask="url(#mask0_1211_583)">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4168 27.1116C14.3017 27.9756 15.7266 27.9651 16.6056 27.0816L17.6885 26.0017C18.5285 25.1632 19.6894 24.6848 20.8728 24.6848H22.4178C23.6687 24.6848 24.6856 23.6678 24.6856 22.4184V20.875C24.6856 19.6736 25.1506 18.5441 25.9995 17.6937L27.0795 16.6122C27.519 16.1713 27.7544 15.5998 27.7529 14.9938C27.7514 14.3894 27.513 13.8209 27.0825 13.3919L26.001 12.309C25.1506 11.4525 24.6856 10.3246 24.6856 9.12318V7.58277C24.6856 6.33184 23.6687 5.3149 22.4178 5.3149H20.8758C19.6744 5.3149 18.545 4.84842 17.6945 4.00397L16.6116 2.91954C15.7101 2.02709 14.2717 2.03159 13.3913 2.91804L12.3128 3.99947C11.4519 4.84992 10.3225 5.3149 9.12553 5.3149H7.58212C6.33269 5.3164 5.31575 6.33334 5.31575 7.58277V9.12018C5.31575 10.3216 4.84927 11.451 4.00332 12.303L2.93839 13.3694C2.92789 13.3814 2.91739 13.3904 2.90689 13.4009C2.02644 14.2874 2.03094 15.7258 2.91739 16.6062L4.00032 17.6892C4.84927 18.5411 5.31575 19.6706 5.31575 20.872V22.4184C5.31575 23.6678 6.33119 24.6848 7.58212 24.6848H9.12253C10.3255 24.6863 11.4549 25.1527 12.3053 26.0002L13.3868 27.0786C13.3958 27.0891 13.4063 27.0996 13.4168 27.1116ZM14.9972 30.0002C13.8468 30.0002 12.6963 29.5652 11.8159 28.6923C11.8039 28.6803 11.7919 28.6683 11.7799 28.6548L10.715 27.5914C10.2905 27.1699 9.72352 26.9359 9.12055 26.9344H7.58164C5.09029 26.9344 3.06541 24.908 3.06541 22.4182V20.8717C3.06541 20.2688 2.82992 19.7033 2.40694 19.2773L1.32851 18.2004C-0.423392 16.4575 -0.444391 13.6197 1.27601 11.8498C1.28951 11.8363 1.30301 11.8228 1.31651 11.8093L2.40844 10.7143C2.82992 10.2899 3.06541 9.72139 3.06541 9.11993V7.58252C3.06541 5.09266 5.09029 3.06628 7.58014 3.06478H9.12505C9.72652 3.06478 10.2935 2.82929 10.724 2.40482L11.7964 1.32938C13.5498 -0.436017 16.4161 -0.445016 18.1845 1.31288L19.281 2.40932C19.7054 2.83079 20.2724 3.06478 20.8754 3.06478H22.4173C24.9086 3.06478 26.935 5.09116 26.935 7.58252V9.12293C26.935 9.72439 27.169 10.2929 27.5935 10.7203L28.6704 11.7988C29.5239 12.6462 29.9978 13.7787 30.0023 14.9861C30.0068 16.1935 29.5404 17.329 28.6899 18.1854L27.5905 19.2818C27.169 19.7063 26.935 20.2718 26.935 20.8747V22.4182C26.935 24.908 24.9086 26.9344 22.4188 26.9344H20.8724C20.2784 26.9344 19.6979 27.1744 19.2765 27.5929L18.1995 28.6698C17.3191 29.5562 16.1581 30.0002 14.9972 30.0002Z" fill="currentColor"/>
                                 </g>
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M11.145 19.9811C10.857 19.9811 10.569 19.8716 10.3501 19.6511C9.91058 19.2116 9.91058 18.5006 10.3501 18.0612L18.0596 10.3501C18.4991 9.91064 19.2115 9.91064 19.651 10.3501C20.0905 10.7896 20.0905 11.502 19.651 11.9415L11.94 19.6511C11.721 19.8716 11.433 19.9811 11.145 19.9811Z" fill="currentColor"/>
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7544 20.2476C17.925 20.2476 17.247 19.5772 17.247 18.7477C17.247 17.9183 17.9115 17.2478 18.7409 17.2478H18.7544C19.5839 17.2478 20.2543 17.9183 20.2543 18.7477C20.2543 19.5772 19.5839 20.2476 18.7544 20.2476Z" fill="currentColor"/>
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2548 12.748C10.4254 12.748 9.74744 12.0775 9.74744 11.2481C9.74744 10.4186 10.4119 9.74817 11.2413 9.74817H11.2548C12.0843 9.74817 12.7548 10.4186 12.7548 11.2481C12.7548 12.0775 12.0843 12.748 11.2548 12.748Z" fill="currentColor"/>
                              </svg>                                                                                        
                           </span>
                        </div>
                        <div class="tp-feature-content">
                           <h3 class="tp-feature-title">Discount</h3>
                           <p>₹500 discount on pre payment</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                     <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                           <span>
                              <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M1.5 24.3333V15C1.5 11.287 2.975 7.72602 5.60051 5.10051C8.22602 2.475 11.787 1 15.5 1C19.213 1 22.774 2.475 25.3995 5.10051C28.025 7.72602 29.5 11.287 29.5 15V24.3333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M29.5 25.8889C29.5 26.714 29.1722 27.5053 28.5888 28.0888C28.0053 28.6722 27.214 29 26.3889 29H24.8333C24.0082 29 23.2169 28.6722 22.6335 28.0888C22.05 27.5053 21.7222 26.714 21.7222 25.8889V21.2222C21.7222 20.3971 22.05 19.6058 22.6335 19.0223C23.2169 18.4389 24.0082 18.1111 24.8333 18.1111H29.5V25.8889ZM1.5 25.8889C1.5 26.714 1.82778 27.5053 2.41122 28.0888C2.99467 28.6722 3.78599 29 4.61111 29H6.16667C6.99179 29 7.78311 28.6722 8.36656 28.0888C8.95 27.5053 9.27778 26.714 9.27778 25.8889V21.2222C9.27778 20.3971 8.95 19.6058 8.36656 19.0223C7.78311 18.4389 6.99179 18.1111 6.16667 18.1111H1.5V25.8889Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>                                                                                       
                           </span>
                        </div>
                        <div class="tp-feature-content">
                           <h3 class="tp-feature-title">Support 24/7</h3>
                           <p>Contact us 24/7, 365 days</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="tp-product-area pb-55">
            <div class="container">
               <div class="row align-items-end">
                  <div class="col-xl-5 col-lg-6 col-md-5">
                     <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title">Newly Added Products 

                           
                           <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053" stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637" stroke-linecap="round"/>
                           </svg>
                        </h3>
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-6 col-md-7">
                     <div class="tp-product-tab tp-product-tab-border mb-45 tp-tab d-flex justify-content-md-end">
                        <ul class="nav nav-tabs justify-content-sm-end" id="productTab" role="tablist">  
                        </ul>                         
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-12">
                     <div class="tp-product-tab-content">
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="new-tab-pane" role="tabpanel" aria-labelledby="new-tab" tabindex="0">
                              <div class="row">
                              <?php if (!empty($products)):
                                 $counter = 0;
                                 foreach ($products as $arr):
                                    if ($counter < 12):
                                       $cate_name = $this->homeModel->category_name($arr->category); ?>
                                       <div class="col-xl-3 col-lg-3 col-sm-6">
                                          <div class="tp-product-item p-relative transition-3 mb-25">
                                             <div class="tp-product-thumb p-relative fix m-img">
                                                <a href="product/<?= $arr->slug ?>">
                                                   <img src="uploads/<?= $arr->pro_main_image ?>" alt="products">
                                                </a>
                                             </div>
                                             <div class="tp-product-content">
                                                <div class="tp-product-category">
                                                   <a><?= $cate_name ?></a>
                                                </div>
                                                <h3 class="tp-product-title">
                                                   <a href="product/<?= $arr->slug ?>">
                                                   <?= ellipsize($arr->pro_name, 67) ?>
                                                   </a>
                                                </h3>
                                                <div class="tp-product-price-wrapper">
                                                   <span class="tp-product-price old-price">₹<?= number_format($arr->mrp) ?></span><br>
                                                   <span class="tp-product-price new-price">₹<?= number_format($arr->selling_price) ?></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    <?php
                                       $counter++;
                                       endif;
                                       endforeach;
                                       endif; ?>
                              </div>
                           </div>
                         </div>                         
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <div class="modal fade tp-product-modal" id="producQuickViewModal" tabindex="-1" aria-labelledby="producQuickViewModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="tp-product-modal-content d-lg-flex align-items-start">
                     <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal"><i class="fa-regular fa-xmark"></i></button>
                     <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                        <nav>
                           <div class="nav nav-tabs flex-sm-column " id="productDetailsNavThumb" role="tablist">
                              <button class="nav-link active" id="nav-1-tab" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1" aria-selected="true">
                                 <img src="assets_front/img/product/details/nav/product-details-nav-1.jpg" alt="">
                              </button>
                              <button class="nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-controls="nav-2" aria-selected="false">
                                 <img src="assets_front/img/product/details/nav/product-details-nav-2.jpg" alt="">
                              </button>
                              <button class="nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3" type="button" role="tab" aria-controls="nav-3" aria-selected="false">
                                 <img src="assets_front/img/product/details/nav/product-details-nav-3.jpg" alt="">
                              </button>
                              <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                                 <img src="assets_front/img/product/details/nav/product-details-nav-4.jpg" alt="">
                              </button>
                           </div>
                        </nav>
                        <div class="tab-content m-img" id="productDetailsNavContent">
                           <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab" tabindex="0">
                              <div class="tp-product-details-nav-main-thumb">
                                 <img src="assets_front/img/product/details/main/product-details-main-1.jpg" alt="">
                              </div>
                           </div>
                           <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab" tabindex="0">
                              <div class="tp-product-details-nav-main-thumb">
                                 <img src="assets_front/img/product/details/main/product-details-main-2.jpg" alt="">
                              </div>
                           </div>
                           <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab" tabindex="0">
                              <div class="tp-product-details-nav-main-thumb">
                                 <img src="assets_front/img/product/details/main/product-details-main-3.jpg" alt="">
                              </div>
                           </div>
                           <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab" tabindex="0">
                              <div class="tp-product-details-nav-main-thumb">
                                 <img src="assets_front/img/product/details/main/product-details-main-4.jpg" alt="">
                              </div>
                           </div>
                         </div>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </main>
      <?php $this->load->view('front/footer');?>