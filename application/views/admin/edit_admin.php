<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('admin/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">Edit Account</div>
                <div class="panel-body">
                    <div class="col-md-3">
                        <img src="<?php echo $user->profile_img; ?>" id="profile-img" class="img-thumbnail profile-img">
                    </div>
                    <div class="col-md-6">
                        <?php
                        $error_prefix = "<p class=\"help-block error\">";
                        $error_suffix = "</p>"
                        ?>
                        <!-- Open form to edit admin -->
                        <?php echo form_open("admin/edit/{$user->id}"); ?>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo $user->username; ?>" disabled>
                            <?php echo form_error('username', $error_prefix, $error_suffix); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="">
                            <?php echo form_error('email', $error_prefix, $error_suffix); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="username" class="form-control" value="<?php echo $user->email; ?>">
                            <?php echo form_error('email', $error_prefix, $error_suffix); ?>
                        </div>
                        <button type="submit" class="btn btn-raised btn-success">Edit</button>
                        <a href="#" id="delete-user" data-user-id="<?php echo $user->id; ?>" class="btn btn-raised btn-danger">Delete</a>
                        <a href="<?php echo base_url('index.php/admin/manage_admins'); ?>" class="btn btn-raised btn-default">Cancel</a>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $('#delete-user').click(function() {
    var userId = $(this).attr("data-user-id");
    deleteUser(userId);
  });

  function deleteUser(userId) {
    swal({
      title: "Are you sure?",
      text: "Are you sure that you want to delete this user?",
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, delete it!",
      confirmButtonColor: "#ec6c62"
    }, function() {
        window.location.href = "<?php echo base_url("index.php/admin/delete"); ?>" + "/" + userId;
    });


  }

  </script>
