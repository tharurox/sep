<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php $this->view('teacher/sidebar_nav'); ?>
        </div>

        <div class="col-md-9">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo 'There are some errors while inserting. Please check again!'; ?>
                </div>
            <?php } ?>
            <div class="progress" style="border: ">
                <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:5%">
                    0% Complete (success)
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <b>TEACHER REGISTRATION / Personal Details</b>
                </div>
                <div class="panel-body">
                    <?php
                    // Change the css classes to suit your needs

                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('teacher/create', $attributes);
                    ?>

                    <div class="form-group" style="margin-right:2em">
                        <label for="NIC" class="col-sm-2 control-label ">*NIC</label>
                        <div class="col-sm-4">
                            <input id="NIC" type="text" name="NIC"  value="<?php echo set_value('NIC'); ?>" type="text" class="form-control" id="NIC" placeholder="NIC No">
                            <?php echo form_error('NIC'); ?>
                        </div>
<!--                    </div>

                    <div class="form-group">-->
                        <label for="name" class="col-sm-2 control-label">*Full Name</label>
                        <div class="col-sm-4">

                            <input id="name" type="text" name="name"  value="<?php echo set_value('name'); ?>"  type="text" class="form-control" id="name" placeholder="Full Name">
                            <?php echo form_error('name'); ?>
                        </div>
                    </div>

                    <div class="form-group" style="margin-right: 2em">
                        <label for="initial" class="col-sm-2 control-label">Name With Initials</label>
                        <div class="col-sm-4">

                            <input id="initial" type="text" name="initial"  value="<?php echo set_value('initial'); ?>"  type="text" class="form-control" id="initial" placeholder="Name with Initial">
                            <?php echo form_error('initial'); ?>
                        </div>
<!--                    </div>

                    <div class="form-group">-->
                        <label for="birth" class="col-sm-2 control-label">*Birth Day</label>
                        <div class="col-sm-4">

                            <input id="birth" type="date" name="birth"  value="<?php echo set_value('birth'); ?>" type="text" class="form-control" id="birth" placeholder="Birth Day">
                            <?php echo form_error('birth'); ?>
                        </div>
                    </div>


                    <div class="form-group" style="margin-right: 2em">
                        <label for="inputEmail3" class="col-sm-2 control-label">*Gender</label>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input id="male" type="radio" name="gender"  value="m" <?php if (set_value('gender') == 'm') { echo "checked"; } ?>> Male
                            </label>
                            <label class="radio-inline">
                                <input id="female" type="radio" name="gender" value="f" <?php if (set_value('gender') == 'f') { echo "checked"; } ?>> Female
                            </label>
                            <br>
                            <?php echo form_error('gender'); ?>
                        </div>

<!--                    </div>

                    <div class="form-group">-->
                        <label for="Nationality" class="col-sm-2 control-label">*Nationality</label>
                        <div class="col-sm-4">

                            <select id="Nationality" name="Nationality" class="form-control">
                                <option value="0" <?php if (set_value('Nationality') == '0') { echo "selected"; } ?>>Select Your Nationality</option>
                                <option value="1" <?php if (set_value('Nationality') == '1') { echo "selected"; } ?>>Sinhala</option>
                                <option value="2" <?php if (set_value('Nationality') == '2') { echo "selected"; } ?>>Sri Lankan Tamil</option>
                                <option value="3" <?php if (set_value('Nationality') == '3') { echo "selected"; } ?>>Indian Tamil</option>
                                <option value="4" <?php if (set_value('Nationality') == '4') { echo "selected"; } ?>>Muslim</option>
                                <option value="5" <?php if (set_value('Nationality') == '5') { echo "selected"; } ?>>Other</option>
                            </select>
                            <?php echo form_error('Nationality'); ?>
                        </div>
                    </div>

                    <div class="form-group" style="margin-right: 2em">
                        <label for="religion" class="col-sm-2 control-label">*Religion</label>
                        <div class="col-sm-4">

                            <select id="religion" name="religion" class="form-control">
                                <option value="0">Select Your Religion</option>
                                <option value="1" <?php if (set_value('religion') == '1') { echo "selected"; } ?>>Buddhism</option>
                                <option value="2" <?php if (set_value('religion') == '2') { echo "selected"; } ?>>Hinduism</option>
                                <option value="3" <?php if (set_value('religion') == '3') { echo "selected"; } ?>>Islam</option>
                                <option value="4" <?php if (set_value('religion') == '4') { echo "selected"; } ?>>Catholicism</option>
                                <option value="5" <?php if (set_value('religion') == '5') { echo "selected"; } ?>>Christianity</option>
                                <option value="6" <?php if (set_value('religion') == '6') { echo "selected"; } ?>>Other</option>
                            </select>
                            <?php echo form_error('religion'); ?>
                        </div>
