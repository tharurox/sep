<style>
    #details-table td{
        height: 50px;
        padding: 0px 30px;
    }

    .trheding{

        font-size: 13px;
        color: #FF4800;
        font-weight: bold;
        text-transform: uppercase;
        background:  rgb(243, 243, 243) none repeat scroll 0% 0%;


    }

    .subheadng{
        font-size: 13px;
        font-weight: bold;

    }

    .cntn{

        border: 1px solid rgba(128, 128, 128, 0.12);
        border-radius: 4px;
    }

    .profile-nav > li{
        border-radius: 0px !important;
    }
    .profile-nav > li> a{
        color: #595959;
        text-decoration: none;
        background: rgb(243, 243, 243) none repeat scroll 0% 0%;
    }

</style>
<div class="container cntn" >
    <div class="row">
        <div class="col-md-3"   style="background-color: rgba(210, 210, 210, 0.09);  min-height: 553px" >
            <div class="col-md-offset-1 col-md-10" ><h3 class="text-center"><?php echo $user_d->first_name . ' ' . $user_d->last_name; ?></h3></div>
            <div class="col-md-offset-1 col-md-10" style="padding-bottom: 25px; border-bottom: 1px solid #ddd; ">
                <img src="
                <?php echo ($user_d->profile_img == "" ? base_url('assets/img/profile_placeholder.png') : $user_d->profile_img); ?>
                     " alt="..." class="img-thumbnail"></div>
            <div class="col-md-offset-1 col-md-10 text-center" style='padding-top: 10px;'><h3><span style="color:#FF4800;"><?php echo $user_d->username; ?></span></h3>
            </div>
            <div class="col-md-offset-1 col-md-10 text-center" style='padding-top: 0px;'><h4><span style="color:rgb(77, 80, 89);"><?php if ($user_d->user_type == 'A') {
                    echo 'ADMIN';
                }if ($user_d->user_type == 'T') {
                    echo 'TEACHER';
                }if ($user_d->user_type == 'S') {
                    echo 'STUDENT';
                } ?></span></h4></div>
<?php if ($edit) { ?>
                <div class="col-md-offset-1 col-md-10 center" ><a href="<?php echo base_url('index.php/profile/profile_settings'); ?>"><button class='btn btn-raised btn-success col-md-12'>Edit Profile</button></a></div>
<?php } ?>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-9" style=" border-left: 1px solid #ddd; min-height: 553px">
            <!--            <div class="col-md-10"><h1>Student Profile</h1></div>-->
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="bhoechie-tab-menu">
                    <ul class="nav nav-tabs profile-nav">
                        <li role="presentation" class="active"><a href="#">Personal Details</a></li>
                        <li role="presentation"><a href="#">Academic Details</a></li>
