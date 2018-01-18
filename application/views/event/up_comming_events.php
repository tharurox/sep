<div class="container">
    <div class="row">

        <div class="col-md-3">
            <?php
            if($user_type == 'A'){
                $this->view('event/admin_sidebar_nav');
            }
            else{
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
                    <strong><?php echo 'View '.$page_title ?></strong>
                </div>
                <div class="panel-body">

                <?php
                        if(count($details) == 0){ ?>
                            <div class="col-md-12 col-md-offset-* text-center">
                                <div class="well well-lg">
                                    <i class="fa fa-exclamation-triangle fa-5x"></i>
                                    <div class="">
                                        <h2>No Events Found</h2>
                                    </div>
                                </div>
                            </div>
                      <?php  }else{ ?>

                    <div class="pull-right">
                        <form class="form-inline">
                            <div class="form-group">
    <label>Sorted By</label>
    <!-- <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe"> -->


                            <select id="event" name="event" class="form-control" onchange="hello()">
<?php
echo $type;
echo '<option value="0">Select Type</option>';
if ($type == 1) {
    echo '<option value="1" selected="selected">All Events</option>';
    echo '<option value="2">Up Coming Events</option>';
    echo '<option value="3">Monthly Events</option>';
    echo '<option value="4">Completed Events</option>';
} elseif ($type == 2) {
    echo '<option value="1">All Events</option>';
    echo '<option value="2" selected="selected">Up Coming Events</option>';
    echo '<option value="3">Monthly Events</option>';
    echo '<option value="4">Completed Events</option>';
} elseif ($type == 3) {
    echo '<option value="1">All Events</option>';
    echo '<option value="2">Up Coming Events</option>';
    echo '<option value="3" selected="selected">Monthly Events</option>';
    echo '<option value="4">Completed Events</option>';
} elseif ($type == 4) {
    echo '<option value="1" selected="selected">All Events</option>';
    echo '<option value="2">Up Coming Events</option>';
    echo '<option value="3">Monthly Events</option>';
    echo '<option value="4" selected="selected">Completed Events</option>';
} else {
    echo '<option value="1">All Events</option>';
    echo '<option value="2">Up Coming Events</option>';
    echo '<option value="3">Monthly Events</option>';
    echo '<option value="4">Completed Events</option>';
}
?>

                            </select>
                            </div>
                        </form>
                    </div>
                    <br>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Event Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
<?php foreach ($details as $row) { ?>


                                <tr>
                                    <td><?php echo $row->title; ?></td>
                                    <td><?php echo $row->start_date; ?></td>
                                    <td><?php echo $row->end_date; ?></td>
                                    <td><a href="<?php echo base_url("index.php/event/view_upcoming_event_details") . "/" . $row->id; ?>" class="btn btn-raised btn-primary btn-xs" aria-hidden="true"><i class="fa fa-eye"></i></a></td>
                                <?php
                                if ($user_type == 'A') {
                                    ?>
                                    <td><a href="<?php echo base_url("index.php/event/edit_approved_event") . "/" . $row->id; ?>" class="btn btn-raised btn-primary btn-xs" aria-hidden="true"><i class="fa fa-edit"></i></a></td>
                                    <td><a href="<?php echo base_url("index.php/event/cancel_event") . "/" . $row->id; ?>" onclick="return confirm('Are you sure you want to cancel this event?');" class="btn btn-raised btn-danger btn-xs" aria-hidden="true"><i class="fa fa-trash"></i></i></a></td>

                                <?php } ?>


                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                    <?php } ?>

                </div>
            </div>
        </div>

    </div>

</div>

<script type="text/javascript">
    function hello() {
        var item = document.getElementById('event').value;
        if (item == 1) {
            window.location = '<?php echo base_url("index.php/event/view_all_events") ?>';
        }
        else if (item == 2) {
            window.location = '<?php echo base_url("index.php/event/view_upcoming_events") ?>';
        }
        else if (item == 3) {
            window.location = '<?php echo base_url("index.php/event/view_monthly_events") ?>';
        }
        else if (item == 4) {
            window.location = '<?php echo base_url("index.php/event/view_completed_events") ?>';
        }
    }

</script>
