<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('teacher/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <div class="row">
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
            </div>
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#example').DataTable();
                            });
                        </script>
                        <table id="example" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row) { ?>
                            <tr>
                                <td><?php echo $row->name_with_initials; ?></td>
                                <td><?php echo $row->user_id; ?></td>
                                <td>
                                <a href="<?php echo base_url("index.php/teacher/viewSalaryRequest")."?key=". $row->id;?>" class="btn btn-raised btn-primary btn-xs" aria-hidden="true"><i class="fa fa-eye"></i></a>

                               <a id="accept-user" data-user-id="<?php echo $row->id; ?>" class="btn btn-raised btn-primary btn-xs app" aria-hidden="true"><i class="fa fa-trash"></i></a>
                               

                                <a id="delete-user" data-user-id="<?php echo $row->user_id; ?>" class="btn btn-raised btn-danger btn-xs del" aria-hidden="true"><i class="fa fa-trash"></i></a></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
  $('.del').click(function() {
    var userId = $(this).attr("data-user-id");
    deleteUser(userId);
  });


    $('.app').click(function() {
    var userId = $(this).attr("data-user-id");
    approveUser(userId);
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
        window.location.href = "<?php echo base_url("index.php/teacher/archive_teacher") ?>" + "/" + userId;
    });


  }



  function approveUser(userId) {

    swal({
      title: "Are you sure?",
      text: "Are you sure that you want approve this teacher?",
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, Approve! ?",
      confirmButtonColor: "#32CD32"
    }, function() {
        window.location.href = "<?php echo base_url("index.php/teacher/approve_teacher") ?>" + "/" + userId;
    });


  }

  </script>
