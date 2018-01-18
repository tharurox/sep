
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
                    <strong>Add Academic Year</strong>
                </div>
                <div class="panel-body">
                    <?php
                        // Change the css classes to suit your needs

                        $attributes = array('class' => '', 'id' => '');
                        echo form_open('year/add_year', $attributes);
                    ?>


                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Name</b></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4">
                            <input type="text" name="txt_name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Starts On</b></div>
                        <div class="col-md-4"><b>Ends On</b></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="date" name="txt_startdate" class="form-control" placeholder="Start Date" value="<?php echo set_value('name'); ?>">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="date" name="txt_enddate" class="form-control" placeholder="End Date" value="<?php echo set_value('name'); ?>">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Status</b></div>
                    </div>
                     <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4">
                            <select name="cmb_status" class="form-control">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                            <br>
                        </div>

                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Adtitionnal Details</b><br><br></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Term 01</b></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;  margin-top:10px;">
                        <div class="col-md-4"><b>Start Date</b></div>
                        <div class="col-md-4"><b>End Date</b></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="date" name="txt_t1_startdate" class="form-control" placeholder="Start Date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="date" name="txt_t1_enddate" class="form-control" placeholder="End Date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px;  margin-top:10px;">
                        <div class="col-md-4"><b>Term 02</b></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Start Date</b></div>
                        <div class="col-md-4"><b>End Date</b></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="date" name="txt_t2_startdate" class="form-control" placeholder="Start Date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="date" name="txt_t2_enddate" class="form-control" placeholder="End Date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px; margin-top:10px;">
                        <div class="col-md-4"><b>Term 03</b></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4"><b>Start Date</b></div>
                        <div class="col-md-4"><b>End Date</b></div>
                    </div>
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="date" name="txt_t3_startdate" class="form-control" placeholder="Start Date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="date" name="txt_t3_enddate" class="form-control" placeholder="End Date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:5px; margin-top:10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <button class="btn btn-raised btn-success" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

</div>
