<?php
$error_prefix = "<p class=\"help-block error\">";
$error_suffix = "</p>"
?>

<div class="container ">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('inbox/sidebar_nav'); ?>
        </div>
        <div class="col-md-9 inbox">
            <?php foreach ($conversations as $conversation) { ?>
                <?php $other_user = get_other_user($conversation->conversation_id, $this->session->userdata('id')); ?>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="thumbnail">
                            <a href="<?php echo base_url("index.php/inbox/read/{$conversation->conversation_id}"); ?>">
                                <img class="img-responsive user-photo" src="
                                     <?php echo (user_img_url($other_user) == "" ? base_url('assets/img/profile_placeholder.png') :  user_img_url($other_user)); ?>
                                     ">
                            </a>
                        </div><!-- /thumbnail -->
                    </div><!-- /col-sm-1 -->

                    <div class="col-sm-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="<?php echo base_url("index.php/inbox/read/{$conversation->conversation_id}"); ?>">
                                    <strong><?php echo $conversation->subject; ?></strong><br />
                                </a>
                                <span class="text-muted"><?php echo full_name($other_user); ?></span>
                            </div>
                            <div class="panel-body">
                                <?php echo last_message($conversation->conversation_id); ?>
                            </div><!-- /panel-body -->
                            <div class="panel-footer text-right">
                                <?php echo date('l jS \of F Y h:i:s A', strtotime($conversation->last_updated_time)); ?>
                            </div>
                        </div><!-- /panel panel-default -->
                    </div><!-- /col-sm-5 -->
                    <div class="col-sm-1">
                        <a href="#" data-convo-id="<?php echo $conversation->conversation_id; ?>" class="btn btn-default delete-convo"><i class="fa fa-trash-o"></i></a>
                    </div><!-- /col-sm-1 -->
                </div><!-- /row -->
            <?php } ?>
        </div>
    </div>
</div>

<script>
    $('.delete-convo').click(function () {
        var userId = $(this).attr("data-convo-id");
        deleteUser(userId);
    });

    function deleteUser(userId) {
        swal({
            title: "Are you sure?",
            text: "Are you sure that you want to delete this conversation?",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes, delete it!",
            confirmButtonColor: "#ec6c62"
        }, function () {
            window.location.href = "<?php echo base_url("index.php/inbox/delete"); ?>" + "/" + userId;
        });


    }

</script>