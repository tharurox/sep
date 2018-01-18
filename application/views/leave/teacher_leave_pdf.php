
<div class="center">
<img src="<?php echo base_url('assets/img/dslogo.jpg'); ?>" width="128px" height="128px" style="margin-left: 19em">
<h3 style="margin-bottom: 0; margin-left: 14em"><?php echo $school_name; ?></h3>
<h3 style="margin-top: 0; margin-left: 14em">Individual Leave Report</h3>
<div class="row" style="margin-left: 5em">
<?php
    foreach ($teacher_details as $row) {
?>
<div class="row">
    <div class="col-md-6">
        <h2><?php echo $row->full_name ?></h2>
        <h4>NIC No : <?php echo $row->nic_no ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <h4>Signature No : <?php echo $row->signature_no ?></h4>
    </div>
    <div class="col-md-4">
        <h4>Serial No : <?php echo $row->serial_no ?></h4>
    </div>
    <div class="col-md-4">
        <h4>Registration No : <?php echo $row->teacher_register_no ?></h4>
    </div>
</div>
<?php
    }
?>
<div class="row">
    <div class="col-md-12 col-md-offset-*">
        <table class="table table-bordered">
            <thead>
                <tr align="center">
                    <th></th>
                    <th>Leave Type</th>
                    <th>Applied Date</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>No Days</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                                        foreach ($applied_leaves as $row) {
                                            echo "<tr align='center'>" . PHP_EOL;
                                            echo "<td scope='row'><span class='glyphicon glyphicon-folder-close'></span></td>";
                                            echo "<td>" . $row->name . "</td>" . PHP_EOL;
                                            echo "<td>" . $row->applied_date . "</td>" . PHP_EOL;
                                            echo "<td>" . $row->start_date . "</td>" . PHP_EOL;
                                            echo "<td>" . $row->end_date . "</td>" . PHP_EOL;
                                            echo "<td>" . $row->no_of_days . "</td>" . PHP_EOL;



                                            if ($row->status == "Pending") {
                                                echo "<td><span class='label label-primary'>" . $row->status . "</span></td>" . PHP_EOL;
                                            } elseif ($row->status == "Approved") {
                                                echo "<td><span class='label label-success'>" . $row->status . "</span></td>" . PHP_EOL;
                                            } else {
                                                echo "<td><span class='label label-danger'>" . $row->status . "</span></td>" . PHP_EOL;
                                            }
                                            echo "</tr>" . PHP_EOL;
                                        }
                                        ?>
            </tbody>
        </table>
    </div>
</div>

</div>
</div>