<?php if (isset($year)) { ?> <li role="presentation"><a href="<?php ?>">Academic Year</a></li> <?php } ?>
                        <!--<li role="presentation"><a href="#">Classes</a></li>-->

                    </ul>
                </div>
                <div class="col-md-12 bhoechie-tab-content" style="padding: 0px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="details-table" style="margin-top: 10px; margin-bottom: 10px;">
                        <tbody>
                            <tr class="trheding">
                                <td id="dtr">General</td>
                                <td id="dtr">&nbsp;</td>
                                <td id="dtr">&nbsp;</td>
                                <td id="dtr">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="subheadng">NIC No</td>
                                <td class="normal"><?= $details->nic_no; ?></td>
                                <td class="subheadng">Full Name</td>
                                <td class="normal"><?= $details->full_name; ?></td>
                            </tr>

                            <tr>
                                <td class="subheadng">Name with Initials</td>
                                <td class="normal"><?= $details->name_with_initials; ?></td>
                                <td class="subheadng">Birth Day</td>
                                <td class="normal"><?= $details->dob; ?></td>
                            </tr>
                            <tr>

                                <td class="subheadng">Gender</td>
                                <td class="normal"><?php if ($details->gender == 'm') {
    echo 'Male';
}if ($details->gender == 'f') {
    echo 'Female';
} ?></td>
                                <td class="subheadng">Religion</td>
                                <td class="normal"><?php if ($details->religion_id == 1) {
                                        echo 'Buddhism';
                                    }if ($details->religion_id == 2) {
                                        echo 'Hinduism';
                                    }if ($details->religion_id == 3) {
                                        echo 'Islam';
                                    }if ($details->religion_id == 4) {
                                        echo 'Catholicism';
                                    }if ($details->religion_id == 5) {
                                        echo 'Christianity';
                                    }if ($details->religion_id == 6) {
                                        echo 'Other';
                                    } ?></td>
                            </tr>
                            <tr>
                                <td class="subheadng">Nationality</td>
                                <td class="normal"><?php
                                    $rel = $details->nationality_id;
                                    if ($rel == 1) {
                                        echo "Sinhala";
                                    } else if ($rel == 2) {
                                        echo "Sri Lankan Tamil";
                                    } else if ($rel == 3) {
                                        echo "Indian Tamil";
                                    } else if ($rel == 4) {
                                        echo "Muslim";
                                    } else if ($rel == 5) {
                                        echo "Other";
                                    } else {
                                        echo "Other";
                                    }
                                    ?></td>
                                <td class="subheadng">Email</td>
                                <td class="normal"><?= $details->email; ?></td>
                            </tr>
                            <tr>
                                <td class="subheadng">Civil Status</td>
                                <td class="normal"><?php
                                    $status = $details->civil_status;
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
                                <td class="subheadng">Widow and Orphan</td>
                                <td class="normal"><?= $details->wnop_no; ?></td>
                            </tr>
                            <tr>
                                <td class="subheadng">Contact Home</td>
                                <td class="normal"><?= $details->contact_home; ?></td>
                                <td class="subheadng">Contact Mobile</td>
                                <td class="normal"><?= $details->contact_mobile; ?></td>
                            </tr>
                            <tr>
                                <td class="subheadng">Address</td>
                                <td class="normal"><?= $details->permanent_addr; ?>,
                                                   <?= $details->permanent_addr1; ?>,
                                                   <?= $details->permanent_addr2; ?></td>
                                <td class="subheadng">&nbsp;  </td>
                                <td class="normal">&nbsp; </td>

                            </tr>


                        </tbody></table>
                    <br><br>
                    <div class="clearfix"></div>
                </div>
                <div class="bhoechie-tab-content hide">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="details-table" style="margin-top: 10px; margin-bottom: 10px;">
                        <tbody>
                            <tr class="trheding">
                                <td id="dtr">Academic Details</td>
                                <td id="dtr">&nbsp;</td>
                                <td id="dtr">&nbsp;</td>
                                <td id="dtr">&nbsp;</td>
                            </tr>

                            <tr>
                                <td class="subheadng">Teacher Register No</td>
                                <td class="normal"><?= $details->teacher_register_no; ?></td>
                                <td class="subheadng">Signature No</td>
                                <td class="normal"><?= $details->signature_no; ?></td>
                            </tr>
                            <tr>
                                <td class="subheadng">Serial No</td>
                                <td class="normal"><?= $details->serial_no; ?></td>
                                <td class="subheadng">Register Date</td>
                                <td class="normal"><?= $details->joined_date; ?></td>
                            </tr>
                            <tr>
                                <td class="subheadng">Medium</td>
                                <td class="normal"><?php
                                    $med = $details->medium;
                                    if ($med == 's') {
                                        echo "Sinhala";
                                    } else if ($med == 't') {
                                        echo "English";
                                    } else if ($med == 'e') {
                                        echo "Tamil";
                                    } else {
                                        echo "";
                                    }
                                    ?></td>
                                <td class="subheadng">Designation</td>
                                <td class="normal"><?= $details->designation_id; ?></td>
                            </tr>
                            <tr>
                                <td class="subheadng">Section</td>
                                <td class="normal"><?php
                                    $desi = $details->designation_id;
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
                                    };
                                    ?></td>
                                <td class="subheadng">Main Subject</td>
                                <td class="normal"><?php
                                    $main_sub = $details->main_subject_id;
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
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="subheadng">Service Grade</td>
                                <td class="normal"><?php
                                    $grade = $details->grade;
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
                                    ?></td>
                                <td class="subheadng">Nature of Appointment</td>
                                <td class="normal"><?php
                                    $appo = $details->nature_of_appointment;
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
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="subheadng">Educational Qualification</td>
                                <td class="normal"><?= $details->educational_qualific; ?></td>
                                <td class="subheadng">Professional Qualification</td>
                                <td class="normal"><?= $details->professional_qualific; ?></td>
                            </tr>
                            <tr>
                                <td class="subheadng">Personal File No</td>
                                <td class="normal"><?= $details->personal_file_no; ?></td>
                                <td class="subheadng">Promotion</td>
                                <td class="normal"><?php
                    $promo = $details->promotions;
                    if ($promo == 1) {
                        echo "SLTS 3-11";
                    } else if ($promo == 2) {
                        echo "SLEAS 111/ SLPS 2-11/ SLTS 3-1";
                    } else if ($promo == 3) {
                        echo "SLEAS 11/ SLPS 2-1/ SLTS 2-11";
                    } else if ($promo == 4) {
                        echo "SLEAS 1/ SLPS 1/ SLTS 2-1";
                    } else if ($promo == 5) {
                        echo "SLTS 1";
                    } else {
                        echo "";
                    }
                    ?></td>
                            </tr>
                            <tr>
                                <td class="subheadng">First Appointment Date</td>
                                <td class="normal"><?php if ($details->first_appointment_date == null || $details->first_appointment_date == '0000-00-00') {
                        echo '';
                    } else {
                        echo $details->first_appointment_date;
                    }; ?></td>
                                <td class="subheadng">Due pension Date</td>
                                <td class="normal"><?php if ($details->pension_date == null || $details->pension_date == '0000-00-00') {
                        echo '';
                    } else {
                        echo $details->pension_date;
                    }; ?></td>
                            </tr>
                            <tr>
                                <td class="subheadng">Increment Date</td>
                                <td class="normal"><?php if ($details->increment_date == null || $details->increment_date == '0000-00-00') {
                        echo '';
                    } else {
                        echo $details->increment_date;
                    }; ?></td>
                                <td class="subheadng">&nbsp;  </td>
                                <td class="normal">&nbsp; </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                                <?php if (isset($year)) { ?>
                    <div class="bhoechie-tab-content hide">
                        <br>


                                    <?php
                                    foreach ($year as $row) {
                                        ?>

                            <!-- Buttons for Modifications -->


                            <div class="row" style="margin-bottom:5px;">
                                <div class="col-md-4"><b>Name : </b><?php echo $row->name ?></div>
                            </div>
                            <div class="row" style="margin-bottom:5px;">
                                <div class="col-md-4"></i><b>Starts On : </b><?php echo $row->start_date ?></div>
                                <div class="col-md-4"></i><b>Ends On : </b><?php echo $row->end_date ?></div>
                            </div>

                            <hr>

                            <div class="row" style="margin-bottom:5px;">
                                <div class="col-md-4"><b>Term 01</b></div>
                            </div>
                            <div class="row" style="margin-bottom:5px;  margin-top:10px;">
                                <div class="col-md-4"><b>Start Date : </b><?php echo $row->t1_start_date ?></div>
                                <div class="col-md-4"><b>End Date : </b><?php echo $row->t1_end_date ?></div>
                            </div>
                            <div class="row" style="margin-bottom:5px;  margin-top:10px;">
                                <div class="col-md-4"><b>Term 02</b></div>
                            </div>
                            <div class="row" style="margin-bottom:5px;">
                                <div class="col-md-4"><b>Start Date : </b><?php echo $row->t2_start_date ?></div>
                                <div class="col-md-4"><b>End Date : </b><?php echo $row->t2_end_date ?></div>
                            </div>
                            <div class="row" style="margin-bottom:5px; margin-top:10px;">
                                <div class="col-md-4"><b>Term 03</b></div>
                            </div>
                            <div class="row" style="margin-bottom:5px;">
                                <div class="col-md-4"><b>Start Date : </b><?php echo $row->t3_start_date ?></div>
                                <div class="col-md-4"><b>End Date : </b><?php echo $row->t3_end_date ?></div>   <div class="col-md-4"><div class="col-md-6"><span  style="color: #00BCD4;font-size: 11px;font-weight: bold;">School Holidays</span></div><div class="col-md-6"><span style="color: red;font-size: 11px;font-weight: bold;">Public Holidays</span></div></div>


                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-md-4">
                                        <br>
                                        <?php
                                        // $string = $row->structure;
                                        // $partial = explode(', ', $string);
                                        // $final = array();
                                        // array_walk($partial, function($val,$key) use(&$final){
                                        //     list($key, $value) = explode('=', $val);
                                        //     $final[$key] = $value;
                                        // });
                                        // print_r($final);
                                        // foreach ($final as $key => $value) {
                                        //     echo "Key: $key; Value: $value";
                                        //     echo "<br />";
                                        // }
                                        ?>

                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div align="center">
                                        <?php
                                        //Getting Data from the DB
                                        $string = $row->structure;
                                        $partial = explode(', ', $string);
                                        $final = array();
                                        array_walk($partial, function($val, $key) use(&$final) {
                                            list($key, $value) = explode('=', $val);
                                            $final[$key] = $value;
                                        });



                                        $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                                        $current_month = date('n');
                                        $current_year = date('Y');
                                        $current_day = date('d');
                                        $month = 0;

                                        echo '<table class="calendar">';
                                        echo '<th colspan="4" class="year">' . $current_year . '</th>';

                                        // Table of months
                                        for ($row = 1; $row <= 3; $row++) {
                                            echo '<tr>';
                                            for ($column = 1; $column <= 4; $column++) {
                                                echo '<td class="month">';

                                                $month++;

                                                // Month Cell
                                                $first_day_in_month = date('w', mktime(0, 0, 0, $month, 1, $current_year));
                                                $month_days = date('t', mktime(0, 0, 0, $month, 1, $current_year));

                                                // in PHP, Sunday is the first day in the week with number zero (0)
                                                // to make our calendar works we will change this to (7)
                                                if ($first_day_in_month == 0) {
                                                    $first_day_in_month = 7;
                                                }

                                                echo '<table>';
                                                echo '<th colspan="7">' . $months[$month - 1] . '</th>';
                                                echo '<tr class="days"><td>Mo|</td><td>Tu|</td><td>We|</td><td>Th|</td><td>Fr|</td>';
                                                echo '<td class="sat">Sa|</td><td class="sun">Su</td></tr>';
                                                echo '<tr>';

                                                for ($i = 1; $i < $first_day_in_month; $i++) {
                                                    echo '<td> </td>';
                                                }

                                                for ($day = 1; $day <= $month_days; $day++) {
                                                    $pos = ($day + $first_day_in_month - 1) % 7;
                                                    $class = (($day == $current_day) && ($month == $current_month)) ? 'today' : 'day';


                                                    // echo '<td class="'.$class.'">'.$day.'</td>';
                                                    $href = $current_year . "-" . $month . "-" . $day;

                                                    $t = true;

                                                    foreach ($final as $key => $value) {
                                                        $noofdates = date_diff(date_create($key), date_create($href));
                                                        //No of days in the Year
                                                        $sdate = $noofdates->format("%a");

                                                        if ($sdate == '0' && $value == '1') {
                                                            $class .= ' holi';

                                                            // echo "Key: $key; Value: $value";
                                                            // echo "<br />";
                                                        } else if ($sdate == '0' && $value == '2')
                                                            $class .= ' poya';
                                                    }
                                                    //Class set for Holidays
                                                    // $class .= ($pos==6) ? ' weekend' : '';
                                                    // $class .= ($pos==0) ? ' weekend' : '';
                                                    // echo '<td class="'.$class.'">'.'<a href="'.$href.'">' .$day. '</a>' . '</td>';

                                                    echo '<td class="' . $class . '">' . $day . '</td>';

                                                    if ($pos == 0)
                                                        echo '</tr><tr>';
                                                }

                                                echo '</tr>';
                                                echo '</table>';

                                                echo '</td>';
                                            }
                                            echo '</tr>';
                                        }

                                        echo '</table>';
                                        ?>
                                    </div>
                                    <style type="text/css">
                                        .calendar {
                                            width: 800px;
                                        }
                                        .calendar, .calendar table {
                                            border: 0;
                                            margin: 0;
                                        }
                                        .calendar, .calendar table, .calendar td {
                                            text-align: center;
                                        }
                                        .calendar .year{
                                            font-family:Verdana;
                                            font-size:18pt;
                                            color:#ff9900;
                                        }
                                        .calendar .month{
                                            width: 25%;
                                            vertical-align: top;
                                        }
                                        .calendar .month table{
                                            font-size:9pt;
                                            font-family:Verdana;
                                        }
                                        .calendar .month th{
                                            text-align: center;
                                            font-size:12pt;
                                            font-family:Arial;
                                            color:#666699;
                                        }
                                        .calendar .month td{
                                            font-size:9pt;
                                            font-family:Verdana;
                                        }
                                        .calendar .month .days td{
                                            color:#666666;
                                            font-weight: bold;
                                        }
                                        .calendar .month .holi{
                                            /*color:#0000cc;*/
                                            color:#00BCD4;
                                        }
                                        .calendar .month .poya{
                                            /*color:#0000cc;*/
                                            color:#cc0000;
                                        }
                                        .calendar .month .today{
                                            background:#ff0000;
                                            color: #ffffff;
                                        }

                                    </style>
                                </div>

    <?php } ?>


                        </div>


                    </div>
<?php } ?>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("div.bhoechie-tab-menu>ul>li").click(function (e) {
            e.preventDefault();
            $(this).siblings('li.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab-content").addClass("hide");
            $("div.bhoechie-tab-content").eq(index).removeClass("hide");
        });
    });
</script>
