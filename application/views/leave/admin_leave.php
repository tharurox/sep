<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php
            if($user_type == 'A'){
                $this->view('leave/admin_sidebar');
            }
            elseif($user_type == 'T'){
                $this->view('leave/teacher_sidebar');
            }
            else{
                $this->view('leave/teacher_sidebar');
            }

            ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>PENDING LEAVES</strong>
                </div>
                <div class="panel-body">
                        <div class="comments-list">
                            <?php
                            if(count($admin_pending_list) == 0){ ?>
                                <div class="col-md-12 col-md-offset-* text-center">
                                   <div class="well well-lg">
                                        <i class="fa fa-exclamation-triangle fa-5x"></i>
                                        <div class="">
                                          <h2>No Pending Leaves</h2>
                                        </div>
                                   </div>
                                </div>

                            <?php
                            }else{
                                foreach ($admin_pending_list as $row) {
                                    echo "<div class='media' style='background-color: #FFF59D;'>". PHP_EOL;
                                    echo "<p class='pull-right'>".$row->applied_date."</p>". PHP_EOL; ?>
                                        <a class='media-left s' href='<?php echo base_url('index.php/leave/get_leave_details/'.$row->id); ?>'>
                                        <img class='thumbnail'  height='60' width='60' src='<?php echo base_url("assets/img/teacher_icon.png"); ?>'>
                                <?php
                                    echo "</a>". PHP_EOL;
                                    echo "<div class='media-body'>". PHP_EOL; ?>
                                        <a class='media-left s' href='<?php echo base_url('index.php/leave/get_leave_details/'.$row->id); ?>'>
                                <?php
                                    echo "<h3 class='media-heading user_name'>".$row->full_name."</h3></a>". PHP_EOL;
                                    echo $row->reason. PHP_EOL;
                                    echo "<p><b>Start Date - </b>".$row->start_date." "."<b>Duty Resuming Date - </b>".$row->end_date."</p>". PHP_EOL;
                                    echo "</div>". PHP_EOL;
                                    echo "</div>". PHP_EOL;
                                }
                            }
                            ?>
                            </div>
                        </div>

                </div>

                <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>PENDING SHORT LEAVES</strong>
                </div>
                <div class="panel-body">
                        <div class="comments-list">
                            <?php
                            if(count($admin_pending_short_list) == 0){ ?>
                                <div class="col-md-12 col-md-offset-* text-center">
                                   <div class="well well-lg">
                                        <i class="fa fa-exclamation-triangle fa-5x"></i>
                                        <div class="">
                                          <h2>No Pending Short Leaves</h2>
                                        </div>
                                   </div>
                                </div>

                            <?php
                            }else{
                                foreach ($admin_pending_short_list as $row) {
                                    echo "<div class='media' style='background-color: #90CAF9;'>". PHP_EOL;
                                    echo "<p class='pull-right'>".$row->applied_date."</p>". PHP_EOL; ?>
                                        <a class='media-left s' href='<?php echo base_url('index.php/leave/get_short_leave_details/'.$row->id); ?>'>
                                        <img class='thumbnail'  height='60' width='60' src='<?php echo base_url("assets/img/teacher_icon.png"); ?>'>
                                <?php
                                    echo "</a>". PHP_EOL;
                                    echo "<div class='media-body'>". PHP_EOL; ?>
                                        <a class='media-left s' href='<?php echo base_url('index.php/leave/get_short_leave_details/'.$row->id); ?>'>
                                <?php
                                    echo "<h3 class='media-heading user_name'>".$row->full_name."</h3></a>". PHP_EOL;
                                    echo $row->reason. PHP_EOL;
                                    echo "<p><b>Date - </b>".$row->date."</p>". PHP_EOL;
                                    echo "</div>". PHP_EOL;
                                    echo "</div>". PHP_EOL;
                                }
                            }
                            ?>
                            </div>
                        </div>

                </div>
            </div>
        </div>
</div>
