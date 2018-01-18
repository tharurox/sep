<img src="<?php echo base_url('assets/img/dslogo.jpg'); ?>" width="128px" height="128px" style="margin-left: 19em">
<img src="<?php echo $propic; ?>" id="profile-img" class="img-thumbnail profile-img" style="height: 100px ; width: 100px ; margin-left: 12em ;">
<h3 style="margin-bottom: 0; margin-left: 14em"><?php echo $school_name; ?></h3>
<h5 style="margin-top: 0; margin-left: 14em">Teacher Report - <?php echo $result->name_with_initials; ?></h5>

<div class="row" style="margin-left: 5em">
    <h3><u>Basic Details</u></h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th align="left" width="250px"> </th>
                <th align="left" width="250px"> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>NIC</td>
                <td><?php echo $result->nic_no; ?></td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td><?php echo $result->full_name; ?></td>
            </tr>
            <tr>
                <td>Name with Initials</td>
                <td><?php echo $result->name_with_initials; ?></td>
            </tr>
            <tr>
                <td>Birthday</td>
                <td><?php echo $result->dob; ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php
                    $gen = $result->gender;
                    if ($gen == 'm') {
                        echo 'Male';
                    } else if ($gen == 'f') {
                        echo 'Female';
                    }
                    ?></td>
            </tr>
            <tr>
                <td>Nationality</td>
                <td><?php
                    $nation = $result->nationality_id;
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
                </td>
            </tr>
            <tr>
                <td>Religion</td>
                <td><?php
                    $rel = $result->religion_id;
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
                    ?></td>
            </tr>
            <tr>
                <td>Civil Status</td>
                <td><?php
                    $status = $result->civil_status;
                    if ($status == 's') {
                        echo "Single";
                    } else if ($status == 'm') {
                        echo "Married";
                    } else if ($status == 'w') {
                        echo "Widow";
                    } else {
                        echo "Other";
                    }
                    ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo $result->permanent_addr;?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $result->permanent_addr1;?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $result->permanent_addr2;?>
                </td>
            </tr>

            <tr>
                <td>Contact Mobile No</td>
                <td><?php echo $result->contact_home; ?></td>
            </tr>
            <tr>
                <td>Widow & Orphan No</td>
                <td><?php echo $result->wnop_no; ?></td>
            </tr>
        </tbody>
    </table>

    
    <h3><u>Academic Details</u></h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th align="left" width="250px"> </th>
                <th align="left" width="250px"> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Register No</td>
                <td><?php echo $result->teacher_register_no; ?></td>
            </tr>
            <tr>
                <td>Signature No</td>
                <td><?php echo $result->signature_no; ?></td>
            </tr>
            <tr>
                <td>Serial No</td>
                <td><?php echo $result->serial_no; ?></td>
            </tr>
            <tr>
                <td>Date Joined School</td>
                <td><?php echo $result->joined_date; ?></td>
            </tr>
            <tr>
                <td>Medium</td>
                <td><?php
                    $med = $result->medium;
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
                </td>
            </tr>
            <tr>
                <td>Designation</td>
                <td><?php
                    $desi = $result->designation_id;
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
                </td>
            </tr>
            <tr>
                <td>Section</td>
                <td><?php
                    $sec = $result->section;
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
                </td>
            </tr>
            <tr>
                <td>Main Subject</td>
                <td><?php
                    $main_sub = $result->main_subject_id;
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
                </td>
            </tr>
            <tr>
                <td>Service Garde</td>
                <td>
                    <?php
                    $grade = $result->grade;
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
                </td>
            </tr>
            <tr>
                <td>Nature of Appointment</td>
                <td>
                    <?php
                    $appo = $result->nature_of_appointment;
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
                </td>
            </tr>
            <tr>
                <td>Educational Qualifications</td>
                <td><?php echo $result->educational_qualific; ?></td>
            </tr>
            <tr>
                <td>Professional Qualifications</td>
                <td><?php echo $result->professional_qualific; ?></td>
            </tr>
            <tr>
                <td>First Appointment Date</td>
                <td><?php echo $result->first_appointment_date; ?></td>
            </tr>
            <tr>
                <td>Due Pension Date</td>
                <td><?php echo $result->pension_date; ?></td>
            </tr>
    </table>

</div>
