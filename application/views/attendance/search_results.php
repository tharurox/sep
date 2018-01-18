<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('attendance/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Attendance Report</div>
                <div class="panel-body">
                    <h3>Attendance Report for: <?php echo $date; ?></h3>
                    <p>
                        <a href="<?php echo base_url('index.php/attendance/search_report_pdf') . "/" . $date ; ?>">
                            <button class="btn btn-success">DOWNLOAD PDF</button>
                        </a>
                    </p>
                    <table class="table table-hover">
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
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                </div>

            </div>
        </div>
    </div>
</div>
