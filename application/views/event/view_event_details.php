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
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>VIEW EVENT</strong>
                </div>
                <div class="panel-body">
                    <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('event/edit_approved_event' . "/" . $details->id, $attributes);
                    ?>

                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td width="25%"><label>Event Name</label></td>
                                <td width="75%"><?php echo $details->title; ?></td>
                            </tr>
                            <tr>
                                <td><label>Event Type</label></td>
                                <td><?php echo $details->event_type; ?></td>
                            </tr>
                            <tr>
                                <td><label>Description</label></td>
                                <td><?php echo $details->description; ?></td>
                            </tr>
                            <tr>
                                <td><label>In Charge ID</label></td>
                                <td><?php echo $details->in_charge_id; ?></td>
                            </tr>
                            <tr>
                                <td><label>Budget(Rs.)</label></td>
                                <td><?php echo $details->budget; ?></td>
                            </tr>
                            <tr>
                                <td><label>Start Date</label></td>
                                <td><?php echo $details->start_date; ?></td>
                            </tr>
                            <tr>
                                <td><label>Start Time</label></td>
                                <td><?php echo $details->start_time; ?></td>
                            </tr>
                            <tr>
                                <td><label>End Date</label></td>
                                <td><?php echo $details->end_date; ?></td>
                            </tr>
                            <tr>
                                <td><label>End Time</label></td>
                                <td><?php echo $details->end_time; ?></td>
                            </tr>
                            <tr>
                                <td><label>Location</label></td>
                                <td><?php echo $details->location; ?></td>
                            </tr>
                            <tr>
                                <td><label>Special Guest</label></td>
                                <td><?php echo $details->guest; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php if((($details->status == 'approved') && ($details->end_date >= date('Y-m-d')) && ($valid_nic == $details->in_charge_id))  || ( ($this->session->userdata['user_type']) == 'A' )) {?>
                    <div class="form-group">
                        <div class="col-sm-offset-0 col-sm-10">
                            <input type="submit" class="btn btn-raised btn-primary" value="Edit" style="width: 200px">
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

        </div>

    </div>

</div>
