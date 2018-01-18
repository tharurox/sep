

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
                <div class="progress-bar progress-bar-striped progress-bar-striped" role="progressbar"
                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                    50% Complete (success)
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <b>TEACHER REGISTRATION / Personal Details > Academic Details</b>
                </div>
                <div class="panel-body">
                    <?php
                    // Change the css classes to suit your needs

                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('teacher/update_details_inTemp'."/".$user_id, $attributes);
                    ?>

                        <div class="form-group" style="margin-right:2em">
                            <label for="inputEmail3" class="col-sm-2 control-label">*Register No</label>
                            <div class="col-sm-4">
                                <input id="regno" type="text" name="regno"  value="<?php echo set_value('regno'); ?>"class="form-control" placeholder="Reg No">
                                <?php echo form_error('regno'); ?>
                            </div>
                        </div>

                        <div class="form-group" style="margin-right:2em">
                            <label for="inputEmail3" class="col-sm-2 control-label">*Signature No</label>
                            <div class="col-sm-4">
                                <input id="signatureno" type="text" name="signatureno"  value="<?php echo set_value('signatureno'); ?>"  type="text" class="form-control" id="signatureno" placeholder="Signature">
                                <?php echo form_error('signatureno'); ?>
                            </div>
<!--                        </div>

                        <div class="form-group">-->
                            <label for="inputEmail3" class="col-sm-2 control-label">*Serial No</label>
                            <div class="col-sm-4">
                                <input id="serialno" type="text" name="serialno"  value="<?php echo set_value('serialno'); ?>" type="text" class="form-control" id="serialno" placeholder="Serial No">
                                <?php echo form_error('serialno'); ?>
                            </div>
                        </div>

                        <div class="form-group" style="margin-right:2em">
                            <label for="inputEmail3" class="col-sm-2 control-label">*Date Joined School</label>
                            <div class="col-sm-4">
                                <input id="careerdate" type="date" name="careerdate"  value="<?php echo set_value('careerdate'); ?>" type="text" class="form-control" id="careerdate" placeholder="Start Date">
                            <?php echo form_error('careerdate'); ?>
                            </div>
<!--                        </div>


                        <div class="form-group">-->
                            <label for="inputEmail3" class="col-sm-2 control-label">Medium</label>
                            <div class="col-sm-4">
                                <select id="medium" name="medium" class="form-control">
                                    <option value="n" <?php if (set_value('medium') == 'n') { echo "selected"; } ?>>Select Medium</option>
                                    <option value="s" <?php if (set_value('medium') == 's') { echo "selected"; } ?>>Sinhala</option>
                                    <option value="e" <?php if (set_value('medium') == 'e') { echo "selected"; } ?>>English</option>
                                    <option value="t" <?php if (set_value('medium') == 't') { echo "selected"; } ?>>Tamil</option>
                                </select>
                                <?php echo form_error('medium'); ?>
                            </div>
                        </div>

                        <div class="form-group" style="margin-right:2em">
                            <label for="inputEmail3" class="col-sm-2 control-label">Designation</label>
                            <div class="col-sm-4">
                                <select id="designation" name="designation" class="form-control">
                                    <option value="0">Select Designation</option>
                                    <option value="1" <?php if (set_value('designation') == '1') { echo "selected"; } ?>>Principal</option>
                                    <option value="2" <?php if (set_value('designation') == '2') { echo "selected"; } ?>>Acting Principal</option>
                                    <option value="3" <?php if (set_value('designation') == '3') { echo "selected"; } ?>>Deputy Principal</option>
                                    <option value="4" <?php if (set_value('designation') == '4') { echo "selected"; } ?>>Acting Deputy Principal</option>
                                    <option value="5" <?php if (set_value('designation') == '5') { echo "selected"; } ?>>Assistant Principal</option>
                                    <option value="6" <?php if (set_value('designation') == '6') { echo "selected"; } ?>>Acting Assistant Principal</option>
                                    <option value="7" <?php if (set_value('designation') == '7') { echo "selected"; } ?>>Teacher</option>
                                </select>
                                <?php echo form_error('designation'); ?>
                            </div>
