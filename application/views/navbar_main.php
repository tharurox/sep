<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">
            <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> -->
            <a class="navbar-brand" href="#">
              <img src="<?php echo base_url("assets/img/dslogo.png"); ?>" height="50" width="50" alt="">
              </a>
          <p style="margin:7px 0 0;">School Management System </p>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php $msg_count = $this->messages_model->get_unread_count($this->session->userdata['id']); ?>
                <li><a href="#" class="display-tooltip" style="color: #FFF;" >Hello <?php echo $this->session->userdata('first_name'); ?>!</a></li>
                <li><a href="<?php echo base_url('index.php/profile/'); ?>" class="display-tooltip" data-toggle="tooltip" data-placement="bottom" title="Profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
                <li><a href="<?php echo base_url('index.php/inbox'); ?>" class="display-tooltip" data-toggle="tooltip" data-placement="bottom" title="Inbox"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php if($msg_count > 0 ){ ?><span class="badge"><?php echo $msg_count; ?></span><?php } ?></a></li>
                <li><a href="<?php echo base_url('index.php/dashboard/logout'); ?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
