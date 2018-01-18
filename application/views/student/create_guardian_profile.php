<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php $this->view('student/sidebar_nav'); ?>
        </div>

        <div class="col-md-9">
            <div class="progress" style="border: ">
                <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                    80% Complete (success)
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <b>STUDENT REGISTRATION / Personal Details -> Guardian Details > System Profile</b>
                </div>
                <div class="panel-body">
                    <?php echo form_open_multipart('student/guardian_profile'); ?>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center">
                                <label for="profile-img">Profile image</label>
                                <br />
                                <img src="" id="profile-img" class="img-thumbnail profile-img">
                                <br>
                                <span class="btn btn-raised btn-default btn-file">
                                    Upload Image<input type="file" name="profile_img" id="img-inp" onchange="readURL(this);">
                                </span>
                            </div>

                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information" >
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
<!--                                                    <a href="<?php echo base_url('index.php/teacher/check_profile' . "/" . $user_id); ?>" class="btn btn-success">Skip Now</a>-->
                                                    <button type="reset" class="btn btn-raised btn-primary">Reset</button>
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
