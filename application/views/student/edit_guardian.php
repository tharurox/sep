<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php $this->view('student/sidebar_nav'); ?>
        </div>

        <div class="col-md-9">
            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <?php if (isset($err_message)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>



            <div >



                    <?php
                    // Change the css classes to suit your needs

                    $attributes = array('class' => 'formCon', 'id' => '');
                    echo form_open('student/edit_guardian', $attributes);
                    ?>

                <div class="panel panel-warning" style="background-color: #fef7ee">
                    <div class="panel-body" >
                    <div class="row ">


                    <div class="col-md-3 col-md-push-1  form-group">

                                <label for="studentid">Student No</label>
                                <input type="text" name="studentid" value="<?php echo $result->student_id; ?>" class="form-control warning " id="studentid" readonly>
                                <div><?php echo form_error('studentid'); ?></div>

                     </div>
                     <div class="col-md-3 col-md-offset-4 form-group">



                    </div>



                      </div>
                     </div>
                </div>

             <div class="panel  panel-info"  >
                 <div class="panel-heading panel-info " >
                    EDIT GUARDIAN
                    <span class="pull-right">

                        <a href="<?php echo base_url("index.php/student") ?>" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-raised btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                </span>
                </div>
                 <div class="panel panel-body" >

                <!-- first row-->
                 <div class="row">


                    <div class="col-md-5 col-md-push-1 form-group">

                                <label for="fullname">Full Name</label>
                                <input type="text" name="fullname" value="<?php echo  $result->fullname; ?>" class="form-control" id="fullname" placeholder="Full Name" >
                                <div><?php echo form_error('fullname'); ?></div>

                     </div>
                     <div class="col-md-5 col-md-push-1 form-group">

                                <label for="initials">Name With Initials</label>
                                <input type="text" name="initials" value="<?php echo  $result->name_with_initials; ?>" class="form-control" id="initials" placeholder="name with initials" >
                                <div><?php echo form_error('initials'); ?></div>

                     </div>


                </div>
                <!-- secound row-->

                <!-- third row-->
                 <div class="row">


                    <div class="col-md-5 col-md-push-1 form-group">

                                <label for="contact_home">Contact No</label>
                                <input type="text" name="contact_home" value="<?php echo  $result->contact_home; ?>" class="form-control " id="contact_home" placeholder="Contact No">
                                <div><?php echo form_error('contact_home'); ?></div>

                     </div>
                     <div class="col-md-5 col-md-push-1 form-group">

                                <label for="contact_mobile">Contact Mobile</label>
                                <input type="text" name="contact_mobile" value="<?php echo  $result->contact_mobile; ?>" class="form-control" id="contact_mobile" placeholder="Contact Moblile">
                                <div> <?php echo form_error('contact_mobile'); ?></div>

                     </div>
                </div>
                <!-- fourth row-->
                <div class="row">



                    <div class="col-md-5 col-md-push-1 form-group">

                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" value="<?php echo  $result->dob; ?>" class="form-control " id="dob" placeholder="DOB">
                                <div> <?php echo form_error('dob'); ?></div>

                     </div>

                </div>






                 <!-- Fifth row-->
                 <div class="row">
                     <div class="col-md-5 col-md-push-1 form-group">
                                <div><?php echo form_error('occupation'); ?></div>
                                <label for="occupation">Occupation</label>
                                <input type="text" name="occupation" value="<?php echo $result->occupation; ?>" class="form-control " id="occupation" placeholder="Occupation">
                     </div>



                </div>


                  <!-- Sixth row-->
                <div class="row">

                     <div class="col-md-5 col-md-push-1  form-group">
                                <div><?php echo form_error('address'); ?></div>
                                <label for="address">Permenent Address</label>
                                <textarea name="address" value="" class="form-control" id="address"><?php  echo $result->addr.",".$result->addr1.",".$result->addr2; ?></textarea>

                     </div>
                </div>


                <!-- Seventh row-->


                 <div class="row">
                     <div class="col-md-1 col-md-push-1">

                       <button type="submit" class="btn btn-raised btn-success ">Edit </button>

                     </div>
                     <div class="col-md-2 col-md-push-1">

                       <button type="reset" class="btn btn-raised btn-success ">Reset </button>

                     </div>
                 </div>


                </div>

              </div>
                  <?php echo form_close(); ?>


            </div>
                   </div>
        </div>

    </div>

</div>
