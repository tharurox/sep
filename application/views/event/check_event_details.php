<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php
            if($user_type == 'A'){
                $this->view('event/admin_sidebar_nav');
            }else{
                $this->view('event/sidebar_nav_teacher');
            }

            ?>
        </div>

        <div class="col-md-9">
            <?php if ($this->session->flashdata('succ')) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('succ'); ?>
            </div>
            <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Pending Events</strong>
                </div>
                <div class="panel-body">
                    <?php
                        if(count($details) == 0){ ?>
                            <div class="col-md-12 col-md-offset-* text-center">
                                <div class="well well-lg">
                                    <i class="fa fa-exclamation-triangle fa-5x"></i>
                                    <div class="">
                                        <h2>No Pending Events</h2>
                                    </div>
                                </div>
                            </div>
                      <?php  }else{ ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="60%">Event Name</th>
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
                                    <td><a href="<?php echo base_url("index.php/event/load_selected_pending_event") . "/" . $row->id; ?>" class="btn btn-raised btn-primary btn-xs" aria-hidden="true"><i class="fa fa-eye"></i></a></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php  } ?>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Canceled Events </strong>
                </div>
                <div class="panel-body">
                    <?php
                        if(count($cancel) == 0){ ?>
                            <div class="col-md-12 col-md-offset-* text-center">
                                <div class="well well-lg">
                                    <i class="fa fa-exclamation-triangle fa-5x"></i>
                                    <div class="">
                                        <h2>No Canceled Events</h2>
                                    </div>
                                </div>
                            </div>
                      <?php  }else{ ?>
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="60%">Event Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cancel as $row) { ?>
                            <tr>
                                <td><?php echo $row->title; ?></td>
                                <td><?php echo $row->start_date; ?></td>
                                <td><?php echo $row->end_date; ?></td>
                                <td><a href="<?php echo base_url("index.php/event/view_upcoming_event_details") . "/" . $row->id; ?>" class="btn btn-raised btn-primary btn-xs" aria-hidden="true"><i class="fa fa-eye"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php  } ?>

                </div>
            </div>
        </div>

    </div>

</div>
