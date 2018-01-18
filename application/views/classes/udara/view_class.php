<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('classes/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
        	<!-- Message -->
                <?php if (isset($_GET['delete']) && $_GET['delete'] == 'success' ) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success </strong>
                    Student Removed Successfully!
                </div>
                <?php } ?>
                <?php if (isset($_GET['delete']) && $_GET['delete'] == 'fail' ) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error </strong>
                    Something went wrong while deleting!
                </div>
                <?php } ?>

			  	<?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success </strong>
                    <?php echo $succ_message; ?>
                </div>
            	<?php } ?>
            	<?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors(); ?>
                </div>
            	<?php } ?>

        	<!-- New Class -->
            <div class="panel panel-default">
			  <div class="panel-heading">
			    <strong>VIEW CLASS</strong>
			  </div>
			  <div class="panel-body">
			  
              <div class="row">
                <div class="col-md-12">
                    <p><strong>Grade - </strong><?php echo $classinfo['grade_id'] ?></p>
                    <p><strong>Class Name - </strong><?php echo $classinfo['name'] ?></p>
                    <p><strong>Teacher Name - </strong>
                    <?php if(!empty($classinfo['teacher_id'])) { 
                        echo $teacher_name; 
                        } else{ ?>
                            <a class="btn btn-primary btn-sm" href='<?php echo base_url('index.php/classes/assign_class_teacher/'.$classinfo['id']); ?>' role="button"><i class="fa fa-plus"></i> Assign Class Teacher</a>
                        <?php
                        } 
                        ?>
                    </p>
                </div>
              </div>
              <hr>
			  <div class="row">
			   	<div class="col-md-12">
                    <?php 
                        if($studentlist != FALSE){
                    ?>

                    <script>
                    $(document).ready( function () {
                        $('#table_id').DataTable();
                    } );
                    </script>

                    <table class="table table-hover" id="table_id">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Admission No</th>
                                <th>Name</th>
                                <th>Contact no</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 0;
                            foreach ($studentlist as $row) {
                                $no++;
                            ?>


                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->admission_no; ?></td> 
                                    <td><?php echo $row->name_with_initials; ?></td>
                                    <td><?php echo $row->contact_home; ?></td>
                                    
                                    <td>
                                        <a data-toggle="tooltip" data-placement="bottom" title="View Profile" class='btn btn-primary btn-xs' href="<?php echo base_url("index.php/student/view_student_profile") . "/" . $row->user_id; ?>" ><span class="fa fa-user" aria-hidden="true"></span></a>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Remove From Class" class='btn btn-danger btn-xs' href="<?php echo base_url("index.php/classes/remove_from_class") . "/" . $row->id . "/". $classid; ?>" ><span class="fa fa-trash-o" aria-hidden="true"></span></a>
                                    </td>
                                   

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
			   		<?php } else { ?>
                    <div class="alert alert-info" role="alert">No Students Listed On this Class</div>
                    <?php } ?>
			   	</div>
			   </div>
			  </div>
			</div>


        </div>
    </div>
</div>