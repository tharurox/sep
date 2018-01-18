<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('admin/sidebar_nav_notes'); ?>
        </div>
        <div class="col-md-9">
            <?php if (isset($delete_msg)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $delete_msg; ?>
                </div>
            <?php } ?>
            <?php
            $attributes = array(
                'class' => 'form-inline'
            );
            ?>
            <div class="panel panel-info">
                <div class="panel-heading">Administrator Accounts</div>
                <div class="panel-body">
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#admin-user-table').DataTable();
                        });
                    </script>
                    <table id="admin-user-table" class="table table-hover" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <td><strong>ID&nbsp;&nbsp;</strong></td>
                                <td><strong>Admission No</strong></td>
                                <td><strong>Class</strong></td>
                                <td><strong>Contact Home</strong></td>
                                <td><strong>Type</strong></td>
                                <td><strong>subject</strong></td>
                                <td><strong>note</strong></td>
                                <td><strong>Action Status</strong></td>
                                <td>Take Action&nbsp;</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($result)){
                            foreach ($result as $row) { ?>
                                <tr>
                                    <td><?php echo $row->id; ?></td>
                                    <td><?php echo $row->admission_no; ?></td>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->contact_home; ?></td>
                                    <td><?php $type = $row->type; if($type==1){echo '<span style="color:blue">Note</span>';}else{echo '<span style="color:red">Complain</span>'; } ?></td>
                                    <td><?php echo $row->subject; ?></td>
                                    <td><?php echo $row->note; ?></td>
                                    <td><?php $status = $row->status; if($status==0){echo '<span style="color:red">pending</span>';}else{echo '<span style="color:green">action taken</span>'; }?></td>
                                    <td> <?php if($status == 0){ ?>
                                        <a href="<?php echo base_url("index.php/student/note_action") . "/" . $row->id; ?>" data-toggle="tooltip" title="take action"><i class="fa fa-exclamation-circle" style="font-size: 22px;" ></i></a>&nbsp;
                                    <?php } else { echo '<istyle="font-size: 12px;" >done</i>';}?>
                                    </td>
                                </tr>
                            <?php } }?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $("[data-toggle='tooltip']").tooltip();
    });
</script>

<script>
  $('.delete-user').click(function() {
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
