<?php
$error_prefix = "<p class=\"help-block error\">";
$error_suffix = "</p>"
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('inbox/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Compose a New Message</div>
                <div class="panel-body">
                    <?php $attributes =  array('class' => 'form-horizontal');  ?>
                    <?php echo form_open('', $attributes); ?>
                    
                        <fieldset>

                            <!-- Select Basic -->
                            <div class="form-group">

                                <div class="col-md-6">
                                    <select id="to_user" name="to_user" class="form-control">
                                        <option value="0">Select User</option>
                                        <?php $users = get_users_list(); ?>
                                        <?php foreach ($users as $user) { ?>
                                            <?php
                                            if ($user->id == $this->session->userdata('id')) {
                                                continue;
                                            }
                                            ?>
                                            <option 
                                                value="<?php echo $user->id; ?>" 
                                                <?php if($user->id == $to_user) { echo "selected"; } ?>
                                            >
                                                <?php echo $user->first_name . " " . $user->last_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('to_user', $error_prefix, $error_suffix); ?>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">

                                <div class="col-md-12">
                                    <input id="subject" name="subject" type="text" placeholder="Enter Subject" class="form-control input-md">
                                    <?php echo form_error('subject', $error_prefix, $error_suffix); ?>
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">

                                <div class="col-md-12">                     
                                    <textarea class="form-control" id="content" name="content" placeholder="Enter your message" rows="10"></textarea>
                                    <?php echo form_error('content', $error_prefix, $error_suffix); ?>
                                </div>
                            </div>

                            <!-- Button (Double) -->
                            <div class="form-group">

                                <div class="col-md-12">
                                    <button type="submit" id="send" name="send" class="btn btn-success">Send</button>
                                    <a href="<?php echo base_url("index.php/inbox/"); ?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>

                        </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>