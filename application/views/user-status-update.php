<!doctype html>
<html lang="en">
<head>       
    <meta charset="utf-8" />
    <title>Dashboard of Shopclusive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" /> 
    <base href="<?=base_url()?>">
    <?php $this->load->view('links'); ?>
</head>
<body>
    <?php $this->load->view('header'); ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success">
                        <?=$this->session->flashdata('success')?>
                    </div>
                <?php } elseif($this->session->flashdata('error')){ ?>
                    <div class="alert alert-danger">
                        <?=$this->session->flashdata('error')?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0 align-items-center d-flex pb-0">
                                <h4 class="card-title mb-0 flex-grow-1">Modify user status</h4>
                            </div>
                            <div class="card-body">
                                <span style="font-size: 1.1em; color: red;">*</span> <span style="font-size: 0.95em; color: red;">sections are mandatory to be filled up</span>
                                <?= form_open('home/update_user_status') ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelectGrid" name="user_id" required>
                <option value="" selected>Select User</option>
                <?php foreach ($users as $user) { ?>
                    <option value="<?= $user->user_id ?>"><?= ellipsize($user->username, 30) ?> - <?= $user->user_id ?></option>
                <?php } ?>
            </select>
            <label for="floatingSelectGrid">User</label>
            <?= form_error('user_id'); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelectGrid" name="status" required>
                <option value="" selected>Select Status</option>
                <option value="1">Active</option>
                <option value="0">Deactive</option>
            </select>
            <label for="floatingSelectGrid">Status<span style="font-size: 1.1em; color: red;">*</span></label>
            <?= form_error('status'); ?>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary w-md">Update Status</button>
    </div>
</div>
<?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>
</body>
</html>