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
                        <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header border-0 align-items-center d-flex pb-0">
                                                <h4 class="card-title mb-0 flex-grow-1">Add category</h4>
                                            </div>
                                            <div class="card-body">
                                            <span style="font-size: 1.1em; color: red;">*</span> <span style="font-size: 0.95em; color: red;">sections are mandatory to be filled up</span>
                                        <?=form_open_multipart()?>                                            
                                            <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="floatingSelectGrid" name="parent_id">
                                                            <option value="" selected>Select</option>
                                                            <?php foreach($categories as $cat){ ?>
                                                                <option value="<?=$cat->cate_id?>"> <?=$cat->cate_name?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="floatingSelectGrid">Parent Category</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="" name="cate_name" placeholder="Enter category name">
                                                        <label for="floatingFirstnameInput">Category Name<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?=form_error('cate_name');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" type="file" name="image">
                                                        <label for="floatingSelectGrid">Category image</label>
                                                        <span style="font-size: 0.85em; color: grew;">Category image must be within 115*115 pixels.</span>
                                                        <?=form_error('image');?>
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
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

    <?php $this->load->view('footer');?>