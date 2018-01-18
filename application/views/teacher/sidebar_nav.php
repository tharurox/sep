<div class="panel-group" id="accordion">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                    </span>Teachers</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-user text-primary"></span><a href="<?php echo base_url('index.php/teacher'); ?>">Teachers List</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-cog text-primary"></span><a href="<?php echo base_url('index.php/teacher/create'); ?>">Create Teacher</a>
                        </td>
                    </tr>
<!--                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-picture text-primary"></span><a href="<?php echo base_url('index.php/teacher/create_profile'); ?>">Create Teacher Profile</a>
                        </td>
                    </tr>-->
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-check text-primary"></span><a href="<?php echo base_url('index.php/teacher/teacher_report')."/"."0"; ?>">Teacher Report</a>
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <span class="glyphicon glyphicon-briefcase text-primary"></span><a href="<?php echo base_url('index.php/teacher/full_staff_report'); ?>" target="_blank">Staff Full Report</a>
                        </td>   

                    </tr>
                          <tr>
                        <td>
                            <span class="glyphicon glyphicon-pencil text-primary"></span><a href="<?php echo base_url('index.php/teacher/custom_list'); ?>">Customized Teacher List</a>
                        </td>
                        
                    </tr>
                       <?php if ($this->session->userdata('user_type') == "A" ){  ?> 
                        <tr>
                        <td>

                            <span class="glyphicon glyphicon-plus text-primary"></span><a href="<?php echo base_url('index.php/teacher/load_teachr_to_Approve'); ?>">Approve Teacher</a>
                        </td>   

                    </tr>
                        <tr>
                        <td>

                            <span class="glyphicon glyphicon-check text-primary"></span><a href="<?php echo base_url('index.php/teacher/approveSalarySheet'); ?>">View Salary Sheet Requests</a>
                        </td>   

                    </tr>
                    <?php  } ?>
                </table>
            </div>
        </div>
    </div>
</div>
