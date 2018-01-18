<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php
            if ($user_type == 'A') {
                $this->view('event/admin_sidebar_nav');
            }else {
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
                    <strong>CREATE NEW EVENT</strong>
                </div>
                <div class="panel-body">
                    <?php
// Change the css classes to suit your needs

                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('event/create_event', $attributes);
                    ?>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Event Name</label>
                        <div class="col-sm-4">
                            <input id="event_name" type="text" name="event_name"  value="<?php
                            if (isset($succ_message)) {
                                echo '';
                            } else {
                                echo set_value('event_name');
                            }
                            ?>" type="text" class="form-control" id="event_name" placeholder="Event Name">
                                   <?php echo form_error('event_name'); ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">Event Type</label>
                        <div class="col-sm-4">
                            <?php
                            echo "<select id='event_type' name='event_type' class='form-control'>";

                            foreach ($result as $row) {
                                //echo "<option value='" . $row->event_type . "'>" . $row->event_type . "</option>";
                                echo "<option value='$row->id'>$row->event_type</option>";
                            }
                            echo "</select>";
                            ?>
                            <?php echo form_error('event_type'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-4">

                            <textarea id="description" type="text" name="description"  value=""  type="text" class="form-control" id="description" placeholder=""><?php
                                if (isset($succ_message)) {
                                    echo '';
                                } else {
                                    echo set_value('description');
                                }
                                ?></textarea>
                            <?php echo form_error('description'); ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">In Charge ID</label>
                        <div class="col-sm-4">
                            <input id="in_charge" type="text" name="in_charge"  value="<?php echo $nic; ?>" type="text" readonly class="form-control" id="in_charge" placeholder="eg : xxxxxxxxxV">
                            <?php echo form_error('in_charge'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Budget(Rs.)</label>
                        <div class="col-sm-4">
                            <input id="budget" type="text" name="budget"  value="<?php
                            if (isset($succ_message)) {
                                echo '';
                            } else {
                                echo set_value('budget');
                            }
                            ?>" type="text" class="form-control" id="budget" placeholder="Budget Rs.">
                                   <?php echo form_error('budget'); ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">Start Date</label>
                        <div class="col-sm-4">

                            <input id="start_date" type="date" name="start_date"  value="<?php
                            if (isset($succ_message)) {
                                echo '';
                            } else {
                                echo set_value('start_date');
                            }
                            ?>"  type="date" class="form-control" id="start_date" placeholder="">
                                   <?php echo form_error('start_date'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Start Time</label>
                        <div class="col-sm-4">

                            <input id="start_time" type="time" name="start_time"  value="<?php
                            if (isset($succ_message)) {
                                echo '';
                            } else {
                                echo set_value('start_time');
                            }
                            ?>" type="time" class="form-control" id="start_time" placeholder="">
                                   <?php echo form_error('start_time'); ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">End Date</label>
                        <div class="col-sm-4">

                            <input id="end_date" type="date" name="end_date"  value="<?php
                            if (isset($succ_message)) {
                                echo '';
                            } else {
                                echo set_value('end_date');
                            }
                            ?>" type="date" class="form-control" id="end_date" placeholder="">
                                   <?php echo form_error('end_date'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">End Time</label>
                        <div class="col-sm-4">

                            <input id="end_time" type="time" name="end_time"  value="<?php
                            if (isset($succ_message)) {
                                echo '';
                            } else {
                                echo set_value('end_time');
                            }
                            ?>" type="time" class="form-control" id="end_time" placeholder="">
                                   <?php echo form_error('end_time'); ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">*Location</label>
                        <div class="col-sm-4">
                            <input id="location" type="text" name="location"  value="<?php
                            if(isset($succ_message)){
                                echo '';
                            }else{
                                echo set_value('location');
                            } ?>" type="text" class="form-control" id="location" placeholder="Location">
                            <?php echo form_error('location'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Special Guest</label>
                        <div class="col-sm-4">
                            <input id="guest" type="text" name="guest"  value="" type="text" class="form-control" id="guest" placeholder="Special Guest">
                            <?php echo form_error('guest'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-raised btn-primary" value="Submit">
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>

                </div>
            </div>
            <a name="eventrequest"></a>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>EVENT REQUEST STATUS</strong>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Event Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($details as $row) { ?>


                                <tr>
                                    <td><?php echo $row->title; ?></td>
                                    <td><?php echo $row->start_date; ?></td>
                                    <td><?php echo $row->end_date; ?></td>
                                    <?php
                                    if ($row->status == "pending") {
                                        echo "<td><span class='label label-primary'>" . $row->status . "</span></td>" . PHP_EOL;
                                    } else if ($row->status == "approved") {
                                        echo "<td><span class='label label-success'>" . $row->status . "</span></td>" . PHP_EOL;
                                    } else {
                                        echo "<td><span class='label label-danger'>" . $row->status . "</span></td>" . PHP_EOL;
                                    }
                                    ?>

                                </tr>
                            <?php } ?>
                            <tr>
                                <td>No More records</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>

</div>
