<div class="panel-group" id="accordion">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                    </span>Sports</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-asterisk text-primary"></span><a href="<?php echo base_url('index.php/sports'); ?>">Add Sports</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-expand text-primary"></span><a href="<?php echo base_url('index.php/sports/assign_leaders'); ?>">Assign Leaders</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-book text-warning"></span><a href="<?php echo base_url('index.php/sports/assign_students'); ?>">Assign Students</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-bookmark"></span><a href="<?php echo base_url('index.php/sports/management_details'); ?>">Assign Management Details</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
