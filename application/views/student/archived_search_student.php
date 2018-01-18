
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('admin/sidebar_nav'); ?>
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
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#table_id').DataTable();
                    } );
                </script>

                <table class="table table-hover" id="table_id">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Admission No</th>
                            <th>Name</th>
                            <th>Contact No</th>
                            <th>View</th>
<!--                            <th>Edit</th>-->
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($result){foreach ($result as $row) { ?>


                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->admission_no; ?></td> 
                                <td><?php echo $row->name_with_initials; ?></td>
                                <td><?php echo $row->contact_home; ?></td>
                                
                                <td><a href="<?php echo base_url("index.php/student/view_archived_student_profile") . "/" . $row->user_id; ?>" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></td>
                                <!--<td><a href="<?php //echo base_url("index.php/student/load_student") . "/" . $row->user_id; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>-->
                                <td><a href="<?php echo base_url("index.php/student/delete_student") . "/" . $row->user_id; ?>" onclick="return confirm('Are you sure you want to permenantly delete this student?!!!you cannot recover this student profile after you delete!!!)');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></i></a></td>

                            </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

