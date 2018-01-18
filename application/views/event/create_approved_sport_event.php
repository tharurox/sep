<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php
            if($user_type == 'A'){
                $this->view('event/admin_sidebar_nav');
            }else{
                $this->view('event/sidebar_nav_teacher');
            }

            ?>
        </div>

        <div class="col-md-9">
            <?php if (isset($succ_message)) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $succ_message; ?>
            </div>
            <?php } ?>
            <?php if (isset($err_message)) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $err_message; ?>
            </div>
            <?php } ?>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>UPDATE EVENT</strong>
                </div>
                <div class="panel-body">
                    <?php
                    // Change the css classes to suit your needs

                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('event/update_event', $attributes);
                    ?>
                    <input type="hidden" id="eid" name="eid" value="<?php echo $details->id; ?>">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Event Name</label>
                        <div class="col-sm-4">
                            <input id="event_name" type="text" name="event_name"  value="<?php echo $details->title; ?>" class="form-control">
                            <?php echo form_error('event_name'); ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">Event Type</label>
                        <div class="col-sm-4">
                            <select id='event_type' name='event_type' class='form-control'>
                            <?php foreach ($result as $row) { ?>
                                <option value='<?php echo $row->event_type ?>' <?php if($row->event_type == $details->event_type){ echo 'selected' ;} ?>><?php echo $row->event_type ?></option>
                            <?php }?>
                            </select>
                            <?php echo form_error('event_type'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-4">

                            <textarea id="description" name="description" class="form-control"><?php echo $details->description; ?></textarea>
                            <?php echo form_error('description'); ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">In Charge ID</label>
                        <div class="col-sm-4">
                            <input style="background-color: khaki" id="in_charge" type="text" name="in_charge"  value="<?php echo $details->in_charge_id; ?>" type="text" class="form-control" id="in_charge" readonly="">
                            <?php echo form_error('in_charge'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Budget(Rs.)</label>
                        <div class="col-sm-4">
                            <input style="background-color: khaki" id="budget" type="text" name="budget"  value="<?php echo $details->budget; ?>" type="text" class="form-control" id="budget" readonly="">
                            <?php echo form_error('budget'); ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">Start Date</label>
                        <div class="col-sm-4">
                            <input id="start_date" type="date" name="start_date"  value="<?php echo $details->start_date; ?>" class="form-control">
                            <?php echo form_error('start_date'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Start Time</label>
                        <div class="col-sm-4">
                            <input id="start_time" type="time" name="start_time"  value="<?php echo $details->start_time; ?>" class="form-control">
                            <?php echo form_error('start_time'); ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">End Date</label>
                        <div class="col-sm-4">
                            <input id="end_date" type="date" name="end_date"  value="<?php echo $details->end_date; ?>" class="form-control">
                            <?php echo form_error('end_date'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">End Time</label>
                        <div class="col-sm-4">
                            <input  id="end_time" type="time" name="end_time"  value="<?php echo $details->end_time; ?>" class="form-control">
                            <?php echo form_error('end_time'); ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">*Location</label>
                        <div class="col-sm-4">
                            <input id="location" type="text" name="location"  value="<?php echo $details->location; ?>" class="form-control">
                            <?php echo form_error('location'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Special Guest</label>
                        <div class="col-sm-4">
                            <input id="guest" type="text" name="guest"  value="<?php echo $details->guest; ?>" class="form-control">
                            <?php echo form_error('guest'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-raised btn-success" value="Update">
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
