<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('attendance/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <?php if (isset($del_msg)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $del_msg; ?>
                </div>
            <?php } ?>


            <div class="panel panel-info">
                <div class="panel-heading">Daily Attendance Record</div>
                <div class="panel-body">
                    <div class="row" style="margin-left: 1em; margin-bottom: 2em;">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo base_url("assets/img/info_ico.png"); ?>" width="64px" height="64px">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Recording Attendance for <?php echo $date; ?></h4>
                                Enter the list of signature numbers of teachers present today and use "Generate Report" to get
                                today's attendance report.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-5">
                                <?php
                                $attributes = array(
                                    'class' => 'form-inline'
                                );

                                echo form_open('attendance', $attributes);
                                ?>
                                <div class="form-group">
                                    <input type="text" id="signature_no" name="signature_no" class="form-control" placeholder="Signature No" size="15">
                                </div>
                                <button type="submit" class="btn btn-raised btn-success" ><i class="fa fa-check-square-o"></i></button>
                                <?php echo form_close(); ?>
                            </div>
                            <div class="col-md-3">
                                <a href="<?php echo base_url("index.php/attendance/generate_report"); ?>"><button class="btn btn-raised btn-primary">Generate Report</button></a>
                            </div>
                        </div>
                        <table class="table table-hover" style="margin-top: 1em;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Signature No</th>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->id; ?></td>
                                        <td><?php echo $row->signature_no; ?></td>
                                        <td><?php echo $row->name_with_initials; ?></td>
                                        <td><a type="button" class="btn btn-raised btn-danger" href="<?php echo base_url("index.php/attendance/delete_record/" . $row->signature_no); ?>">Delete</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
