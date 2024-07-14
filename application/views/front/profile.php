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
<section class="profile__area pt-120 pb-120">
    <div class="container">
        <div class="profile__inner p-relative">
            
            <div class="row">
                <div class="col-xxl-4 col-lg-4">
                    <div class="profile__tab mr-40">
                        <nav>
                            <div class="nav nav-tabs tp-tab-menu flex-column" id="profile-tab" role="tablist">
                                <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><span><i class="fa-regular fa-user-pen"></i></span>Profile</button>
                                <button class="nav-link" id="nav-information-tab" data-bs-toggle="tab" data-bs-target="#nav-information" type="button" role="tab" aria-controls="nav-information" aria-selected="false"><span><i class="fa-regular fa-circle-info"></i></span> Information</button>
                                <button class="nav-link" id="nav-order-tab" data-bs-toggle="tab" data-bs-target="#nav-order" type="button" role="tab" aria-controls="nav-order" aria-selected="false"><span><i class="fa-light fa-clipboard-list-check"></i></span> My Orders </button>
                                <span id="marker-vertical" class="tp-tab-line d-none d-sm-inline-block"></span>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-8 col-lg-8">
                    <div class="profile__tab-content">
                        <div class="tab-content" id="profile-tabContent">
                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="profile__main">
                                    <div class="profile__main-top pb-80">
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <div class="profile__main-inner d-flex flex-wrap align-items-center">
                                                    <div class="profile__main-thumb">
                                                        <img src="uploads/defuser.png" alt="">
                                                        <div class="profile__main-thumb-edit">
                                                            <input id="profile-thumb-input" class="profile-img-popup" name="image" type="file">
                                                            <label for="profile-thumb-input"><i class="fa-light fa-camera"></i></label>
                                                        </div>
                                                    </div>
                                                    <div class="profile__main-content">
                                                        <h4 class="profile__main-title"><br>Welcome, <?=$this->session->userdata('username')?? 'User'?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="profile__main-logout text-sm-end">
                                                    <a href="logout" class="tp-logout-btn">Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
                                <div class="profile__info">
                                    <h3 class="profile__info-title">Personal Details (Billing address)</h3>
                                    <div class="profile__info-content">
                                        <?=form_open()?>
                                        <input type="hidden" name="user_id" value="<?= $this->session->userdata('login_id') ?>">
                                        <div class="row">
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="profile__input-box">
                                                    <div class="profile__input">
                                                        <input type="text" name="username" placeholder="Enter your username" value="<?= set_value('username', $user['username']) ?>">
                                                        <span>
                                                            <svg width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9 9C11.2091 9 13 7.20914 13 5C13 2.79086 11.2091 1 9 1C6.79086 1 5 2.79086 5 5C5 7.20914 6.79086 9 9 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M15.5 17.6C15.5 14.504 12.3626 12 8.5 12C4.63737 12 1.5 14.504 1.5 17.6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <?=form_error('username')?>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="profile__input-box">
                                                    <div class="profile__input">
                                                        <input type="email" name="email" placeholder="Enter your email" value="<?= set_value('email', $user['email']) ?>">
                                                        <span>
                                                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M13 14.6H5C2.6 14.6 1 13.4 1 10.6V5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M13 5.3999L10.496 7.3999C9.672 8.0559 8.32 8.0559 7.496 7.3999L5 5.3999" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <?=form_error('email')?>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="profile__input-box">
                                                    <div class="profile__input">
                                                        <input type="number" name="phone" placeholder="Enter your number" value="<?= set_value('phone', $user['phone']) ?>">
                                                        <span>
                                                            <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M13.9148 5V13C13.9148 16.2 13.1076 17 9.87892 17H5.03587C1.80717 17 1 16.2 1 13V5C1 1.8 1.80717 1 5.03587 1H9.87892C13.1076 1 13.9148 1.8 13.9148 5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path opacity="0.4" d="M9.08026 3.80054H5.85156" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path opacity="0.4" d="M7.45425 14.6795C8.14522 14.6795 8.70537 14.1243 8.70537 13.4395C8.70537 12.7546 8.14522 12.1995 7.45425 12.1995C6.76327 12.1995 6.20312 12.7546 6.20312 13.4395C6.20312 14.1243 6.76327 14.6795 7.45425 14.6795Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <?=form_error('phone')?>
                                            </div>
                                            <div class="col-xxl-6">
                                                <div class="profile__input-box">
                                                    <div class="profile__input">
                                                        <input type="text" name="state" placeholder="Enter your state" value="<?= set_value('state', $user['state']) ?>">
                                                        <span>
                                                            <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7.99377 10.1461C9.39262 10.1461 10.5266 9.0283 10.5266 7.64946C10.5266 6.27061 9.39262 5.15283 7.99377 5.15283C6.59493 5.15283 5.46094 6.27061 5.46094 7.64946C5.46094 9.0283 6.59493 10.1461 7.99377 10.1461Z" stroke="currentColor" stroke-width="1.5"/>
                                                                <path d="M1.19707 6.1933C2.79633 -0.736432 13.2118 -0.72843 14.803 6.2013C15.7365 10.2663 13.1712 13.7072 10.9225 15.8357C9.29079 17.3881 6.70924 17.3881 5.06939 15.8357C2.8288 13.7072 0.263493 10.2583 1.19707 6.1933Z" stroke="currentColor" stroke-width="1.5"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <?=form_error('states')?>
                                            </div>
                                            <div class="col-xxl-6">
                                                <div class="profile__input-box">
                                                    <div class="profile__input">
                                                        <input type="text" name="city" placeholder="Enter your city" value="<?= set_value('city', $user['city']) ?>">
                                                        <span>
                                                            <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7.99377 10.1461C9.39262 10.1461 10.5266 9.0283 10.5266 7.64946C10.5266 6.27061 9.39262 5.15283 7.99377 5.15283C6.59493 5.15283 5.46094 6.27061 5.46094 7.64946C5.46094 9.0283 6.59493 10.1461 7.99377 10.1461Z" stroke="currentColor" stroke-width="1.5"/>
                                                                <path d="M1.19707 6.1933C2.79633 -0.736432 13.2118 -0.72843 14.803 6.2013C15.7365 10.2663 13.1712 13.7072 10.9225 15.8357C9.29079 17.3881 6.70924 17.3881 5.06939 15.8357C2.8288 13.7072 0.263493 10.2583 1.19707 6.1933Z" stroke="currentColor" stroke-width="1.5"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <?=form_error('city')?>
                                            </div>
                                            <div class="col-xxl-6">
                                                <div class="profile__input-box">
                                                    <div class="profile__input">
                                                        <input type="number" name="pincode" placeholder="Enter your pincode" value="<?= set_value('pincode', $user['pincode']) ?>">
                                                        <span>
                                                            <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7.99377 10.1461C9.39262 10.1461 10.5266 9.0283 10.5266 7.64946C10.5266 6.27061 9.39262 5.15283 7.99377 5.15283C6.59493 5.15283 5.46094 6.27061 5.46094 7.64946C5.46094 9.0283 6.59493 10.1461 7.99377 10.1461Z" stroke="currentColor" stroke-width="1.5"/>
                                                                <path d="M1.19707 6.1933C2.79633 -0.736432 13.2118 -0.72843 14.803 6.2013C15.7365 10.2663 13.1712 13.7072 10.9225 15.8357C9.29079 17.3881 6.70924 17.3881 5.06939 15.8357C2.8288 13.7072 0.263493 10.2583 1.19707 6.1933Z" stroke="currentColor" stroke-width="1.5"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <?=form_error('pincode')?>
                                            </div>
                                            <div class="col-xxl-12">
                                                <div class="profile__input-box">
                                                    <div class="profile__input">
                                                        <textarea type="text" name="address" placeholder="Enter your address"?><?= set_value('address', $user['address']) ?></textarea>
                                                    </div>
                                                </div>
                                                <?=form_error('address')?>
                                            </div>
                                            <div class="col-xxl-12">
                                                <div class="profile__btn">
                                                    <button type="submit" class="tp-btn">Update Profile</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?=form_close()?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                                <div class="profile__ticket table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sub order Id</th>
                                                <th scope="col">Product Image</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Order Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orders as $order): ?>
                                                <tr>
                                                    <th scope="row">#<?php echo $order->sub_order_id; ?></th>
                                                    <td class="tp-cart-img"><a href="<?= base_url('profile/view-order-details/' . $order->order_id) ?>"> <img src="uploads/<?=$order->pro_image?>" alt=""></a></td>
                                                    <td class=""><a href="<?= base_url('profile/view-order-details/' . $order->order_id) ?>"><?= ellipsize($order->pro_name, 55) ?></a></td>
                                                    <td>
                                                    <?php 
                                                   switch ($order->pro_status) {
                                                      case 1:
                                                         echo '<span style="color: green;">Order Placed</span>';
                                                         break;
                                                      case 2:
                                                         echo '<span style="color: yellow;">Pending</span>';
                                                         break;
                                                      case 3:
                                                         echo '<span style="color: blue;">Out for Delivery</span>';
                                                         break;
                                                      case 4:
                                                         echo 'Order Delivered';
                                                         break;
                                                      case 5:
                                                         echo '<span style="color: red;">Order Cancelled</span>';
                                                         break;
                                                      default:
                                                         echo 'Unknown';
                                                         break;
                                                   }
                                                   ?>
                                                    </td>
                                                    <td><?php echo $order->order_date; ?></td>
                                                      <td>
                                                            <?php if ($order->pro_status != 3 && $order->pro_status != 4 && $order->pro_status != 5): ?>
                                                               <a href="#" class="tp-logout-btn cancel-btn" data-order-id="<?= $order->sub_order_id ?>">Cancel</a>
                                                            <?php endif; ?>
                                                      </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div class="tp-pagination">
                                       <nav>
                                          <ul>
                                             <li>
                                                <?php echo $pagination_links; ?>
                                             </li>
                                          </ul>
                                       </nav>
                                    </div>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cancelButtons = document.querySelectorAll('.cancel-btn');
    cancelButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const orderId = this.getAttribute('data-order-id');
            if (confirm('Do you want to cancel the order?')) {
                window.location.href = 'profile/cancel_order/' + orderId;
            }
        });
    });
});
</script>
