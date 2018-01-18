<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('profile/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">Profile Settings</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <?php echo form_open_multipart('profile/update_profile'); ?>
                        <div class="fom-group img-submit">
                            <label for="profile-img">Profile image</label>
                            <br />
                            <?php $user_id= $this->session->userdata('id'); ?>
                            <img src="<?php echo $profile_image; ?>" id="profile-img" class="img-thumbnail profile-img">
                            <span class="btn btn-raised btn-default btn-file">
                            <span class="btn btn-raised btn-success btn-file">
                                Upload new picture<input type="file" name="profile_img" id="img-inp" onchange="readURL(this);">
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $first_name; ?>">
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $last_name; ?>">
                            <p class="help-block"></p>
                        </div>
                        <input type="submit" class="btn btn-raised btn-success" value=" Submit ">
                        <input type="submit" class="btn btn-raised btn-primary" value=" Submit ">
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profile-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imp-inp").change(function() {
        readURL(this);
    });
</script>
