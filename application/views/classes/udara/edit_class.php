<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('classes/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
        	<!-- Message -->
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
			    <strong>EDIT CLASS BASICS</strong>
			  </div>
			  <div class="panel-body">
			  
			  <div class="row">
			   	<div class="col-md-8">
			   		<?php 
			   			$attributes = array('class' => 'form-horizontal', 'id' => '');
			   			echo form_open('classes/edit_class/'.$classid, $attributes); ?>
					  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-2 control-label">Grade</label>
					    <div class="col-sm-10">
					      <select name="cmbgrade" class="form-control">
					      	<?php
					      		for($gid=1; $gid<14; $gid++){
					      	?>
							  <option value="<?php echo $gid; ?>" <?php if($gid == $classdet['grade_id']){ echo "selected";} ?>><?php echo $gid; ?></option>
							<?php } ?>
							</select>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">Name</label>
					    <div class="col-sm-10">
					      <input required type="text" class="form-control" name="classname" placeholder="Name" value="<?php echo $classdet['name'] ?>">
					      <p class="help-block">Example <span class="label label-info">1A</span> <span class="label label-info">12B2</span> <span class="label label-info">13M1</span></p>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary">Edit</button>
					    </div>
					  </div>
					<?php echo form_close(); ?>
			   	</div>
			   </div>
			  </div>
			</div>


        </div>
    </div>
</div>