<!--                    </div>

                    <div class="form-group">-->
                        <label for="civilstatus" class="col-sm-2 control-label">*Civil Status</label>
                        <div class="col-sm-4">

                            <select id="civilstatus" name="civilstatus" class="form-control">
                                <option value="n" <?php if (set_value('civilstatus') == 'n') { echo "selected"; } ?>>Select Your Status</option>
                                <option value="s" <?php if (set_value('civilstatus') == 's') { echo "selected"; } ?>>Single</option>
                                <option value="m" <?php if (set_value('civilstatus') == 'm') { echo "selected"; } ?>>Married</option>
                                <option value="w" <?php if (set_value('civilstatus') == 'w') { echo "selected"; } ?>>Widow</option>
                                <option value="o" <?php if (set_value('civilstatus') == '0') { echo "selected"; } ?>>Other</option>
                            </select>
                            <?php echo form_error('civilstatus'); ?>
                        </div>
                    </div>

                    <div class="form-group" style="margin-right: 2em">
                        <label for="address" class="col-sm-2 control-label">*Address</label>
                        <div class="col-sm-4">

                            <input id="address" type="text" name="address"  value="<?php echo set_value('address'); ?>" type="text" class="form-control" id="address" placeholder="Address 1">
                            <?php echo form_error('address'); ?>
                        </div>


<!--                    </div>

                    <div class="form-group">-->
                        <label for="contactMob" class="col-sm-2 control-label">*Contact Mob</label>
                        <div class="col-sm-4">

                            <input id="contactMob" type="text" name="contactMob"  value="<?php echo set_value('contactMob'); ?>" type="text" class="form-control" id="contactMob" placeholder="Contact Mobile">
                            <?php echo form_error('contactMob'); ?>
                        </div>
                    </div>



                    <div class="form-group" style="margin-right: 2em">

                     <label for="inputEmail3" class="col-sm-2 control-label"></label>
                      <div class="col-sm-4">

                          <input id="address1" type="text" name="address1"  value="<?php echo set_value('address1'); ?>" type="text" class="form-control" id="address1" placeholder="Address 2">
                          <?php echo form_error('address1'); ?>
                      </div>

                        <label for="inputEmail3" class="col-sm-2 control-label">Contact Home</label>
                        <div class="col-sm-4">

                            <input id="contactHome" type="text" name="contactHome"  value="<?php echo set_value('contactHome'); ?>" type="text" class="form-control" id="contactHome" placeholder="Contact Home">
                            <?php echo form_error('contactHome'); ?>
                        </div>
                      </div>

                    <div class="form-group" style="margin-right: 2em">


                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-4">

                        <input id="address2" type="text" name="address2"  value="<?php echo set_value('address2'); ?>" type="text" class="form-control" id="address2" placeholder="Address 2">
                        <?php echo form_error('address2'); ?>
                    </div>

                        <label for="emaile" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">

                            <input id="email" type="text" name="email"  value="<?php echo set_value('email'); ?>" type="text" class="form-control" id="emaile" placeholder="Email Address">
                            <?php echo form_error('email'); ?>
                        </div>
                    </div>

                    <div class="form-group" style="margin-right: 2em">
                        <label for="widow" class="col-sm-2 control-label">Widow & Orphan No</label>
                        <div class="col-sm-4">

                            <input id="widow" type="text" name="widow"  value="<?php echo set_value('widow'); ?>" type="text" class="form-control" id="widow" placeholder="widow and orphan">
                            <?php echo form_error('widow'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-raised btn-raised btn-primary" value="Next">
                            <button type="reset" class="btn btn-raised btn-raised btn-primary">Reset</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
