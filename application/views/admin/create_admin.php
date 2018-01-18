<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('admin/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <?php if ($succ_message) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <div class="panel panel-info ">
                <div class="panel-heading">Create Admin Account</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <?php
                        $error_prefix = "<p class=\"help-block error\">";
                        $error_suffix = "</p>";
                        $form_attr = array('class' => 'form-horizontal'); // form attributes
                        ?>
                        <?php echo form_open('admin/create', $form_attr); ?>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username'); ?>" placeholder="Username">
                                <?php echo form_error('username', $error_prefix, $error_suffix); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" id="username" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="Email Address">
                                <?php echo form_error('email', $error_prefix, $error_suffix); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="first_name" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo set_value('first_name'); ?>" placeholder="First Name">
                                <?php echo form_error('first_name', $error_prefix, $error_suffix); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo set_value('last_name'); ?>" placeholder="Last Name">
                                <?php echo form_error('last_name', $error_prefix, $error_suffix); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" id="password" class="form-control" value="" placeholder="Password">
                                <?php echo form_error('password', $error_prefix, $error_suffix); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="conf_password" class="col-sm-2 control-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="conf_password" id="conf_password" class="form-control" value="" placeholder="Confirm Password">
                                <?php echo form_error('conf_password', $error_prefix, $error_suffix); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <input type="submit" class="btn btn-raised btn-primary" value=" Submit ">
                                <input type="reset" class="btn btn-raised btn-primary" value=" Reset ">
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
