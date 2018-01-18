<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('attendance/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
        <div class="row">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="<?php echo base_url("assets/img/info_ico.png"); ?>" width="64px" height="64px">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Attendance for <?php echo $date; ?></h4>
                    Attendance for the given date is already recorded in the database. Now you can download system generated documents according to your requirement.
                </div>
            </div>
        </div>
            <div class="row" style="margin-top: 10px;">
            <div class="admin-btn">
                <i class="fa fa-file-pdf-o"></i>
                <a href="<?php echo base_url('index.php/attendance/present_pdf'); ?>">
                    <span class="main">Present List</span>
                    <span class="sub"></span>
                </a>
            </div>
                <div class="admin-btn">
                <i class="fa fa-file-pdf-o"></i>
                <a href="<?php echo base_url('index.php/attendance/absent_pdf'); ?>">
                    <span class="main">Absent List</span>
                    <span class="sub"></span>
                </a>
            </div>
        </div>
    </div>
    </div>

</div>
