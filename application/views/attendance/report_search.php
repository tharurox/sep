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
            <div class="panel panel-info">
                <div class="panel-heading">Attendance Report Search</div>
                <div class="panel-body">
                    <div class="row" style="margin-left: 1em;">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo base_url("assets/img/info_ico.png"); ?>" width="64px" height="64px">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Searching for Attendance Reports</h4>
                                Select the date you want to get attendance records and click search.
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 1em; margin-left: 1em;">
                        <?php
                        $attributes = array(
                            'class' => 'form-inline'
                        );

                        echo form_open('attendance/reports', $attributes);
                        ?>
                        <div class="form-group">
                            <input type="date" id="date" name="date" class="form-control" placeholder="Select Date" size="15">
                        </div>
                        <button type="submit" class="btn btn-raised btn-success" ><i class="fa fa-check-square-o"></i></button>
                            <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
