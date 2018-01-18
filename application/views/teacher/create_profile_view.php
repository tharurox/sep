<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php $this->view('teacher/sidebar_nav'); ?>
        </div>

        <div class="col-md-9">
            <?php if (isset($succ_message)) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $succ_message; ?>
                    </div>
                <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <b>CREATE PROFILE</b>
                </div>
                <div class="panel-body">
                    <?php echo form_open_multipart('teacher/create_profile'); ?>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center">
                                <label for="profile-img">Profile image</label>
                                <br />
                                <img src="<?php echo base_url('assets/img/profile_img.png'); ?>" id="profile-img" class="img-thumbnail profile-img">
                                <br>
                                <span class="btn btn-raised btn-default btn-file">
                                    Upload Image<input type="file" name="profile_img" id="img-inp" onchange="readURL(this);">
                                </span>
                                <?php echo form_error('profile_img'); ?>
                            </div>

                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information" >
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Teacher name</label>
                                                <div class="col-sm-5">
                                                    <select id="teachername" name="teachername" class="form-control">
                                                        <?php
                                                        foreach ($users as $row) {
                                                            echo "<option value='$row->id'>$row->full_name</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">User Name</label>
                                                <div class="col-sm-5">
                                                    <input id="username" type="text" name="username"  value="<?php echo set_value('username'); ?>"  type="text" class="form-control" id="username" placeholder="User Name">
                                                    <?php echo form_error('username'); ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                                                <div class="col-sm-5">
                                                    <input id="password" type="password" name="password"  value="<?php echo set_value('password'); ?>"  type="password" class="form-control" id="password" placeholder="Password">
                                                    <?php echo form_error('password'); ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Confirm Password</label>
                                                <div class="col-sm-5">
                                                    <input id="confirm_password" type="password" name="confirm_password"  value="<?php echo set_value('confirm_password'); ?>"  type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                                                    <?php echo form_error('confirm_password'); ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-10">
                                                    <button type="submit" class="btn btn-raised btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-raised btn-sucess">Reset</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

            reader.onload = function (e) {
                $('#profile-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imp-inp").change(function () {
        readURL(this);
    });
</script>
