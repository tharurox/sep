<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php $this->view('student/sidebar_nav_s'); ?>
        </div>

        <div class="col-md-9">

            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <?php if (isset($err_message)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $err_message; ?>
                </div>
            <?php } ?>

            <div class="panel panel-info">
                <div class="panel-heading">
                    Change Password
                </div>
                <div class="panel-body">
                    <?php
                    // Change the css classes to suit your needs

                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('student/change_password', $attributes);
                    ?>

                    <div class="panel-body">
                        <div class="row">


                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information" >
                                    <tbody>



                                        <tr>
                                            <td><div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Old Password</label>
                                                    <div class="col-sm-5">
                                                        <input id="password" type="password" name="oldpassword"  value="<?php echo set_value('oldpassword'); ?>"  type="password" class="form-control" id="oldpassword" placeholder="Old Password">

                                                    </div>
                                                    <?php echo form_error('oldpassword'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                                                    <div class="col-sm-5">
                                                        <input id="password" type="password" name="password"    type="password" class="form-control" id="oldpassword" placeholder="Password">

                                                    </div>
                                                    <?php echo form_error('password'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
                                                    <div class="col-sm-5">
                                                        <input id="confirm_password" type="password" name="confirm_password"    type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">

                                                    </div>
                                                    <?php echo form_error('confirm_password'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-raised btn-sucess">Submit</button>
                                                        <button type="reset" class="btn btn-raised btn-sucess">Reset</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

</div>
