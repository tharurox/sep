<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('admin/sidebar_nav'); ?>
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
                        $(document).ready(function () {
                            $('#admin-user-table').DataTable(
                                    {"columnDefs": [ {"targets": 5, "orderable": false} ]}
                                    );
                        });
                    </script>
                    <table id="admin-user-table" class="table table-hover" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <td><strong>ID&nbsp;&nbsp;</strong></td>
                                <td><strong>Username</strong></td>
                                <td><strong>Name</strong></td>
                                <td><strong>Email</strong></td>
                                <td><strong>Last Visit</strong></td>
                                <td>&nbsp;</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row) { ?>
                                <tr>
                                    <td><?php echo $row->id; ?></td>
                                    <td><?php echo $row->username; ?></td>
                                    <td><?php echo $row->first_name . " " . $row->last_name; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo $row->lastvisit_at; ?></td>
                                    <td>
                                        <a href="<?php echo base_url("index.php/profile") . "?key=" . $row->id; ?>" data-toggle="tooltip" title="view"><i class="fa fa-eye" style="font-size: 22px;" ></i></a>&nbsp;
                                        <a href="<?php echo base_url("index.php/admin/edit/{$row->id}"); ?>" data-toggle="tooltip" title="edit"><i class="fa fa-pencil-square-o" style="font-size: 22px;" ></i></a>&nbsp;
                                        <a href="#" class="delete-user" data-user-id="<?php echo $row->id; ?>" data-toggle="tooltip" title="deactivate"><i class="fa fa-toggle-off" style="font-size: 22px;"></i></a>&nbsp;
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("[data-toggle='tooltip']").tooltip();
    });
</script>

<script>
    $('.delete-user').click(function () {
        var userId = $(this).attr("data-user-id");
        deleteUser(userId);
    });

    function deleteUser(userId) {
        swal({
            title: "Are you sure?",
            text: "Are you sure that you want to deactivate this user account?",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes, deactivate it!",
            confirmButtonColor: "#ec6c62"
        }, function () {
            window.location.href = "<?php echo base_url("index.php/admin/delete"); ?>" + "/" + userId;
        });


    }
</script>
