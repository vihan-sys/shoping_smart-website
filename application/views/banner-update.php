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
                                                <h4 class="card-title mb-0 flex-grow-1">Update banner</h4>
                                            </div>
                                            <div class="card-body">
                                            <span style="font-size: 1.1em; color: red;">*</span> <span style="font-size: 0.95em; color: red;">sections are mandatory to be filled up</span>
                                        <?=form_open_multipart('home/banner_update')?>                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="bann_id" name="bann_id" onchange="fetchBannerDetails(this.value)">
                                                            <option value="" selected>Select</option>
                                                            <?php foreach ($banner_ids as $banner) { ?>
                                                                <option value="<?= $banner->bann_id ?>"><?= $banner->bann_id ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="bann_id">Banner id<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?= form_error('bann_id'); ?>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="file" class="form-control" id="bann_image" name="bann_image" placeholder="Enter category name">
                                                        <label for="floatingFirstnameInput">Banner image<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <span style="font-size: 0.85em; color: grew;">Banner image must be within 450*450 pixels.</span>
                                                        <br><?=form_error('bann_image');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="headline" name="headline" placeholder="Product brand">
                                                        <label for="floatingFirstnameInput">Headline<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?=form_error('headline');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="tagline" name="tagline" placeholder="Product brand">
                                                        <label for="floatingFirstnameInput">Tagline<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?=form_error('tagline');?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="" name="status">
                                                            <option value="" selected>Select</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Deactive</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Status<span style="font-size: 1.1em; color: red;">*</span></label>
                                                        <?=form_error('status');?>
                                                    </div>
                                                </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Update Banner</button>
                                            </div>
                                        <?=form_close()?>
                                        <script>
    function fetchBannerDetails(bann_id) {
        if (bann_id) {
            $.ajax({
                url: '<?= base_url("home/get_banner_details/") ?>' + bann_id,
                type: 'GET',
                success: function(response) {
                    var data = JSON.parse(response);
                    $('#headline').val(data.headline);
                    $('#tagline').val(data.tagline);
                    $('#status').val(data.status);
                }
            });
        }
    }

    // Ensure CKEditor instances are updated when returning to the page
    $(document).ready(function() {
        var bann_id = $('#bann_id').val(); 
        if (bann_id) {
            fetchBannerDetails(bann_id);
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