<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php
            if($user_type == 'A'){
                $this->view('leave/admin_sidebar');
            }
            elseif($user_type == 'T'){
                $this->view('leave/teacher_sidebar');
            }
            else{
                $this->view('leave/teacher_sidebar');
            }

            ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>LEAVES REPORT</strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                                <?php
                                    // Change the css classes to suit your needs

                                    $attributes = array('class' => '', 'id' => '');
                                    echo form_open('leave/leaves_report', $attributes);
                                ?>
                              <div class="form-group ">
                                <label >Name</label>
                                <select name="cmb_status" class="form-control">
                                    <option value="0">- Select Name -</option>
                                    <?php
                                  foreach ($teachers as $row) {
                                    echo "<option value='" . $row->user_id . "'>" . $row->full_name . "</option>" . PHP_EOL;
                                }
                                ?>
                                </select>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                      <div class="form-group">
                                        <label >Start Date</label>
                                        <div class="input-group">
                                            <input type="date" name="txt_startdate" class="form-control" placeholder="Start Date" id="txt_startdate">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                        <label >End Date</label>
                                        <div class="input-group">
                                            <input type="date" name="txt_enddate" class="form-control" placeholder="End Date">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>
                                <div class="form-group">
                                            <button type="submit" class="btnbtn-raised btn-raised btn-primary" id="sbtn"><i class="fa fa-search"></i> Search</button>
                                        </div>


                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <hr>
                    <?php if (isset($report_results)) { ?>
                        <!-- Report Generation Form -->
                        <?php echo form_open('leave/leaves_report_print'); ?>


                        <input type="hidden" name="userid" value="<?php echo $uid ?>" id="uid">
                        <input type="hidden" name="startdate" value="<?php echo $stdate ?>" id="sdt">
                        <input type="hidden" name="enddate" value="<?php echo $endate ?>" id="edt">
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-raised btn-primary"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <!-- End of Report Generation -->
                        <hr>
                        <!-- Report Details -->
                        <?php
                                  foreach ($teacher_details as $row) {
                                    ?>
                        <div class="row">
                            <div class="col-md-6">
                                <h2><?php echo $row->full_name ?></h2>
                                <h4>NIC No : <?php echo $row->nic_no ?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Signature No : <?php echo $row->signature_no ?></h4>
                            </div>
                            <div class="col-md-4">
                                <h4>Serial No : <?php echo $row->serial_no ?></h4>
                            </div>
                            <div class="col-md-4">
                                <h4>Registration No : <?php echo $row->teacher_register_no ?></h4>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <hr>
                        <!-- End of Report Details -->
                        <div class="row">
                            <div class="col-md-12 col-md-offset-*">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Leave Type</th>
                                            <th>Applied Date</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>No Days</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($applied_leaves as $row) {
                                            echo "<tr>" . PHP_EOL;
                                            echo "<td scope='row'><span class='glyphicon glyphicon-folder-close'></span></td>";
                                            echo "<td>" . $row->name . "</td>" . PHP_EOL;
                                            echo "<td>" . $row->applied_date . "</td>" . PHP_EOL;
                                            echo "<td>" . $row->start_date . "</td>" . PHP_EOL;
                                            echo "<td>" . $row->end_date . "</td>" . PHP_EOL;
                                            echo "<td>" . $row->no_of_days . "</td>" . PHP_EOL;



                                            if ($row->status == "Pending") {
                                                echo "<td><span class='label label-primary'>" . $row->status . "</span></td>" . PHP_EOL;
                                            } elseif ($row->status == "Approved") {
                                                echo "<td><span class='label label-success'>" . $row->status . "</span></td>" . PHP_EOL;
                                            } else {
                                                echo "<td><span class='label label-danger'>" . $row->status . "</span></td>" . PHP_EOL;
                                            }
                                            echo "</tr>" . PHP_EOL;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } else{ ?>
                        <div class="row">
                            <div class="col-md-12 col-md-offset-* text-center">
                               <div class="well well-lg">
                                    <i class="fa fa-exclamation-triangle fa-5x"></i>
                                    <div class="page-header">
                                      <h1>No Data Found</h1>
                                    </div>
                               </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>
