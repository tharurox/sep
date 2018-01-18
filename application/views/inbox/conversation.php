<?php
$error_prefix = "<p class=\"help-block error\">";
$error_suffix = "</p>"
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('inbox/sidebar_nav'); ?>
        </div>
        <div class="col-md-9 inbox">
            <h3 style="margin-top: 0;"><?php echo $conversation_subject; ?></h3>
            <p><em>- Conversation with <?php echo get_other_user_name($conversation_id, $this->session->userdata('id')); ?></em></p>
            <?php foreach ($conversation as $message) { ?>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="thumbnail">
                            <a href="#">
                                <img class="img-responsive user-photo" src="<?php echo user_img_url($message->sender_id); ?>">
                            </a>
                        </div><!-- /thumbnail -->
                    </div><!-- /col-sm-1 -->

                    <div class="col-sm-11">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong><?php echo full_name($message->sender_id); ?></strong> <span class="text-muted"><?php echo $message->created_time; ?></span>
                            </div>
                            <div class="panel-body">
                                <?php echo $message->content; ?>
                            </div><!-- /panel-body -->
                        </div><!-- /panel panel-default -->
                    </div><!-- /col-sm-5 -->
                </div><!-- /row -->
            <?php } ?>
            <div class="row">
                <div class="col-sm-1">
                    <div class="thumbnail">
                        <a href="#">
                            <img class="img-responsive user-photo" src="<?php echo user_img_url($this->session->userdata('id')); ?>">
                        </a>
                    </div><!-- /thumbnail -->
                </div><!-- /col-sm-1 -->

                <div class="col-sm-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Write a Reply</strong>
                        </div>
                        <div class="panel-body">
                            <?php echo form_open(); ?>
                            <!-- Textarea -->
                            <div class="form-group">
                                <textarea class="form-control" id="reply" name="reply" style="resize: none;"></textarea>
                            </div>
                            <?php echo form_error('reply', $error_prefix, $error_suffix); ?>
                            <button type="submit" class="btn btn-success">Reply</button>
                            <!-- Button -->
                            


                            <?php echo form_close(); ?>
                        </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                </div><!-- /col-sm-5 -->
            </div><!-- /row -->
        </div>
    </div>
</div>