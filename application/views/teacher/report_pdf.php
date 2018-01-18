<img src="<?php echo base_url('assets/img/dslogo.jpg'); ?>" width="128px" height="128px" style="margin-left: 19em">
<h3 style="margin-bottom: 0; margin-left: 14em"><?php echo $school_name; ?></h3>
<h5 style="margin-top: 0; margin-left: 14em">Report - 
    <?php
    if ($section == 1) {
        echo "1/5";
    } else if ($section == 2) {
        echo "6/7";
    } else if ($section == 3) {
        echo "8/9";
    } else if ($section == 4) {
        echo "10/11";
    } else if ($section == 5) {
        echo "A/L Science";
    } else if ($section == 6) {
        echo "A/L Commerce";
    } else if ($section == 7) {
        echo "A/L Arts";
    } else {
        echo "";
    }
    ?> Section Teacher List</h5>

<div class="row" style="margin-left: 5em">
    <table class="table table-hover">
        <thead>
            <tr>
                <th align="left" width="150px">Signature No</th>
                <th align="left" width="150px">Name</th>
                <th align="left" width="150px">NIC</th>
                <th align="left" width="150px">Registered Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $row->signature_no; ?></td>
                    <td><?php echo $row->name_with_initials; ?></td>
                    <td><?php echo $row->nic_no; ?></td>
                    <td><?php echo $row->first_appointment_date; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
