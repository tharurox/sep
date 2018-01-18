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
                    <strong>Pending Event Details</strong>
                </div>
                <div class="panel-body">
                    <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('event/create_event', $attributes);
                    ?>
                    <br>
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
                                <td><?php echo $details->in_charge_id; ?>
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
                                <td><?php if($details->guest == '') { echo '-No Record-'; }else {echo $details->guest;} ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="form-group">
                        <div class="col-sm-offset-0 col-sm-10">
                            <a href="<?php echo base_url('index.php/event/approve_event/' . $details->id); ?>" class="btn btn-raised btn-success" style="width: 150px">Approve</a>
                            <a href="<?php echo base_url('index.php/event/reject_event/' . $details->id); ?>" class="btn btn-raised btn-danger" style="width: 150px">Reject</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var btnedit = '';
        btnedit = $("#fillgrid");
        btnedit.on('click', function (e) {
            e.preventDefault();
            var editid = $(this).data('id');
            $.colorbox({
                href: "<?php echo base_url() ?>index.php/event/teacher_event_details/" + editid,
                top: 50,
                width: 700,
                onClosed: function () {
                    fillgrid();
                }
            });
        });

    });
</script>
