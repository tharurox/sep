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
                    Class Deleted Successfully!
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
			    <strong>CREATE BATCH</strong>
			  </div>
			  <div class="panel-body">
			  
			  <div class="row">
			   	<div class="col-md-8">
			   		<?php 
			   			$attributes = array('class' => 'form-horizontal', 'id' => '');
			   			echo form_open('classes/create_batch', $attributes); ?>
					  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-3 control-label">Acadamic Year</label>
					    <div class="col-sm-9">
					      	<select name="cmbay" class="form-control">
					      	<?php
                            foreach ($all_years as $row) { ?>
							  <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
							<?php } ?>
							</select>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-3 control-label">Grade</label>
					    <div class="col-sm-9">
					      <select name="cmbgrade" class="form-control">
							  <option value="1">1</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
							  <option value="4">4</option>
							  <option value="5">5</option>
							  <option value="6">6</option>
							  <option value="7">7</option>
							  <option value="8">8</option>
							  <option value="9">9</option>
							  <option value="10">10</option>
							  <option value="11">11</option>
							  <option value="12">12</option>
							  <option value="13">13</option>
							</select>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-3 control-label">Batch Name</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="batchname" placeholder="Batch Name">
					      <p class="help-block">Example <span class="label label-info">2015Batch</span> <span class="label label-info">2016Batch</span></p>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-3 col-sm-9">
					      <button type="submit" class="btn btn-primary">Create</button>
					    </div>
					  </div>
					<?php echo form_close(); ?>
			   	</div>
			   </div>
			  </div>
			</div>

			<!-- Existing Classes -->
            <div class="panel panel-default">
			  <div class="panel-heading">
			    <strong>EXISTING BATCHES</strong>
			  </div>
			  <div class="panel-body">
			   	<div class="row">
			   	<div class="col-md-12">
	                <script>
	                $(document).ready( function () {
	                    $('#table_id').DataTable();
	                } );
	                </script>

	                <table class="table table-hover" id="table_id">
	                    <thead>
	                        <tr>
	                            <th>#</th>
	                            <th>Academic Year</th>
	                            <th>Name</th>
	                            <th>Grade</th>
	                            <th>Actions</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php 
	                        $no = 1;
	                        foreach ($batchlist as $row) { ?>


	                            <tr>
	                                <td><?php echo $no; ?></td>
	                                <td><?php echo $row->acadamic_year; ?></td> 
	                                <td><?php echo $row->name; ?></td>
	                                <td><?php echo $row->grade; ?></td>
	                                
	                                
	                                <td>
		                           		<a href='<?php echo base_url('index.php/classes/EditCity/'.$row->id); ?>' class='btn btn-primary btn-xs'><i class="fa fa-eye"></i></a>
		                           		<a href='<?php echo base_url('index.php/classes/edit_batch/'.$row->id); ?>' class='btn btn-primary btn-xs'><i class="fa fa-pencil-square-o"></i></a>
		                           		<!-- <a href='<?php echo base_url('index.php/classes/delete_class/'.$row->id); ?>' onclick="return confirm('Are you sure you want to permenantly delete this Class?   you cannot recover this after you delete');" class='btn btn-danger btn-xs'><i class="fa fa-trash-o"></i></a> -->
		                            </td>
	                            </tr>
	                        <?php 
	                        $no++;
	                        } ?>
	                    </tbody>
	                </table>
	                </div>
	            </div>
			  </div>
			</div>

        </div>
    </div>
</div>