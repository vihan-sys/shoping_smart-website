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
<body>
    <?php $this->load->view('front/header');?>
    <main>
        <section class="breadcrumb__area include-bg pt-100 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content p-relative z-index-1">
                            <h3 class="breadcrumb__title">Shop</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="tp-shop-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="tp-shop-main-wrapper">
                            <div class="tp-shop-items-wrapper tp-shop-item-primary">
                                <div class="tab-content" id="productTabContent">
                                    <div class="tab-pane fade show active" id="grid-tab-pane" role="tabpanel" aria-labelledby="grid-tab" tabindex="0">
                                        <div class="row infinite-container">

                                            <?php if (!empty($products)): ?>
                                            <div id="product-container" class="row">
                                                <?php foreach ($products as $product): ?>
                                                <div class="col-xl-4 col-md-6 col-sm-6 infinite-item">
                                                    <div class="tp-product-item-2 mb-40">
                                                        <div class="tp-product-thumb-2 p-relative z-index-1 fix w-img">
                                                            <a href="product/<?= $product->pro_id; ?>">
                                                                <img src="uploads/<?= $product->pro_main_image; ?>" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="tp-product-content-2 pt-15">
                                                            <div class="tp-product-tag-2">
                                                                <a><?= $product->brand; ?></a>
                                                            </div>
                                                            <h3 class="tp-product-title-2">
                                                                <a href="product/<?= $product->slug; ?>"><?=ellipsize($product->pro_name,80) ?></a>
                                                            </h3>
                                                            <div class="tp-product-price-wrapper-2">
                                                                <span class="tp-product-price-2 new-price" style="font-size: 18px;">₹<?= number_format($product->selling_price); ?></span>
                                                                <span class="tp-product-price-2 old-price" style="font-size: 16px; padding-left: 10px;">₹<?= number_format($product->mrp); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <?php else: ?>
                                            <p>No products found.</p>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="infinite-pagination d-none">
                                <a href="shop.html" class="infinite-next-link">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $this->load->view('front/footer');?>
</body>
</html>
