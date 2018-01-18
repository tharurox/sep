<div class="panel-group" id="accordion">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                    </span>Student</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-user text-primary"></span><a href="<?php echo base_url('index.php/student'); ?>">Student List</a>
                        </td>
                    </tr>
                    <?php if($user_type == 'A'){ ?>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-cog text-warning"></span><a href="<?php echo base_url('index.php/student/create_student'); ?>">Create Student</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if($user_type == 'C'){ ?>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-cog text-warning"></span><a href="<?php echo base_url('index.php/princ_approval/create_student'); ?>">Create Student for approve</a>
                        </td>
                    </tr>
                    <?php } ?>
                    
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-check text-primary"></span><a href="<?php echo base_url('index.php/student/load_student_report'); ?>">Student Report</a>
                        </td>
                    </tr>
                    <?php if($user_type == 'A'){ ?>
                       <tr>
                        <td>   
                            <span class="glyphicon glyphicon-check text-primary"></span><a href="<?php echo base_url('index.php/student/ApproveStud'); ?>">Approve Students</a>
                                 
                        </td>
                    </tr>
                    <?php }  ?>
                </table>
            </div>
        </div>
    </div>
</div>
