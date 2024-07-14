<!doctype html>
<html lang="en">
<head>       
    <meta charset="utf-8" />
    <title>Dashboard of Shopclusive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" /> 
    <base href="<?=base_url()?>">
    <?php $this->load->view('links');?>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
    <?php $this->load->view('header');?>
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
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
                        <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header border-0 align-items-center d-flex pb-0">
                                                <h4 class="card-title mb-0 flex-grow-1">Update product</h4>
                                            </div>
                                            <div class="card-body">
                                            <span style="font-size: 1.1em; color: red;">*</span> <span style="font-size: 0.95em; color: red;">sections are mandatory to be filled up</span><br>
                                            <?= form_open_multipart('home/product_update') ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="pro_id" name="pro_id" onchange="fetchProductDetails(this.value)">
                                                            <option value="" selected>Select</option>
                                                            <?php foreach ($product_ids as $product) { ?>
                                                                <option value="<?= $product->pro_id ?>"><?= $product->pro_id ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="pro_id">Product ID<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?= form_error('pro_id'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="category" name="category">
                                                            <option value="" selected>Select</option>
                                                            <?php foreach ($categories as $value) { ?>
                                                                <option value="<?= $value->cate_id ?>"><?= $value->cate_name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="category">Category<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?= form_error('category'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="sub_category" name="sub_category">
                                                            <option value="" selected>Select</option>
                                                        </select>
                                                        <label for="sub_category">Sub category</label>
                                                        <?= form_error('sub_category'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="Product name">
                                                        <label for="pro_name">Product name<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?= form_error('pro_name'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="brand" name="brand" placeholder="Product brand">
                                                        <label for="brand">Product brand<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?= form_error('brand'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="featured" name="featured">
                                                            <option value="" selected>Select</option>
                                                            <option value="1">Deal of the month</option>
                                                            <option value="2">New arrival</option>
                                                        </select>
                                                        <label for="featured">Featured</label>
                                                        <?= form_error('featured'); ?>
                                                    </div>
                                                </div>
    <div class="col-md-12" style="margin-top: 20px;">
        <label for="highlights">Highlights<span style="font-size: 1.1em; color: red;">*</span></label>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="highlights" name="highlights" style="width: 100%; height: 150px;"></textarea>
            <?= form_error('highlights'); ?>
        </div>
    </div>
    <div class="col-md-12" style="margin-top: 20px;">
        <label for="description">Description<span style="font-size: 1.1em; color: red;">*</span></label>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="description" name="description" style="width: 100%; height: 150px;"></textarea>
            <?= form_error('description'); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="stock" name="stock" placeholder="Product stock">
            <label for="stock">Product stock<span style="font-size: 1.1em; color: red;">*</span></label>
            <?= form_error('stock'); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="mrp" name="mrp" placeholder="Product MRP">
            <label for="mrp">Product MRP<span style="font-size: 1.1em; color: red;">*</span></label>
            <?= form_error('mrp'); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="selling_price" name="selling_price" placeholder="Selling price">
            <label for="selling_price">Selling price<span style="font-size: 1.1em; color: red;">*</span></label>
            <?= form_error('selling_price'); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta title">
            <label for="meta_title">Meta title</label>
            <?= form_error('meta_title'); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta keywords">
            <label for="meta_keywords">Meta keywords</label>
            <?= form_error('meta_keywords'); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="meta_desc" name="meta_desc" placeholder="Meta description">
            <label for="meta_desc">Meta description</label>
            <?= form_error('meta_desc'); ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-floating mb-3">
            <input type="file" class="form-control" id="pro_main_image" name="pro_main_image" placeholder="Enter category name">
            <label for="pro_main_image">Product image<span style="font-size: 1.1em; color: red;">*</span></label>
            <span style="font-size: 0.85em; color: grey;">Product image must be within 600*700 pixels.</span>
            <br><?= form_error('pro_main_image'); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="file" class="form-control" id="gallery_image" name="gallery_image" placeholder="Enter category name">
            <label for="gallery_image">Product gallery image</label>
            <?= form_error('gallery_image'); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <select class="form-select" id="" name="status">
                <option value="" selected>Select</option>
                <option value="1">Active</option>
                <option value="0">Deactive</option>
            </select>
            <label for="status">Status<span style="font-size: 1.1em; color: red;">*</span></label>
            <?= form_error('status'); ?>
        </div>
    </div>
    
    <div>
        <button type="submit" class="btn btn-primary w-md">Update product</button>
    </div>
</div>
<?= form_close() ?>

<script>
    CKEDITOR.replace('highlights');
    CKEDITOR.replace('description');

    function fetchProductDetails(pro_id) {
        if (pro_id) {
            $.ajax({
                url: '<?= base_url("home/get_product_details/") ?>' + pro_id,
                type: 'GET',
                success: function(response) {
                    var data = JSON.parse(response);
                    $('#pro_name').val(data.pro_name);
                    $('#category').val(data.category);
                    $('#sub_category').val(data.sub_category);
                    $('#brand').val(data.brand);
                    $('#featured').val(data.featured);
                    CKEDITOR.instances.highlights.setData(data.highlights);
                    CKEDITOR.instances.description.setData(data.description);
                    $('#stock').val(data.stock);
                    $('#mrp').val(data.mrp);
                    $('#selling_price').val(data.selling_price);
                    $('#meta_title').val(data.meta_title);
                    $('#meta_keywords').val(data.meta_keywords);
                    $('#meta_desc').val(data.meta_desc);
                    $('#status').val(data.status);
                }
            });
        }
    }

    // Ensure CKEditor instances are updated when returning to the page
    $(document).ready(function() {
        var pro_id = $('#pro_id').val(); // Assuming the product ID field has an ID of 'pro_id'
        if (pro_id) {
            fetchProductDetails(pro_id);
        }
    });
</script>


                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
    <?php $this->load->view('footer');?>