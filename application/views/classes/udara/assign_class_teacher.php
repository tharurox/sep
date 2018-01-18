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
			    <strong>VIEW CLASS</strong>
			  </div>
			  <div class="panel-body">
			  
              <div class="row">

                <div class="col-md-10">
                    <p><strong>Grade - </strong><?php echo $classinfo['grade_id'] ?></p>
                    <p><strong>Class Name - </strong><?php echo $classinfo['name'] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-8">
                    <?php 
                        $attributes = array('class' => 'form-horizontal', 'id' => '');
                        echo form_open('classes/assign_class_teacher/'.$classid, $attributes); ?>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Class Teacher</label>
                        <div class="col-sm-8">
                         <select name="cmbteacher" class="form-control">
                            <option value="0">- Select Name -</option>
                            <?php
                            foreach ($teachers as $row) {
                            echo "<option value='" . $row->id . "'>" . $row->full_name . "</option>" . PHP_EOL;
                        }
                        ?>
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                          <button type="submit" class="btn btn-primary">Assign Teacher</button>
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