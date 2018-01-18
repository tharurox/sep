<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php $this->view('teacher/sidebar_nav'); ?>
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
                    <?php echo 'There are some errors while updating. Please check again!'; ?>
                </div>
            <?php } ?>

            <div>

                <?php
                // Change the css classes to suit your needs

                $attributes = array('class' => 'form-horizontal');
                echo form_open('teacher/edit_teacher'."/".$row->id, $attributes);
                ?>

                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Personal Details</a></li>
                        <li><a href="#profile" data-toggle="tab">Academic Details</a></li>
                    </ul>


                    <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active in" id="home">


                                <br>
                                <br>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">NIC</label>
                                    <div class="col-sm-4">
                                        <input id="NIC" type="text" name="NIC"  value="<?php if($attempt == '1'){ echo $row->nic_no;} else if($attempt == '2'){ echo set_value('NIC') ;}; ?>" class="form-control" placeholder="NIC No">
                                        <?php echo form_error('NIC'); ?>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
                                    <div class="col-sm-4">
                                        <input id="name" type="text" name="name"  value="<?php if($attempt == '1'){ echo $row->full_name;} else if($attempt == '2'){ echo set_value('name') ;}; ?>" class="form-control" placeholder="Name">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Name With Initials</label>
                                    <div class="col-sm-4">
                                        <input id="initial" type="text" name="initial"  value="<?php if($attempt == '1'){ echo $row->name_with_initials;} else if($attempt == '2'){ echo set_value('initial') ;}; ?>" class="form-control" placeholder="Name with Initial">
                                        <?php echo form_error('initial'); ?>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Birth Day</label>
                                    <div class="col-sm-4">
                                        <input id="birth" type="date" name="birth"  value="<?php if($attempt == '1'){ echo $row->dob;} else if($attempt == '2'){ echo set_value('birth') ;}; ?>" class="form-control">
                                        <?php echo form_error('birth'); ?>
                                    </div>
                                </div>


                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
                                    <div class="col-sm-4">
                                        <label class="radio-inline">
                                            <input id="male" type="radio" name="gender"  value="m" type="radio"  id="male"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->gender) == 'm') {
                                                    echo "checked";
                                                }
                                            }
                                            else if($attempt == '2'){
                                                if (set_value('gender') == 'm') {
                                                    echo "checked";
                                                }
                                            }
                                            ?>> Male
                                        </label>
                                        <label class="radio-inline">
                                            <input id="female" type="radio" name="gender"  value="f" type="radio" id="female"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->gender) == 'f') {
                                                    echo "checked";
                                                }
                                            }
                                            else if($attempt == '2'){
                                                if (set_value('gender') == 'f') {
                                                    echo "checked";
                                                }
                                            }
                                            ?>> Female
                                        </label>
                                        <br>
                                        <?php echo form_error('gender'); ?>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nationality</label>
                                    <div class="col-sm-4">
                                        <select id="Nationality" name="Nationality" class="form-control">
                                            <option value="0"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->nationality_id) == null || ($row->nationality_id) == 0) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('Nationality') == '0') {
                                                echo "selected";
                                            }
                                            ?>>Select Your Nationality</option>
                                            <option value="1"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->nationality_id) == 1) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('Nationality') == '1') {
                                                echo "selected";
                                            }
                                            ?> >Sinhala</option>
                                            <option value="2"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->nationality_id) == 2) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('Nationality') == '2') {
                                                echo "selected";
                                            }
                                            ?> >Sri Lankan Tamil</option>
                                            <option value="3"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->nationality_id) == 3) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('Nationality') == '3') {
                                                echo "selected";
                                            }
                                            ?> >Indian Tamil</option>
                                            <option value="4"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->nationality_id) == 4) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('Nationality') == '4') {
                                                echo "selected";
                                            }
                                            ?> >Muslim</option>
                                            <option value="5"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->nationality_id) == 5) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('Nationality') == '5') {
                                                echo "selected";
                                            }
                                            ?> >Other</option>

                                        </select>
                                        <?php echo form_error('Nationality'); ?>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Religion</label>
                                    <div class="col-sm-4">
                                        <select id="religion" name="religion" class="form-control">
                                            <option value="0"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->religion_id) == 0 || ($row->religion_id) == null) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('religion') == '0') {
                                                echo "selected";
                                            }
                                            ?>>Select Your Religion</option>
                                            <option value="1"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->religion_id) == 1) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('religion') == '1') {
                                                echo "selected";
                                            }
                                            ?>>Buddhism</option>
                                            <option value="2"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->religion_id) == 2) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('religion') == '2') {
                                                echo "selected";
                                            }
                                            ?>>Hinduism</option>
                                            <option value="3"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->religion_id) == 3) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('religion') == '3') {
                                                echo "selected";
                                            }
                                            ?>>Islam</option>
                                            <option value="4"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->religion_id) == 4) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('religion') == '4') {
                                                echo "selected";
                                            }
                                            ?>>Catholicism</option>
                                            <option value="5"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->religion_id) == 5) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('religion') == '5') {
                                                echo "selected";
                                            }
                                            ?>>Christianity</option>
                                            <option value="6"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->religion_id) == 6) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('religion') == '6') {
                                                echo "selected";
                                            }
                                            ?>>Other</option>
                                        </select>
                                        <?php echo form_error('religion'); ?>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Civil Status</label>
                                    <div class="col-sm-4">
                                        <select id="civilstatus" name="civilstatus" class="form-control">
                                            <option value="n"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->civil_status) == 'n') {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('civilstatus') == 'n') {
                                                echo "selected";
                                            }
                                            ?>>Select Your Status</option>
                                            <option value="s"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->civil_status) == 's') {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('civilstatus') == 's') {
                                                echo "selected";
                                            }
                                            ?>>Single</option>
                                            <option value="m"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->civil_status) == 'm') {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('civilstatus') == 'm') {
                                                echo "selected";
                                            }
                                            ?>>Married</option>
                                            <option value="w"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->civil_status) == 'w') {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('civilstatus') == 'w') {
                                                echo "selected";
                                            }
                                            ?>>Widow</option>
                                            <option value="o"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->civil_status) == 'o') {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('civilstatus') == 'o') {
                                                echo "selected";
                                            }
                                            ?>>Other</option>
                                        </select>
                                        <?php echo form_error('civilstatus'); ?>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-4">
                                        <input id="address" type="text" name="address"  value="<?php if($attempt == '1'){ echo $row->permanent_addr;} else if($attempt == '2'){ echo set_value('address') ;}; ?>" class="form-control" placeholder="Address">
                                          <?php echo form_error('address'); ?>

                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Contact Mobile</label>
                                    <div class="col-sm-4">
                                        <input id="contactMob" type="text" name="contactMob"  value="<?php if($attempt == '1'){ echo $row->contact_mobile;} else if($attempt == '2'){ echo set_value('contactMob') ;}; ?>" class="form-control" placeholder="Contact Mobile">
                                        <?php echo form_error('contactMob'); ?>
                                    </div>
                                </div>


                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-4">
                                        <input id="address1" type="text" name="address1"  value="<?php if($attempt == '1'){ echo $row->permanent_addr1;} else if($attempt == '2'){ echo set_value('address1') ;}; ?>" class="form-control" placeholder="Address 1">
                                          <?php echo form_error('address1'); ?>

                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email Address</label>
                                    <div class="col-sm-4">
                                        <input id="email" type="text" name="email"  value="<?php if($attempt == '1'){ echo $row->email;} else if($attempt == '2'){ echo set_value('email') ;}; ?>" class="form-control" placeholder="Email Address">
                                        <?php echo form_error('email'); ?>
                                    </div>

                                </div>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-4">
                                        <input id="address2" type="text" name="address2"  value="<?php if($attempt == '1'){ echo $row->permanent_addr2;} else if($attempt == '2'){ echo set_value('address2') ;}; ?>" class="form-control" placeholder="Address 2">
                                          <?php echo form_error('address2'); ?>

                                    </div>
                                  </div>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Contact Home</label>
                                    <div class="col-sm-4">
                                        <input id="contactHome" type="text" name="contactHome"  value="<?php if($attempt == '1'){ echo $row->contact_home;} else if($attempt == '2'){ echo set_value('contactHome') ;}; ?>" class="form-control" placeholder="Contact Home">
                                        <?php echo form_error('contactHome'); ?>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Widow and Orphan No</label>
                                    <div class="col-sm-4">
                                        <input id="widow" type="text" name="widow"  value="<?php if($attempt == '1'){ echo $row->wnop_no;} else if($attempt == '2'){ echo set_value('widow') ;}; ?>" class="form-control" placeholder="widow and orphan">
                                        <?php echo form_error('widow'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile">
                                <br>
                                <br>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Register No</label>
                                    <div class="col-sm-4">
                                        <input id="teacherregno" type="text" name="teacherregno"  value="<?php if($attempt == '1'){ echo $row->teacher_register_no;} else if($attempt == '2'){ echo set_value('teacherregno') ;}; ?>" class="form-control" placeholder="Teacher Register No ">
                                        <?php echo form_error('teacherregno'); ?>
                                    </div>
									  <label for="inputEmail3" class="col-sm-2 control-label">Current Position}</label>
                                    <div class="col-sm-4">
                                        <input id="serialno" type="text" name="serialno"  value="<?php if($attempt == '1'){ echo $row->serial_no;} else if($attempt == '2'){ echo set_value('serialno') ;}; ?>" class="form-control" placeholder="Serial No">
                                        <?php echo form_error('serialno'); ?>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Signature No</label>
                                    <div class="col-sm-4">
                                        <input id="signatureno" type="text" name="signatureno"  value="<?php if($attempt == '1'){ echo $row->signature_no;} else if($attempt == '2'){ echo set_value('signatureno') ;}; ?>" class="form-control" placeholder="Signature">
                                        <?php echo form_error('signatureno'); ?>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Serial No</label>
                                    <div class="col-sm-4">
                                        <input id="serialno" type="text" name="serialno"  value="<?php if($attempt == '1'){ echo $row->serial_no;} else if($attempt == '2'){ echo set_value('serialno') ;}; ?>" class="form-control" placeholder="Serial No">
                                        <?php echo form_error('serialno'); ?>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Date Joined this School</label>
                                    <div class="col-sm-4">
                                        <input id="careerdate" type="date" name="careerdate"  value="<?php if($attempt == '1'){ echo $row->joined_date;} else if($attempt == '2'){ echo set_value('careerdate') ;}; ?>" class="form-control">
                                        <?php echo form_error('careerdate'); ?>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Medium</label>
                                    <div class="col-sm-4">
                                        <select id="medium" name="medium" class="form-control">
                                            <option value="n"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->medium) == 'n') {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('medium') == 'n') {
                                                echo "selected";
                                            }
                                            ?>>Select Medium</option>
                                            <option value="s"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->medium) == 's') {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('medium') == 's') {
                                                echo "selected";
                                            }
                                            ?>>Sinhala</option>
                                            <option value="t"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->medium) == 't') {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('medium') == 't') {
                                                echo "selected";
                                            }
                                            ?>>English</option>
                                            <option value="e"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->medium) == 'e') {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('medium') == 'e') {
                                                echo "selected";
                                            }
                                            ?>>Tamil</option>
                                        </select>
                                        <?php echo form_error('medium'); ?>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Designation</label>
                                    <div class="col-sm-4">
                                        <select id="designation" name="designation" class="form-control">
                                            <option value="0"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->designation_id) == 0) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('designation') == 0) {
                                                echo "selected";
                                            }
                                            ?>>Select Designation</option>
                                            <option value="1"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->designation_id) == 1) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('designation') == 1) {
                                                echo "selected";
                                            }
                                            ?>>Principal</option>
                                            <option value="2"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->designation_id) == 2) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('designation') == 2) {
                                                echo "selected";
                                            }
                                            ?>>Acting Principal</option>
                                            <option value="3"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->designation_id) == 3) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('designation') == 3) {
                                                echo "selected";
                                            }
                                            ?>>Deputy Principal</option>
                                            <option value="4"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->designation_id) == 4) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('designation') == 4) {
                                                echo "selected";
                                            }
                                            ?>>Acting Deputy Principal</option>
                                            <option value="5"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->designation_id) == 5) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('designation') == 5) {
                                                echo "selected";
                                            }
                                            ?>>Assistant Principal</option>
                                            <option value="6"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->designation_id) == 6) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('designation') == 6) {
                                                echo "selected";
                                            }
                                            ?>>Acting Assistant Principal</option>
                                            <option value="7"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->designation_id) == 7) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('designation') == 7) {
                                                echo "selected";
                                            }
                                            ?>>Teacher</option>
                                        </select>
                                        <?php echo form_error('designation'); ?>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Section</label>
                                    <div class="col-sm-4">
                                        <select id="section" name="section" class="form-control">
                                            <option value="0"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->section) == 0) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('section') == 0) {
                                                echo "selected";
                                            }
                                            ?>>Select Section</option>
                                            <option value="1"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->section) == 1) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('section') == 1) {
                                                echo "selected";
                                            }
                                            ?>>1/5</option>
                                            <option value="2"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->section) == 2) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('section') == 2) {
                                                echo "selected";
                                            }
                                            ?>>6/7</option>
                                            <option value="3"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->section) == 3) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('section') == 3) {
                                                echo "selected";
                                            }
                                            ?>>8/9</option>
                                            <option value="4"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->section) == 4) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('section') == 4) {
                                                echo "selected";
                                            }
                                            ?>>10/11</option>
                                            <option value="5"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->section) == 5) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('section') == 5) {
                                                echo "selected";
                                            }
                                            ?>>A/L Science</option>
                                            <option value="6"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->section) == 6) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('section') == 6) {
                                                echo "selected";
                                            }
                                            ?>>A/L Commerce</option>
                                            <option value="7"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->section) == 7) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('section') == 7) {
                                                echo "selected";
                                            }
                                            ?>>A/L Arts</option>
                                        </select>
                                        <?php echo form_error('section'); ?>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Main Subject</label>
                                    <div class="col-sm-4">
                                        <select id="mainsubject" name="mainsubject" class="form-control">
                                            <option value="0"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->main_subject_id) == 0) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('mainsubject') == 0) {
                                                echo "selected";
                                            }
                                            ?>>Select Your Main Subject</option>
                                            <option value="1"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->main_subject_id) == 1) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('mainsubject') == 1) {
                                                echo "selected";
                                            }
                                            ?>>Maths</option>
                                            <option value="2"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->main_subject_id) == 2) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('mainsubject') == 2) {
                                                echo "selected";
                                            }
                                            ?>>Science</option>
                                            <option value="3"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->main_subject_id) == 3) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('mainsubject') == 3) {
                                                echo "selected";
                                            }
                                            ?>>Chemistry</option>
                                            <option value="4"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->main_subject_id) == 4) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('mainsubject') == 4) {
                                                echo "selected";
                                            }
                                            ?>>Physics</option>
                                            <option value="5"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->main_subject_id) == 5) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('mainsubject') == 5) {
                                                echo "selected";
                                            }
                                            ?>>Business Studies</option>
                                            <option value="6"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->main_subject_id) == 6) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('mainsubject') == 6) {
                                                echo "selected";
                                            }
                                            ?>>English</option>
                                            <option value="7"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->main_subject_id) == 7) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('mainsubject') == 7) {
                                                echo "selected";
                                            }
                                            ?>>History</option>
                                            <option value="8"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->main_subject_id) == 8) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('mainsubject') == 8) {
                                                echo "selected";
                                            }
                                            ?>>Information Technology</option>
                                            <option value="9"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->main_subject_id) == 9) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('mainsubject') == 9) {
                                                echo "selected";
                                            }
                                            ?>>Sinhala</option>
                                            <option value="10"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->main_subject_id) == 10) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('mainsubject') == 10) {
                                                echo "selected";
                                            }
                                            ?>>Mechanics</option>
                                            <option value="11"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->main_subject_id) == 11) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('mainsubject') == 11) {
                                                echo "selected";
                                            }
                                            ?>>Tamil</option>
                                            <option value="12"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->main_subject_id) == 12) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('mainsubject') == 12) {
                                                echo "selected";
                                            }
                                            ?>>Other</option>
                                        </select>
                                        <?php echo form_error('mainsubject'); ?>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Service Grade</label>
                                    <div class="col-sm-4">
                                        <select id="servicegrade" name="servicegrade" class="form-control">
                                            <option value="0"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 0) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 0) {
                                                echo "selected";
                                            }
                                            ?>>Select Your Grade</option>
                                            <option value="1"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 1) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 1) {
                                                echo "selected";
                                            }
                                            ?>>Sri Lanka Education Administrative ServiceI</option>
                                            <option value="2"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 2) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 2) {
                                                echo "selected";
                                            }
                                            ?>>Sri Lanka Education Administrative ServiceII</option>
                                            <option value="3"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 3) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 3) {
                                                echo "selected";
                                            }
                                            ?>>Sri Lanka Education Administrative ServiceIII</option>
                                            <option value="4"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 4) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 4) {
                                                echo "selected";
                                            }
                                            ?>>Sri Lanka Principal ServiceI</option>
                                            <option value="5"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 5) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 5) {
                                                echo "selected";
                                            }
                                            ?>>Sri Lanka Principal Service2I</option>
                                            <option value="6"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 6) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 6) {
                                                echo "selected";
                                            }
                                            ?>>Sri Lanka Principal Service2II</option>
                                            <option value="7"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 7) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 7) {
                                                echo "selected";
                                            }
                                            ?>>Sri Lanka Principal Service3</option>
                                            <option value="8"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 8) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 8) {
                                                echo "selected";
                                            }
                                            ?>>Sri Lanka Teacher ServiceI</option>
                                            <option value="9"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 9) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 9) {
                                                echo "selected";
                                            }
                                            ?>>Sri Lanka Teacher Service2I</option>
                                            <option value="10"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 10) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 10) {
                                                echo "selected";
                                            }
                                            ?>>Sri Lanka Teacher Service2II</option>
                                            <option value="11"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 11) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 11) {
                                                echo "selected";
                                            }
                                            ?>>Sri Lanka Teacher Service3I</option>
                                            <option value="12"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 12) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 12) {
                                                echo "selected";
                                            }
                                            ?>>Sri Lanka Teacher Service3II</option>
                                            <option value="13"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->grade) == 13) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('servicegrade') == 13) {
                                                echo "selected";
                                            }
                                            ?>>Sri Lanka Teacher Service Pending</option>
                                        </select>
                                        <?php echo form_error('servicegrade'); ?>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Personal File No</label>
                                    <div class="col-sm-4">
                                        <input id="personfile" type="text" name="personfile"  value="<?php if($attempt == '1'){ echo $row->personal_file_no;} else if($attempt == '2'){ echo set_value('personfile') ;}; ?>" class="form-control" placeholder="Personal File No">
                                        <?php echo form_error('personfile'); ?>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Service Period</label>
                                    <div class="col-sm-4">
                                        <input id="serviceperiod" type="text" name="serviceperiod"  value="<?php if($attempt == '1'){ echo $row->service;} else if($attempt == '2'){ echo set_value('serviceperiod') ;}; ?>" class="form-control" placeholder="Service Period">
                                        <?php echo form_error('serviceperiod'); ?>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Remarks</label>
                                    <div class="col-sm-4">
                                        <input id="remarks" type="text" name="remarks"  value="<?php if($attempt == '1'){ echo $row->remarks;} else if($attempt == '2'){ echo set_value('remarks') ;}; ?>" class="form-control" placeholder="Remarks">
                                        <?php echo form_error('remarks'); ?>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nature of Appointment</label>
                                    <div class="col-sm-4">
                                        <select id="nature" name="nature" class="form-control">
                                            <option value="0"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->nature_of_appointment) == 0) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('nature') == 0) {
                                                echo "selected";
                                            }
                                            ?>>Select Section</option>
                                            <option value="1"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->nature_of_appointment) == 1) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('nature') == 1) {
                                                echo "selected";
                                            }
                                            ?>>Degree</option>
                                            <option value="2"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->nature_of_appointment) == 2) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('nature') == 2) {
                                                echo "selected";
                                            }
                                            ?>>Diploma</option>
                                            <option value="3"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->nature_of_appointment) == 3) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('nature') == 3) {
                                                echo "selected";
                                            }
                                            ?>>Trained</option>
                                            <option value="4"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->nature_of_appointment) == 4) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('nature') == 4) {
                                                echo "selected";
                                            }
                                            ?>>Other</option>
                                        </select>
                                        <?php echo form_error('nature'); ?>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Educational Qualifications</label>
                                    <div class="col-sm-4">
                                        <textarea id="education" name="education" class="form-control"><?php if($attempt == '1'){ echo $row->educational_qualific;} else if($attempt == '2'){ echo set_value('education') ;}; ?></textarea>
                                        <?php echo form_error('education'); ?>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Professional Qualifications</label>
                                    <div class="col-sm-4">
                                        <textarea id="profession" name="profession" class="form-control"><?php if($attempt == '1'){ echo $row->professional_qualific;} else if($attempt == '2'){ echo set_value('profession') ;}; ?></textarea>
                                        <?php echo form_error('profession'); ?>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">First Appointment Date</label>
                                    <div class="col-sm-4">
                                        <input id="appointmentdate" type="date" name="appointmentdate"  value="<?php if($attempt == '1'){ echo $row->first_appointment_date;} else if($attempt == '2'){ echo set_value('appointmentdate') ;}; ?>" class="form-control">
                                        <?php echo form_error('appointmentdate'); ?>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Due pension Date</label>
                                    <div class="col-sm-4">
                                        <input id="pension" type="date" name="pension"  value="<?php if($attempt == '1'){ echo $row->pension_date;} else if($attempt == '2'){ echo set_value('pension') ;}; ?>" class="form-control">
                                        <?php echo form_error('pension'); ?>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-right:2em">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Increment Date</label>
                                    <div class="col-sm-4">
                                        <input id="increment" type="date" name="increment"  value="<?php if($attempt == '1'){ echo $row->increment_date;} else if($attempt == '2'){ echo set_value('increment') ;}; ?>" class="form-control">
                                        <?php echo form_error('increment'); ?>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Promotions</label>
                                    <div class="col-sm-4">
                                        <select id="promotions" name="promotions" class="form-control">
                                            <option value="0"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->promotions) == 0) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('promotions') == 0) {
                                                echo "selected";
                                            }
                                            ?>>Select Section</option>
                                            <option value="1"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->promotions) == 1) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('promotions') == 1) {
                                                echo "selected";
                                            }
                                            ?>>SLTS 3-11</option>
                                            <option value="2"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->promotions) == 2) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('promotions') == 2) {
                                                echo "selected";
                                            }
                                            ?>>SLEAS 111/ SLPS 2-11/ SLTS 3-1</option>
                                            <option value="3"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->promotions) == 3) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('promotions') == 3) {
                                                echo "selected";
                                            }
                                            ?>>SLEAS 11/ SLPS 2-1/ SLTS 2-11</option>
                                            <option value="4"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->promotions) == 4) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('promotions') == 4) {
                                                echo "selected";
                                            }
                                            ?>>SLEAS 1/ SLPS 1/ SLTS 2-1</option>
                                            <option value="5"
                                            <?php
                                            if($attempt == '1'){
                                                if (($row->promotions) == 5) {
                                                    echo "selected";
                                                }
                                            }
                                            else if(set_value('promotions') == 5) {
                                                echo "selected";
                                            }
                                            ?>>SLTS 1</option>
                                        </select>
                                        <?php echo form_error('promotions'); ?>
                                    </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label">Work Experience</label>
                                    <div class="col-sm-4">
                                        <textarea id="experience" name="experience" class="form-control" value="<?php echo $row->work_experience; ?>" >
                                        </textarea>
                                    </div>  
                                </div>


                            </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-raised btn-primary" value="Update">
                            <button type="reset" class="btn btn-primary">Reset</button>
                        </div>
                    </div>

                </div>

                <?php form_close(); ?>
            </div>
        </div>



    </div>
</div>