<!--                        </div>

                        <div class="form-group">-->
                            <label for="inputEmail3" class="col-sm-2 control-label">Section</label>
                            <div class="col-sm-4">
                                <select id="section" name="section" class="form-control">
                                    <option value="0">Select Section</option>
                                    <option value="1" <?php if (set_value('section') == '1') { echo "selected"; } ?>>1/5</option>
                                    <option value="2" <?php if (set_value('section') == '2') { echo "selected"; } ?>>6/7</option>
                                    <option value="3" <?php if (set_value('section') == '3') { echo "selected"; } ?>>8/9</option>
                                    <option value="4" <?php if (set_value('section') == '4') { echo "selected"; } ?>>10/11</option>
                                    <option value="5" <?php if (set_value('section') == '5') { echo "selected"; } ?>>A/L Science</option>
                                    <option value="6" <?php if (set_value('section') == '6') { echo "selected"; } ?>>A/L Commerce</option>
                                    <option value="7" <?php if (set_value('section') == '7') { echo "selected"; } ?>>A/L Arts</option>
                                </select>
                                <?php echo form_error('section'); ?>
                            </div>
                        </div>

                        <div class="form-group" style="margin-right:2em">
                            <label for="inputEmail3" class="col-sm-2 control-label">Main Subject</label>
                            <div class="col-sm-4">
                                <select id="mainsubject" name="mainsubject" class="form-control">
                                    <option value="0" <?php if (set_value('mainsubject') == '0') { echo "selected"; } ?>>Select Your Main Subject</option>
                                    <option value="1" <?php if (set_value('mainsubject') == '1') { echo "selected"; } ?>>Maths</option>
                                    <option value="2" <?php if (set_value('mainsubject') == '2') { echo "selected"; } ?>>Science</option>
                                    <option value="3" <?php if (set_value('mainsubject') == '3') { echo "selected"; } ?>>Chemistry</option>
                                    <option value="4" <?php if (set_value('mainsubject') == '4') { echo "selected"; } ?>>Physics</option>
                                    <option value="5" <?php if (set_value('mainsubject') == '5') { echo "selected"; } ?>>Business Studies</option>
                                    <option value="6" <?php if (set_value('mainsubject') == '6') { echo "selected"; } ?>>English</option>
                                    <option value="7" <?php if (set_value('mainsubject') == '7') { echo "selected"; } ?>>History</option>
                                    <option value="8" <?php if (set_value('mainsubject') == '8') { echo "selected"; } ?>>Information Technology</option>
                                    <option value="9" <?php if (set_value('mainsubject') == '9') { echo "selected"; } ?>>Sinhala</option>
                                    <option value="10" <?php if (set_value('mainsubject') == '10') { echo "selected"; } ?>>Mechanics</option>
                                    <option value="11" <?php if (set_value('mainsubject') == '11') { echo "selected"; } ?>>Tamil</option>
                                    <option value="12" <?php if (set_value('mainsubject') == '12') { echo "selected"; } ?>>Other</option>
                                </select>
                                <?php echo form_error('mainsubject'); ?>
                            </div>
