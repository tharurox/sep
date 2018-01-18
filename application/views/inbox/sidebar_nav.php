<div class="panel-group" id="accordion">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                    </span>Messages Inbox</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <i class="fa fa-pencil-square-o text-warning"></i>&nbsp;
                            <a href="<?php echo base_url('index.php/inbox/compose'); ?>">
                                Compose Message
                            </a>
                        </td>
                    </tr>
                    <!--<tr>
                        <td>
                            <i class="fa fa-paper-plane-o text-warning"></i>&nbsp;<a href="<?php echo base_url('index.php/inbox/sent'); ?>">Sent Messages</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-inbox text-warning"></i>&nbsp;<a href="<?php echo base_url('index.php/inbox/received'); ?>">Received Messages</a>
                        </td>
                    </tr>-->
                    <tr>
                        <td>
                            <i class="fa fa-pencil-square-o text-warning"></i>&nbsp;
                            <a href="<?php echo base_url('index.php/inbox/'); ?>">
                                Conversations
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
