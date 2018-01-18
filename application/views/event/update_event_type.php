<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php
            if($user_type == 'A'){
                $this->view('event/admin_sidebar_nav');
            }
            else{
                $this->view('event/sidebar_nav_teacher');
            }

            ?>
        </div>

        <div class="col-md-9">
            <?php if (isset($succ_message)) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $succ_message; ?>
            </div>
            <?php } ?>
            <?php if (isset($err_message)) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $err_message; ?>
            </div>
            <?php } ?>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Update Event Type</strong>
                </div>
                <div class="panel-body">
                    <?php
                    // Change the css classes to suit your needs

                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('event/update_event_type'."/".$details->id, $attributes);
                    ?>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="<?php echo base_url("assets/img/info_ico.png"); ?>" width="64px" height="64px">
                            </a>
                        </div>
                        <div class="media-body">
                            <br>
                            <strong>Currently this event is running on this system. You can edit this event</strong>
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Event Type</label>
                        <div class="col-sm-5">
                            <input id="event_type" type="text" name="event_type"  value="<?php echo $details->event_type; ?>" type="text" class="form-control" id="event_type" placeholder="Event Name">
                            <?php echo form_error('event_type'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-5">

                            <textarea id="description" type="text" name="description" type="text" class="form-control" id="description" placeholder=""><?php echo $details->description; ?></textarea>
                            <?php echo form_error('description'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-raised btn-success" value="Update">
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