<!--                        </div>


                        <div class="form-group">-->
                            <label for="inputEmail3" class="col-sm-2 control-label">*Service Grade</label>
                            <div class="col-sm-4">
                                <select id="servicegrade" name="servicegrade" class="form-control">
                                    <option value="0" <?php if (set_value('servicegrade') == '0') { echo "selected"; } ?>>Select Your Grade</option>
                                    <option value="1" <?php if (set_value('servicegrade') == '1') { echo "selected"; } ?>>Sri Lanka Education Administrative ServiceI</option>
                                    <option value="2" <?php if (set_value('servicegrade') == '2') { echo "selected"; } ?>>Sri Lanka Education Administrative ServiceII</option>
                                    <option value="3" <?php if (set_value('servicegrade') == '3') { echo "selected"; } ?>>Sri Lanka Education Administrative ServiceIII</option>
                                    <option value="4" <?php if (set_value('servicegrade') == '4') { echo "selected"; } ?>>Sri Lanka Principal ServiceI</option>
                                    <option value="5" <?php if (set_value('servicegrade') == '5') { echo "selected"; } ?>>Sri Lanka Principal Service2I</option>
                                    <option value="6" <?php if (set_value('servicegrade') == '6') { echo "selected"; } ?>>Sri Lanka Principal Service2II</option>
                                    <option value="7" <?php if (set_value('servicegrade') == '7') { echo "selected"; } ?>>Sri Lanka Principal Service3</option>
                                    <option value="8" <?php if (set_value('servicegrade') == '8') { echo "selected"; } ?>>Sri Lanka Teacher ServiceI</option>
                                    <option value="9" <?php if (set_value('servicegrade') == '9') { echo "selected"; } ?>>Sri Lanka Teacher Service2I</option>
                                    <option value="10" <?php if (set_value('servicegrade') == '10') { echo "selected"; } ?>>Sri Lanka Teacher Service2II</option>
                                    <option value="11" <?php if (set_value('servicegrade') == '11') { echo "selected"; } ?>>Sri Lanka Teacher Service3I</option>
                                    <option value="12" <?php if (set_value('servicegrade') == '12') { echo "selected"; } ?>>Sri Lanka Teacher Service3II</option>
                                    <option value="13" <?php if (set_value('servicegrade') == '13') { echo "selected"; } ?>>Sri Lanka Teacher Service Pending</option>
                                </select>
                                <?php echo form_error('servicegrade'); ?>
                            </div>
                        </div>

                        <div class="form-group" style="margin-right:2em">
                            <label for="inputEmail3" class="col-sm-2 control-label">*Nature of Appointment</label>
                            <div class="col-sm-4">
                                <select id="appointment" name="appointment" class="form-control">
                                    <option value="0">Select Appointment Nature</option>
                                    <option value="1" <?php if (set_value('appointment') == '1') { echo "selected"; } ?>>Degree</option>
                                    <option value="2" <?php if (set_value('appointment') == '2') { echo "selected"; } ?>>Diploma</option>
                                    <option value="3" <?php if (set_value('appointment') == '3') { echo "selected"; } ?>>Trained</option>
                                    <option value="4" <?php if (set_value('appointment') == '4') { echo "selected"; } ?>>Other</option>
                                </select>
                                <?php echo form_error('appointment'); ?>
                            </div>
<!--                        </div>

                        <div class="form-group">-->
                            <label for="inputEmail3" class="col-sm-2 control-label">Educational Qualification</label>
                            <div class="col-sm-4">
                                <textarea id="educational" name="educational" class="form-control" placeholder="Educational Qualifications"><?php echo set_value('educational'); ?></textarea>
                                <?php echo form_error('educational'); ?>
                            </div>
                        </div>

                        <div class="form-group" style="margin-right:2em">
                            <label for="inputEmail3" class="col-sm-2 control-label">Professional Qualification</label>
                            <div class="col-sm-4">
                                <textarea id="profession" name="profession" class="form-control" placeholder="Professional Qualifications"><?php echo set_value('profession'); ?></textarea>
                                <?php echo form_error('profession'); ?>
                            </div>

                            <label for="inputEmail3" class="col-sm-2 control-label">*First Appointment</label>
                            <div class="col-sm-4">
                                <input type="date" id="first_appointment" name="first_appointment" class="form-control" value="<?php echo set_value('first_appointment'); ?>"/>
                                <?php echo form_error('first_appointment'); ?>
                            </div>
                        </div>

                        <div class="form-group" style="margin-right:2em">
                            <label for="inputEmail3" class="col-sm-2 control-label">Personal File No</label>
                            <div class="col-sm-4">
                                <input type="text" id="fileno" name="fileno" class="form-control" value="<?php echo set_value('fileno'); ?>" placeholder="File No"/>
                                <?php echo form_error('fileno'); ?>
                            </div>

                            <label for="inputEmail3" class="col-sm-2 control-label">Due Pension Date</label>
                            <div class="col-sm-4">
                                <input type="date" id="pension" name="pension" class="form-control" value="<?php echo set_value('pension'); ?>" />
                                <?php echo form_error('pension'); ?>
                            </div>
                                <label for="inputEmail3" class="col-sm-2 control-label">Previous Teaching Experience</label>
                            <div class="col-sm-4">
                                <textarea id="experience" name="experience" class="form-control" value="<?php echo set_value('fileno'); ?>" placeholder="Work Experience" size=24/>  </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-raised btn-primary" >Register</button>
                                <!-- <button type="skip" class="btn btn-default" > Skip Now</button> -->
                                <button type="reset" class="btn btn-raised btn-primary">Reset</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
