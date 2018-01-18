
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php if ($user_type == 'A') {
                        $this->view('teacher/sidebar_nav');
                    }
                    else if($user_type == 'T'){
                        $this->view('teacher/sidebar_nav_teacher');
                    }
            ?>
        </div>
        <div class="col-md-9">
<?php if ($progress == 1) { ?>
                <div class="progress" style="border: ">
                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                         aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                        100% Complete (success)
                    </div>
                </div>
<?php } ?>
            <div class="panel panel-info">

                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Personal Details</a></li>
                        <li><a href="#profile" data-toggle="tab">Academic Details</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active in" id="home">
                            <!--                                    <div class="panel-heading">
                                                                    <h3 class="panel-title"><?php echo $user_id->full_name; ?></h3>
                                                                </div>-->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 " align="center"> <img src="<?php echo $propic; ?>" id="profile-img" class="img-thumbnail profile-img"> </div>

                                    <div class=" col-md-9 col-lg-9 ">
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr>
                                                    <td><label>NIC</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->nic_no; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Full Name</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->full_name; ?></label></td>
                                                </tr>

                                                <tr>
                                                <tr>
                                                    <td><label>Name with Initials</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->name_with_initials; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Birth Day</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->dob; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Gender</label></td>
                                                    <td><label class="news-item-title">
                                                            <?php
                                                            $val = $user_id->gender;
                                                            if ($val == 'm') {
                                                                echo "Male";
                                                            } else {
                                                                echo "Female";
                                                            }
                                                            ?>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Nationality</label></td>
                                                    <td><label class="news-item-title">
                                                            <?php
                                                            $nation = $user_id->nationality_id;
                                                            if ($nation == 1) {
                                                                echo "Sinhala";
                                                            } else if ($nation == 2) {
                                                                echo "Sri Lankan Tamil";
                                                            } else if ($nation == 3) {
                                                                echo "Indian Tamil";
                                                            } else if ($nation == 4) {
                                                                echo "Muslim";
                                                            } else {
                                                                echo "Other";
                                                            }
                                                            ?>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Religion</label></td>
                                                    <td><label class="news-item-title">
                                                            <?php
                                                            $rel = $user_id->religion_id;
                                                            if ($rel == 1) {
                                                                echo "Buddhism";
                                                            } else if ($rel == 2) {
                                                                echo "Hindunism";
                                                            } else if ($rel == 3) {
                                                                echo "Islam";
                                                            } else if ($rel == 4) {
                                                                echo "Catholicism";
                                                            } else if ($rel == 5) {
                                                                echo "Christianity";
                                                            } else {
                                                                echo "Other";
                                                            }
                                                            ?>
                                                        </label></td>
                                                </tr>


                                                <tr>
                                                    <td><label>Civil Status</label></td>
                                                    <td><label class="news-item-title">
                                                            <?php
                                                            $status = $user_id->civil_status;
                                                            if ($status == 's') {
                                                                echo "Single";
                                                            } else if ($status == 'm') {
                                                                echo "Married";
                                                            } else if ($status == 'w') {
                                                                echo "Widow";
                                                            } else {
                                                                echo "Other";
                                                            }
                                                            ?>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Address</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->permanent_addr; ?>,</label>
                                                         <label class="news-item-title"><?php echo $user_id->permanent_addr1; ?>
                                                           <label class="news-item-title"><?php echo $user_id->permanent_addr2; ?></label></td>
                                                </tr>


                                                <tr>
                                                    <td><label>Contact Mobile</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->contact_mobile; ?></label></td>
                                                </tr>

                                                <tr>
                                                    <td><label>Contact Home</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->contact_home; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Email</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->email; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Widow and Orphan</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->wnop_no; ?></label></td>
                                                </tr>


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <!--                                        <div class="panel-footer">
                                                                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                                                                        <span class="pull-right">
                                                                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                                                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                                                        </span>
                                                                    </div>-->





                        </div>
                      <!--  <div class="tab-pane fade" id="profile"> -->
                          <div class="tab-pane active in" id="profile">
                            <!--                                    <div class="panel-heading">
                                                                    <h3 class="panel-title"><?php echo $user_id->id; ?></h3>
                                                                </div>-->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 " align="center"> <img src="<?php echo $propic; ?>" id="profile-img" class="img-thumbnail profile-img"> </div>
                                    <div class=" col-md-9 col-lg-9 ">
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr>
                                                    <td><label>Teacher Register No</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->teacher_register_no; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Signature No</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->signature_no; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Serial No</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->serial_no; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Register Date</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->joined_date; ?></label></td>
                                                </tr>

                                                <tr>
                                                <tr>
                                                    <td><label>Medium</label></td>
                                                    <td><label class="news-item-title">
                                                            <?php
                                                            $med = $user_id->medium;
                                                            if ($med == 's') {
                                                                echo "Sinhala";
                                                            } else if ($med == 'e') {
                                                                echo "English";
                                                            } else if ($med == 't') {
                                                                echo "Tamil";
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Designation</label></td>
                                                    <td><label class="news-item-title">
                                                            <?php
                                                            $desi = $user_id->designation_id;
                                                            if ($desi == 1) {
                                                                echo "Principal";
                                                            } else if ($desi == 2) {
                                                                echo "Acting Principal";
                                                            } else if ($desi == 3) {
                                                                echo "Deputy Principal";
                                                            } else if ($desi == 4) {
                                                                echo "Acting Deputy Principal";
                                                            } else if ($desi == 5) {
                                                                echo "Assistant Principal";
                                                            } else if ($desi == 6) {
                                                                echo "Acting Assistant Principal";
                                                            } else if ($desi == 7) {
                                                                echo "Teacher";
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Section</label></td>
                                                    <td><label class="news-item-title">
                                                            <?php
                                                            $sec = $user_id->section;
                                                            if ($sec == 1) {
                                                                echo "1/5";
                                                            } else if ($sec == 2) {
                                                                echo "6/7";
                                                            } else if ($sec == 3) {
                                                                echo "8/9";
                                                            } else if ($sec == 4) {
                                                                echo "10/11";
                                                            } else if ($sec == 5) {
                                                                echo "A/L Science";
                                                            } else if ($sec == 6) {
                                                                echo "A/L Commerce";
                                                            } else if ($sec == 7) {
                                                                echo "A/L Arts";
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Main Subject</label></td>
                                                    <td><label class="news-item-title">
                                                            <?php
                                                            $main_sub = $user_id->main_subject_id;
                                                            if ($main_sub == 1) {
                                                                echo "Maths";
                                                            } else if ($main_sub == 2) {
                                                                echo "Science";
                                                            } else if ($main_sub == 3) {
                                                                echo "Chemistry";
                                                            } else if ($main_sub == 4) {
                                                                echo "Physics";
                                                            } else if ($main_sub == 5) {
                                                                echo "Business Studies";
                                                            } else if ($main_sub == 6) {
                                                                echo "English";
                                                            } else if ($main_sub == 7) {
                                                                echo "History";
                                                            } else if ($main_sub == 8) {
                                                                echo "Information Technology";
                                                            } else if ($main_sub == 9) {
                                                                echo "Sinhala";
                                                            } else if ($main_sub == 10) {
                                                                echo "Mechanics";
                                                            } else if ($main_sub == 11) {
                                                                echo "Tamil";
                                                            } else if ($main_sub == 12) {
                                                                echo "Other";
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Service Grade</label></td>
                                                    <td><label class="news-item-title">
                                                            <?php
                                                            $grade = $user_id->grade;
                                                            if ($grade == 1) {
                                                                echo "Sri Lanka Education Administrative ServiceI";
                                                            } else if ($grade == 2) {
                                                                echo "Sri Lanka Education Administrative ServiceII";
                                                            } else if ($grade == 3) {
                                                                echo "Sri Lanka Education Administrative ServiceIII";
                                                            } else if ($grade == 4) {
                                                                echo "Sri Lanka Principal ServiceI";
                                                            } else if ($grade == 5) {
                                                                echo "Sri Lanka Principal Service2I";
                                                            } else if ($grade == 6) {
                                                                echo "Sri Lanka Principal Service2II";
                                                            } else if ($grade == 7) {
                                                                echo "Sri Lanka Principal Service3";
                                                            } else if ($grade == 8) {
                                                                echo "Sri Lanka Teacher ServiceI";
                                                            } else if ($grade == 9) {
                                                                echo "Sri Lanka Teacher Service2I";
                                                            } else if ($grade == 10) {
                                                                echo "Sri Lanka Teacher Service2II";
                                                            } else if ($grade == 11) {
                                                                echo "Sri Lanka Teacher Service3I";
                                                            } else if ($grade == 12) {
                                                                echo "Sri Lanka Teacher Service3II";
                                                            } else if ($grade == 13) {
                                                                echo "Sri Lanka Teacher Service Pending";
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Nature of Appointment</label></td>
                                                    <td><label class="news-item-title">
                                                        <?php
                                                            $appo = $user_id->nature_of_appointment;
                                                            if ($appo == 1) {
                                                                echo "Degree";
                                                            } else if ($appo == 2) {
                                                                echo "Diploma";
                                                            } else if ($appo == 3) {
                                                                echo "Trained";
                                                            } else if ($appo == 4) {
                                                                echo "Other";
                                                            } else {
                                                                echo "";
                                                            }
                                                        ?>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Educational Qualification</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->educational_qualific; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Professional Qualification</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->professional_qualific; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>First Appointment Date</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->first_appointment_date; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Personal File No</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->personal_file_no; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Due pension Date</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->pension_date; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Increment Date</label></td>
                                                    <td><label class="news-item-title"><?php echo $user_id->increment_date; ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Promotion</label></td>
                                                    <td><label class="news-item-title">
                                                        <?php
                                                            $promo = $user_id->promotions;
                                                            if ($promo == 1) {
                                                                echo "SLTS 3-11";
                                                            } else if ($promo == 2) {
                                                                echo "SLEAS 111/ SLPS 2-11/ SLTS 3-1";
                                                            } else if ($promo == 3) {
                                                                echo "SLEAS 11/ SLPS 2-1/ SLTS 2-11";
                                                            } else if ($promo == 4) {
                                                                echo "SLEAS 1/ SLPS 1/ SLTS 2-1";
                                                            }  else if ($promo == 5) {
                                                                echo "SLTS 1";
                                                            }else {
                                                                echo "";
                                                            }
                                                        ?>
                                                        </label></td>
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
</div>
