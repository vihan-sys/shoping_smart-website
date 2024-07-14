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
                                                <h4 class="card-title mb-0 flex-grow-1">Add product</h4>
                                            </div>
                                            <div class="card-body">
                                            <span style="font-size: 1.1em; color: red;">*</span> <span style="font-size: 0.95em; color: red;">sections are mandatory to be filled up</span><br>
                                        <?=form_open_multipart()?>                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="" name="pro_id" readonly value="<?=set_value('pro_id',$pro_id)?>" placeholder="Product name">
                                                        <label for="floatingFirstnameInput">Product ID<span style="font-size: 1.1em; color: red;">*</span>
                                                        </label>
                                                        <?=form_error('pro_id');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" onchange="get_categories(this.value)" id="floatingSelectGrid" name="category">
                                                            <option value="" selected>Select</option>
                                                            <?php foreach ($categories as $value) { ?>
                                                                <option value="<?=$value->cate_id?>"><?=$value->cate_name?></option>
                                                           <?php } ?>
                                                        </select>
                                                        <label for="floatingSelectGrid">Category<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?=form_error('category');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select subcat" id="floatingSelectGrid" name="sub_category">
                                                            <option value="" selected>Select</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Sub category</label>
                                                        <?=form_error('sub_category');?>
                                                    </div>
                                                </div>
                                                    <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="" name="pro_name" placeholder="Product name">
                                                        <label for="floatingFirstnameInput">Product name<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?=form_error('pro_name');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="" name="brand" placeholder="Product brand">
                                                        <label for="floatingFirstnameInput">Product brand<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?=form_error('brand');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="floatingSelectGrid" name="featured">
                                                            <option value="" selected>Select</option>
                                                            <option value="1">Deal of the month</option>
                                                            <option value="2">New arrival</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Featured</label>
                                                        <?=form_error('featured');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-top: 20px;">
                                                <label for="floatingSelectGrid"> Highlights<span style="font-size: 1.1em; color: red;">*</span></label>
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="highlights" name="highlights" style="width: 100%; height: 150px;"></textarea>
                                                        <?=form_error('highlights');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-top: 20px;">
                                                <label for="floatingSelectGrid"> Description<span style="font-size: 1.1em; color: red;">*</span></label>
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="description" name="description" style="width: 100%; height: 150px;"></textarea>
                                                        <?=form_error('description');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="" name="stock" placeholder="Product stock">
                                                        <label for="floatingFirstnameInput">Product stock<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?=form_error('stock');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="" name="mrp" placeholder="Product mrp">
                                                        <label for="floatingFirstnameInput">Product MRP<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?=form_error('mrp');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="" name="selling_price" placeholder="Product name">
                                                        <label for="floatingFirstnameInput">Selling price<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?=form_error('selling_price');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="" name="meta_title" placeholder="Product brand">
                                                        <label for="floatingFirstnameInput">Meta title</label>
                                                        <?=form_error('meta_title');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="" name="meta_keywords" placeholder="Product brand">
                                                        <label for="floatingFirstnameInput">Meta keywords</label>
                                                        <?=form_error('meta_keywords');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="" name="meta_desc" placeholder="Product brand">
                                                        <label for="floatingFirstnameInput">Meta description</label>
                                                        <?=form_error('meta_desc');?>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="file" class="form-control" id="" name="pro_main_image" placeholder="Enter category name">
                                                        <label for="floatingFirstnameInput">Product image<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <span style="font-size: 0.85em; color: grew;">Product image must be within 600*700 pixels.</span>
                                                        <br><?=form_error('pro_main_image');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="file" class="form-control" id="" name="gallery_image" placeholder="Enter category name">
                                                        <label for="floatingFirstnameInput">Product gallery image</label>
                                                        <?=form_error('gallery_image');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="floatingSelectGrid" name="status">
                                                            <option value="" selected>Select</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Deactive</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Status<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?=form_error('status');?>
                                                    </div>
                                                </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                                            </div>
                                        <?=form_close()?>
                                        <script>
                                            CKEDITOR.replace('highlights');
                                            CKEDITOR.replace('description');
                                        </script>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
    <?php $this->load->view('footer');?>