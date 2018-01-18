<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('attendance/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <div class="row" style="margin-left: 1em; margin-bottom: 2em;">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="<?php echo base_url("assets/img/info_ico.png"); ?>" width="64px" height="64px">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Attendance for <?php echo $date; ?></h4>
                        Check twice before you confirm this system generated report. Once confirmed, it cannot be changed our system will generate pdf reports you may download in next step. Please note that it may take few minutes to process all the records to the database.

                    </div>
                </div>
            </div>
            <div class="row" style="margin-left: 1em; margin-bottom: 2em;">
                <a href="<?php echo base_url('index.php/attendance/confirm'); ?>"><button class="btn btn-primary btn-raised">Confirm</button></a>
            </div>
            <div class="row">
                <ul class="nav nav-tabs" style="margin-bottom: 0x;">
                    <li class="active"><a href="#present">Present List</a></li>
                    <li><a href="#absent">Absent List</a></li>
                </ul>
                <div class="tab-content" style="margin-top: 0px;">
                    <div id="present" class="tab-pane fade in active">
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#att-table1').DataTable();
                                $('#att-table2').DataTable();
                            });
                        </script>
                        <div class="table-wrapper">
                            <table id="att-table1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Signature No</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row) { ?>
                                        <tr>
                                            <td><?php echo $row->id; ?></td>
                                            <td><?php echo $row->signature_no; ?></td>
                                            <td><?php echo $row->name_with_initials; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div id="absent" class="tab-pane fade">
                        <div class="table-wrapper">
                            <table id="att-table2" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Signature No</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($absent_list as $row) { ?>
                                        <tr>
                                            <td><?php echo $row->id; ?></td>
                                            <td><?php echo $row->signature_no; ?></td>
                                            <td><?php echo $row->name_with_initials; ?></td>
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
</div>

<script>
    $(document).ready(function () {
        $(".nav-tabs a").click(function () {
            $(this).tab('show');
        });
    });
</script>
