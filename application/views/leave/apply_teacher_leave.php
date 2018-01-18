<div class="container">
   <div class="row">
       <div class="col-md-3">
           <?php
           if($user_type == 'A'){
               $this->view('leave/admin_sidebar');
           }
           elseif($user_type == 'T'){
               $this->view('leave/teacher_sidebar');
           }
           else{
               $this->view('leave/teacher_sidebar');
           }

           ?>
       </div>
       <div class="col-md-9">
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
           <?php if (isset($error_message)) { ?>
               <div class="alert alert-danger alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <strong>Error </strong>
                   <?php echo $error_message; ?>
               </div>
           <?php } ?>
           <div class="panel panel-info">
               <div class="panel-heading">
                   <strong>APPLY TEACHER LEAVE</strong>
               </div>
               <div class="panel-body">
               <!-- Start of form -->
                   <?php
                       // Change the css classes to suit your needs
                       $attributes = array('class' => '', 'id' => '');
                       echo form_open('leave/apply_teacher_leave', $attributes);
                   ?>
                   <div class="row">
                      <div class="col-md-4"><label>Name</label></div>
                   </div>
                   <div class="row">
                       <div class="col-md-4">
                             <div class="form-group">

                               <select name="cmb_teacher" class="form-control">
                                   <option value="0">- Select Name -</option>
                                   <?php
                                 foreach ($teachers as $row) {
                                   echo "<option value='" . $row->id . "'>" . $row->full_name . "</option>" . PHP_EOL;
                               }
                               ?>
                               </select>
                             </div>


                       </div>
                   </div>
                   <div class="row">
                      <div class="col-md-4"><label>Leave Type</label></div>
                      <div class="col-md-4"><label>Leave Start Date</label></div>
                      <div class="col-md-4"><label>Duty Resuming Date</label></div>
                   </div>
                   <div class="row">
                       <div class="col-md-4">
                           <div class="form-group">
                               <?php
                               echo "<select name='cmb_leavetype' class='form-control'>" . PHP_EOL;
                               echo "<option value='100'>- Select Type -</option>". PHP_EOL;
                               foreach ($leave_types as $row) {
                                   echo "<option value='" . $row->id . "'>" . $row->name . "</option>" . PHP_EOL;
                               }
                               echo "</select>" . PHP_EOL;
                               ?>
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <div class="input-group">
                                   <input class="form-control" value="<?php echo set_value('txt_startdate'); ?>" name="txt_startdate" placeholder="Start Date" name="startdate"   type="date">
                                   <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <div class="input-group">
                                   <input class="form-control" value="<?php echo set_value('txt_enddate'); ?>" name="txt_enddate" placeholder="Resuming Date" name="enddate"   type="date">
                                   <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-4"><label>Reason</label></div>
                   </div>
                   <div class="row">
                       <div class="col-md-8"><textarea class="form-control" value="<?php echo set_value('txt_reason'); ?>" rows="3" id="txt_reason" name="txt_reason"></textarea></div>
                       <div class="col-md-4"><button type="submit" class="btn btn-raised btn-success">Apply</button></div>
                   </div>

                   <?php echo form_close(); ?>
                   <hr>
                   <!-- Teachers individual leave report -->
               </div>

           </div>
       </div>
   </div>
</div>
