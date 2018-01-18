<div class="panel-group" id="accordion">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-download"></i>
                    Backups Managment</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicons glyphicons-disk-save"></span><a href="<?php echo base_url('index.php/backup/create'); ?>">Create Backups</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicons glyphicons-disk-open"></span><a href="<?php echo base_url('index.php/backup/restore'); ?>">Restore Backups</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
