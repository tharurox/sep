
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php
               if($user_type == 'A'){
                   $this->view('year/admin_sidebar_nav');
               }
               else{
                   $this->view('year/teacher_sidebar_nav');
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
                    <strong>Current Academic Year</strong>
                </div>
                <div class="panel-body">

                    <?php
                            foreach ($year as $row)
                            {
                    ?>

                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Name : </b><?php echo $row->name ?></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"></i><b>Starts On : </b><?php echo $row->start_date ?></div>
                        <div class="col-md-4"></i><b>Ends On : </b><?php echo $row->end_date ?></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Status : </b>
                            <?php
                                if ($row->status == "1") {
                                    echo "<span class='label label-primary'>Active</span>". PHP_EOL;
                                } else{
                                    echo "<span class='label label-danger'>Inactive</span>". PHP_EOL;
                                }
                             ?>

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
                        <div class="col-md-4"><b>End Date : </b><?php echo $row->t3_end_date ?></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4">
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
                    </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>
