
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php
               if($user_type == 'A'){
                   $this->view('year/admin_sidebar_nav');
               }
               else{
                   $this->view('leave/teacher_sidebar_nav');
               }

            ?>

        </div>

        <div class="col-md-9">

            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success </strong>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <?php if (isset($error_message)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error </strong>
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Edit Academic Year</strong>
                </div>
                <div class="panel-body">


                    <?php
                            foreach ($year as $row)
                            {
                    ?>

                    <?php
                        // Change the css classes to suit your needs

                        $attributes = array('class' => '', 'id' => '');
                        echo form_open('year/edit_academic_year/'.$row->id, $attributes);
                    ?>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Name : </b>
                            <input type="text" name="txt_name" class="form-control" placeholder="Name" value="<?php echo $row->name ?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"></i><b>Starts On : </b>
                            <div class="input-group">
                                <input type="date" name="txt_startdate" class="form-control" placeholder="Start Date" value= "<?php echo $row->start_date ?>">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="col-md-4"></i><b>Ends On : </b>
                            <div class="input-group">
                                <input type="date" name="txt_enddate" class="form-control" placeholder="End Date" value="<?php echo $row->end_date ?>">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Status : </b>
                            <select name="cmb_status" class="form-control">
                            <?php
                                if ($row->status == "1") {
                                    echo "<option value='1' selected>Active</option>". PHP_EOL;
                                } else{
                                    echo "<option value='0' selected>Inactive</option>". PHP_EOL;
                                }
                             ?>

                            </select>
                        </div>

                    </div>
                    <hr>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Adtitionnal Details</b></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Term 01</b></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;  margin-top:10px;">
                        <div class="col-md-4"><b>Start Date : </b>
                            <div class="input-group">
                                <input type="date" name="txt_t1_startdate" class="form-control" placeholder="Start Date" value="<?php echo $row->t1_start_date ?>">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="col-md-4"><b>End Date : </b>
                            <div class="input-group">
                                <input type="date" name="txt_t1_enddate" class="form-control" placeholder="End Date" value="<?php echo $row->t1_end_date ?>">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;  margin-top:10px;">
                        <div class="col-md-4"><b>Term 02</b></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Start Date : </b>
                            <div class="input-group">
                                <input type="date" name="txt_t2_startdate" class="form-control" placeholder="Start Date" value="<?php echo $row->t2_start_date ?>">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="col-md-4"><b>End Date : </b>
                            <div class="input-group">
                                <input type="date" name="txt_t2_enddate" class="form-control" placeholder="End Date" value="<?php echo $row->t2_end_date ?>">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px; margin-top:10px;">
                        <div class="col-md-4"><b>Term 03</b></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Start Date : </b>
                            <div class="input-group">
                                <input type="date" name="txt_t3_startdate" class="form-control" placeholder="Start Date" value="<?php echo $row->t3_start_date ?>">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="col-md-4"><b>End Date : </b>
                            <div class="input-group">
                                <input type="date" name="txt_t3_enddate" class="form-control" placeholder="End Date" value="<?php echo $row->t3_end_date ?>">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <button class="btn btn-raised btn-success" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                    <!-- End of Form -->
                    <?php echo form_close(); ?>
                    <hr>

                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-12">
                            <b>Add Holidays</b><br>
                            <div class="row" style="margin-bottom:5px;">
                                <div class="col-md-12">
                                    <?php
                                        $attributes = array('class' => 'form-inline', 'id' => '');
                                        echo form_open('year/add_holiday/'.$row->id, $attributes);
                                    ?>
                                    <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-group">
                                        <input type="date" name="txt_date" class="form-control" placeholder="Date" >
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <label>Type</label>
                                    <select name="cmb_status" class="form-control">
                                      <option value="2">Poya Day</option>
                                      <option value="3">Religious Holiday</option>
                                      <option value="4">Special Holiday</option>
                                      <option value="5">Special School Day</option>
                                    </select>
                                   <button class='btn btn-raised btn-success' type="submit"><i class='fa fa-plus'></i> Add Holiday</a></button>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                            <hr>
                            <b>Current Holidays</b>

                            <?php

                                $string = $row->structure;
                                $partial = explode(', ', $string);
                                $final = array();
                                array_walk($partial, function($val,$key) use(&$final){
                                    list($key, $value) = explode('=', $val);
                                    $final[$key] = $value;
                                });
                                // print_r($final);
                                $indextbl = 1;
                                ?>
                                <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Date</th>
                                          <th>Type</th>
                                          <th>Actions</th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                <!-- Start of Forloop -->
                                <?php
                                foreach ($final as $key => $value) {
                                    // If its a poya day
                                    if($value == 2) {
                                    ?>
                                        <tr>
                                          <th scope="row"><?php echo $indextbl ?></th>
                                          <td><?php echo $key ?></td>
                                          <td>Poya Day</td>
                                          <td><a href="<?php echo base_url("index.php/year/remove_holiday/".$row->id."/" . $key); ?>">Delete</a></td>
                                        </tr>

                                <!--End of For loop -->
                                <?php
                                            $indextbl++;
                                        }

                                    //If its a Religious Holiday
                                    if($value == 3) {
                                    ?>
                                        <tr>
                                          <th scope="row"><?php echo $indextbl ?></th>
                                          <td><?php echo $key ?></td>
                                          <td>Religious Holiday</td>
                                          <td><a href="<?php echo base_url("index.php/year/remove_holiday/".$row->id."/" . $key); ?>">Delete</a></td>
                                        </tr>

                                <!--End of For loop -->
                                <?php
                                            $indextbl++;
                                        }

                                    //If its a Speicial Holiday
                                    if($value == 4) {
                                    ?>
                                        <tr>
                                          <th scope="row"><?php echo $indextbl ?></th>
                                          <td><?php echo $key ?></td>
                                          <td>Special Holiday</td>
                                          <td><a href="<?php echo base_url("index.php/year/remove_holiday/".$row->id."/" . $key); ?>">Delete</a></td>
                                        </tr>

                                <!--End of For loop -->
                                <?php
                                            $indextbl++;
                                        }

                                    //If its a Special School day
                                    if($value == 5) {
                                    ?>
                                        <tr>
                                          <th scope="row"><?php echo $indextbl ?></th>
                                          <td><?php echo $key ?></td>
                                          <td>Special School Day</td>
                                          <td><a href="<?php echo base_url("index.php/year/remove_holiday/".$row->id."/" . $key); ?>">Delete</a></td>
                                        </tr>

                                <!--End of For loop -->
                                <?php
                                            $indextbl++;
                                        }

                                    }
                                ?>
                                    </tbody>
                                </table>

                        </div>
                    </div>
                    <hr>
                    <div class="row" style="margin-bottom:5px;">
                        <div align="center">
                            <?php


                            //Getting Data from the DB
                                $string = $row->structure;
                                $partial = explode(', ', $string);
                                $final = array();
                                array_walk($partial, function($val,$key) use(&$final){
                                    list($key, $value) = explode('=', $val);
                                    $final[$key] = $value;
                                });



                                $months=array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                                $current_month=date('n');
                                $current_year=date('Y');
                                $current_day=date('d');
                                $month=0;

                                echo '<table class="calendar">';
                                echo '<th colspan="4" class="year">'.$current_year.'</th>';

                                // Table of months
                                for ($row=1; $row<=3; $row++) {
                                    echo '<tr>';
                                    for ($column=1; $column<=4; $column++) {
                                        echo '<td class="month">';

                                        $month++;

                                        // Month Cell
                                        $first_day_in_month=date('w',mktime(0,0,0,$month,1,$current_year));
                                        $month_days=date('t',mktime(0,0,0,$month,1,$current_year));

                                        // in PHP, Sunday is the first day in the week with number zero (0)
                                        // to make our calendar works we will change this to (7)
                                        if ($first_day_in_month==0){
                                             $first_day_in_month=7;
                                        }

                                        echo '<table>';
                                        echo '<th colspan="7">'.$months[$month-1].'</th>';
                                        echo '<tr class="days"><td>Mo|</td><td>Tu|</td><td>We|</td><td>Th|</td><td>Fr|</td>';
                                        echo '<td class="sat">Sa|</td><td class="sun">Su</td></tr>';
                                        echo '<tr>';

                                        for($i=1; $i<$first_day_in_month; $i++) {
                                            echo '<td> </td>';
                                        }

                                         for($day=1; $day<=$month_days; $day++) {
                                                    $pos=($day+$first_day_in_month-1)%7;
                                                    $class = (($day==$current_day) && ($month==$current_month)) ? 'today' : 'day';
                                                    // $class .= ($pos==6) ? ' weekend' : '';
                                                    // $class .= ($pos==0) ? ' weekend' : '';

                                                    // echo '<td class="'.$class.'">'.$day.'</td>';
                                                    $href = $current_year."-".$month."-".$day;

                                                    $t = true;

                                                    foreach ($final as $key => $value) {
                                                        $noofdates=date_diff(date_create($key),date_create($href));
                                                        //No of days in the Year
                                                        $sdate = $noofdates->format("%a");

                                                        if($sdate == '0' && $value == '1'){
                                                            $class .=  ' holi';

                                                        // echo "Key: $key; Value: $value";
                                                        // echo "<br />";
                                                        }

                                                        else if($sdate == '0' && $value == '2')
                                                            $class .=  ' poya';
                                                    }

                                                    // echo '<td class="'.$class.'">'.'<a href="'.$href.'">' .$day. '</a>' . '</td>';

                                                    echo '<td class="'.$class.'">'. $day . '</td>';

                                                    if ($pos==0) echo '</tr><tr>';
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
                            .calendar .month .weekend{
                                color:#0000cc;
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
                    <!-- End of Calender -->
                    </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>
