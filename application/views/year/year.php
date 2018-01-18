
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php
           if($user_type == 'A'){
               $this->view('year/admin_sidebar_nav');
           }
           else{
               $this->view('leave/teacher_sidebar_nav');
           }

            ?>

        </div>

        <div class="col-md-9">
            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success </strong>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>


            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Academic Details</strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <div class="row">
                            <a class="btn btn-raised btn-primary btn-sm" href='<?php foreach ($current_year as $row1){ echo base_url('index.php/year/view_year/'.$row1->id); } ?>' role="button"><i class="fa fa-calendar"></i> View Year</a>
                            <a class="btn btn-raised btn-primary btn-sm" href='<?php echo base_url('index.php/year/add_academic_year/'); ?>' role="button"><i class="fa fa-plus"></i> Add Year</a>
                            </div>
                        </div>
                    </div>


                        <?php
                            foreach ($current_year as $row)
                            {
                               echo "<div class='row' style='margin-bottom:5px; margin-top:5px;'>";
                               echo "<div class='col-md-6'><b>Name : </b>". $row->name . "</div>";
                               echo "</div>";
                               echo "<div class='row' style='margin-bottom:5px;'>";
                               echo "<div class='col-md-6'><b>Start Date : </b>".$row->start_date . "</div>";
                               echo "<div class='col-md-6'><b>End Date : </b>".$row->end_date . "</div>";
                               echo "</div>";
                               echo "<div class='row' style='margin-bottom:5px;'>";
                               echo "<div class='col-md-6'><b>Term 01 Start Date : </b>".$row->t1_start_date . "</div>";
                               echo "<div class='col-md-6'><b>Term 01 End Date : </b>".$row->t1_end_date . "</div>";
                               echo "</div>";
                               echo "<div class='row' style='margin-bottom:5px;'>";
                               echo "<div class='col-md-6'><b>Term 02 Start Date : </b>".$row->t2_start_date . "</div>";
                               echo "<div class='col-md-6'><b>Term 02 End Date : </b>".$row->t2_end_date . "</div>";
                               echo "</div>";
                               echo "<div class='row' style='margin-bottom:5px;'>";
                               echo "<div class='col-md-6'><b>Term 03 Start Date : </b>".$row->t3_start_date . "</div>";
                               echo "<div class='col-md-6'><b>Term 03 End Date : </b>".$row->t3_end_date . "</div>";
                               echo "</div>";
                            }
                        ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Manage Academic Years</strong>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Starts On</th>
                            <th>Ends on</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_years as $row) {
                                echo "<tr>" . PHP_EOL;
                                echo "<td>" . $row->name . "</td>" . PHP_EOL;
                                echo "<td>" . $row->start_date . "</td>" . PHP_EOL;
                                echo "<td>" . $row->end_date . "</td>" . PHP_EOL;
                                if ($row->status == "1") {
                                    echo "<td><span class='label label-primary'>Active</span></td>". PHP_EOL;
                                } else{
                                    echo "<td><span class='label label-danger'>Inactive</span></td>". PHP_EOL;
                                }

                                echo "<td>". PHP_EOL;
                                ?>
                                    <a href='<?php echo base_url('index.php/year/edit_year/'.$row->id); ?>' class='btn btn-raised btn-success btn-xs'><i class='fa fa-pencil-square-o'></i></a>
                                    <a href='<?php echo base_url('index.php/year/view_year/'.$row->id); ?>' class='btn btn-raised btn-success btn-xs'><i class='fa fa-calendar'></i></a>
                                <?php
                                echo "</td>". PHP_EOL;
                                echo "</tr>" . PHP_EOL;
                          }
                            ?>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

</div>
