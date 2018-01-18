<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php $this->view('teacher/sidebar_nav'); ?>
        </div>

        <div class="col-md-9">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>

            <div class="panel panel-info">
                <div class="panel-heading">
                    Create New Teacher
                </div>
                <div class="panel-body">
                    <?php
                    // Change the css classes to suit your needs

                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('teacher/create_log_details', $attributes);
                    ?>
                    <h2 style="margin-left:50px">
                        Your Profile
                    </h2>
                    <br/>
                    <h4>Your Basic Details</h4>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Your ID</label>
                        <div class="col-sm-5">
                            <?php echo form_error('ID'); ?>
                            <input id="ID" type="text" name="ID"  value="<?php echo $user_id->id; ?>" type="text" class="form-control" id="ID" placeholder="Your ID" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">NIC</label>
                        <div class="col-sm-5">
                            <?php echo form_error('NIC'); ?>
                            <input id="NIC" type="text" name="NIC"  value="<?php echo $user_id->nic_no; ?>" type="text" class="form-control" id="NIC" placeholder="NIC No" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
                        <div class="col-sm-5">
                            <?php echo form_error('name'); ?>
                            <input id="name" type="text" name="name"  value="<?php echo $user_id->full_name; ?>"  type="text" class="form-control" id="name" placeholder="Fulll Name" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name with Initials</label>
                        <div class="col-sm-5">
                            <?php echo form_error('initials'); ?>
                            <input id="initials" type="text" name="initials"  value="<?php echo $user_id->name_with_initials; ?>"  type="text" class="form-control" id="initials" placeholder="Name with Initials" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Birth Day</label>
                        <div class="col-sm-5">
                            <?php echo form_error('birth'); ?>
                            <input id="birth" type="text" name="birth"  value="<?php echo $user_id->dob; ?>" type="text" class="form-control" id="birth" placeholder="Birth Day" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-5">
                            <?php echo form_error('gender'); ?>
                            <input id="gender" type="text" name="gender"  value="<?php echo $user_id->gender; ?>" type="text" class="form-control" id="gender" placeholder="Gender" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nationality</label>
                        <div class="col-sm-5">
                            <?php echo form_error('Nationality'); ?>
                            <input id="Nationality" type="text" name="Nationality"  value="<?php echo $user_id->nationality_id; ?>" type="text" class="form-control" id="Nationality" placeholder="Nationality" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Religion</label>
                        <div class="col-sm-5">
                            <?php echo form_error('religion'); ?>
                            <input id="religion" type="text" name="religion"  value="<?php echo $user_id->religion_id; ?>" type="text" class="form-control" id="religion" placeholder="Religion" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Civil Status</label>
                        <div class="col-sm-5">
                            <?php echo form_error('civilstatus'); ?>
                            <input id="civilstatus" type="text" name="civilstatus"  value="<?php echo $user_id->civil_status; ?>" type="text" class="form-control" id="civilstatus" placeholder="Civil Status" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-5">
                            <?php echo form_error('address'); ?>
                            <input id="address" type="text" name="address"  value="<?php echo $user_id->permanent_addr; ?>" type="text" class="form-control" id="address" placeholder="Address" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Contact Mobile</label>
                        <div class="col-sm-5">
                            <?php echo form_error('contactMob'); ?>
                            <input id="contactMob" type="text" name="contactMob"  value="<?php echo $user_id->contact_mobile; ?>" type="text" class="form-control" id="contactMob" placeholder="Contact Mobile" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Contact Home</label>
                        <div class="col-sm-5">
                            <?php echo form_error('contactHome'); ?>
                            <input id="contactHome" type="text" name="contactHome"  value="<?php echo $user_id->contact_home; ?>" type="text" class="form-control" id="contactHome" placeholder="Contact Home" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-5">
                            <?php echo form_error('Email'); ?>
                            <input id="Email" type="text" name="Email"  value="<?php echo $user_id->email; ?>" type="text" class="form-control" id="Email" placeholder="Email" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Widow and Orphan No</label>
                        <div class="col-sm-5">
                            <?php echo form_error('widow'); ?>
                            <input id="widow" type="text" name="widow"  value="<?php echo $user_id->wnop_no; ?>" type="text" class="form-control" id="widow" placeholder="Widow and Orphan No" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <h4>Your Academic Details</h4>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Serial No</label>
                        <div class="col-sm-5">
                            <?php echo form_error('serialno'); ?>
                            <input id="serialno" type="text" name="serialno"  value="<?php echo $user_id->serial_no; ?>" type="text" class="form-control" id="serialno" placeholder="Serial No" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Signature No</label>
                        <div class="col-sm-5">
                            <?php echo form_error('signatureno'); ?>
                            <input id="signatureno" type="text" name="signatureno"  value="<?php echo $user_id->signature_no; ?>"  type="text" class="form-control" id="signatureno" placeholder="Signature" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Date Joined this School</label>
                        <div class="col-sm-5">
                            <?php echo form_error('careerdate'); ?>
                            <input id="careerdate" type="text" name="careerdate"  value="<?php echo $user_id->first_appointment_date; ?>" type="text" class="form-control" id="careerdate" placeholder="Start Date" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Medium</label>
                        <div class="col-sm-5">
                            <?php echo form_error('medium'); ?>
                            <input id="medium" type="text" name="medium"  value="<?php echo $user_id->medium; ?>" type="text" class="form-control" id="medium" placeholder="Medium" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Designation</label>
                        <div class="col-sm-5">
                            <?php echo form_error('designation'); ?>
                            <input id="designation" type="text" name="designation"  value="<?php echo $user_id->designation_id; ?>" type="text" class="form-control" id="designation" placeholder="Designation" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Section</label>
                        <div class="col-sm-5">
                            <?php echo form_error('section'); ?>
                            <input id="section" type="text" name="section"  value="<?php echo $user_id->section; ?>" type="text" class="form-control" id="section" placeholder="Section" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Main Subject</label>
                        <div class="col-sm-5">
                            <?php echo form_error('mainsubject'); ?>
                            <input id="mainsubject" type="text" name="mainsubject"  value="<?php echo $user_id->main_subject_id; ?>" type="text" class="form-control" id="mainsubject" placeholder="Main Subject" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Service Grade</label>
                        <div class="col-sm-5">
                            <?php echo form_error('servicegrade'); ?>
                            <input id="servicegrade" type="text" name="servicegrade"  value="<?php echo $user_id->grade; ?>" type="text" class="form-control" id="servicegrade" placeholder="Service Grade" disabled style="background-color:transparent; color:red">
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
