<div class="panel-group" id="accordion">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-folder-close">
                    </span>Teacher Attendance</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-user text-primary"></span><a href="<?php echo base_url('index.php/attendance'); ?>">Record Attendance</a>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
     <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                    </span>Student Attendance</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                             <span class="glyphicon glyphicon-user text-primary"></span><a href="<?php echo base_url('index.php/attendance/load_students'); ?>">Record Attendance</a>
                        </td>
                    </tr>
<!--                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-star text-warning"></span><a href="<?php// echo base_url('index.php/#'); ?>">Leave Status</a>
                        </td>
                    </tr>-->
                </table>
            </div>
        </div>
    </div>
</div>
