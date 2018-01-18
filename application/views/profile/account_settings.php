<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('profile/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">Change password</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <?php echo form_open('profile/change_password'); ?>
                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input type="password" name="old_password" id="old_password" class="form-control" value="">
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" value="">
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label for="conf_password">Confirm New Password</label>
                            <input type="password" name="conf_password" id="conf_password" class="form-control" value="">
                            <p class="help-block"></p>
                        </div>
                        <input type="submit" class="btn btn-raised btn-success" value=" Submit ">
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
