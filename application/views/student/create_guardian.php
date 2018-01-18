<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php $this->view('student/sidebar_nav'); ?>
        </div>

        <div class="col-md-9">
            <div class="progress" style="border: ">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
                     aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                    60% Completed
                </div>
            </div>

            <br>

            <div >



                    <?php
                    // Change the css classes to suit your needs

                    $attributes = array('class' => 'formCon', 'id' => '');
                    echo form_open('student/create_guardian', $attributes);
                    ?>

                <div class="panel panel-info" style="background-color: #fef7ee">
                    <div class="panel-body" >
                    <div class="row ">


                    <div class="col-md-3 col-md-push-1  form-group">

                                <label for="studentname">Student Name</label>
                                <input type="text" name="studentname" value="<?php echo $stud_data['name_with_initials'];// $row->name_with_initials;?>" class="form-control" id="addmissiondate" readonly>
                                <div><?php echo form_error('studentname'); ?></div>
                     </div>
                     <div class="col-md-3 col-md-offset-4 form-group">



                    </div>



                      </div>
                     </div>
                </div>

             <div class="panel  panel-info"  >
                 <div class="panel-heading panel-default " >
                     <b>ADMISSION / Guardian Details</b>
                </div>
                 <div class="panel panel-body" >

                <!-- first row-->
                 <div class="row">


                    <div class="col-md-5 col-md-push-1 form-group">

                                <label for="gfirstname">First Name</label>
                                <input type="text" name="gfirstname" value="<?php echo set_value('gfirstname'); ?>" class="form-control" id="gfirstname" >
                                <div><?php echo form_error('gfirstname'); ?></div>

                     </div>
                     <div class="col-md-5 col-md-push-1 form-group">

                                <label for="glastname">Last Name</label>
                                <input type="text" name="glastname" value="<?php echo set_value('glastname'); ?>" class="form-control" id="glastname" >
                                <div><?php echo form_error('glastname'); ?></div>

                     </div>


                </div>
                <div class="row">
                    <div class="col-md-5 col-md-push-1 form-group">

                                <label for="initials">Name With Initials</label>
                                <input type="text" name="initial" value="<?php echo set_value('initial'); ?>" class="form-control" id="initial" >
                                <div> <?php echo form_error('initial'); ?></div>

                    </div>
                </div>
                <!-- secound row-->
                <div class="row">


                     <div class="col-md-5 col-md-push-1  form-group">

                                <label for="relation">Relation</label>
                                <select  name="relation" id="relation" class="form-control">
                                 <option value="n" <?php if(set_value('relation')== "n"){echo"selected";}?>>Select Your Relation</option>
                                    <option value="f" <?php if(set_value('relation')== "f"){echo"selected";}?>>Father</option>
                                    <option value="m" <?php if(set_value('relation')== "m"){echo"selected";}?>>Mother</option>
                                    <option value="g" <?php if(set_value('relation')== "g"){echo"selected";}?>>Guardian</option>

                                 </select>

                                <div><?php echo form_error('relation'); ?></div>
                     </div>
                </div>
                <!-- third row-->
                 <div class="row">


                    <div class="col-md-5 col-md-push-1 form-group">

                                <label for="contact_homeg">Contact No</label>
                                <input type="text" name="contact_homeg" value="<?php echo set_value('contact_homeg'); ?>" class="form-control " id="contact_homeg" >
                                <div><?php echo form_error('contact_homeg'); ?></div>

                     </div>
                     <div class="col-md-5 col-md-push-1 form-group">

                                <label for="contact_mobile">Contact Mobile</label>
                                <input type="text" name="contact_mobile" value="<?php echo set_value('contact_mobile'); ?>" class="form-control" id="contact_mobile" >
                                <div> <?php echo form_error('contact_mobile'); ?></div>

                     </div>
                </div>
                <!-- fourth row-->
                <div class="row">



                    <div class="col-md-5 col-md-push-1 form-group">

                                <label for="dobg">Date of Birth</label>
                                <input type="date" name="dobg" value="<?php echo set_value('dobg'); ?>" class="form-control " id="dobg" >
                                <div> <?php echo form_error('dobg'); ?></div>

                     </div>

                </div>



                 <div class="row">
                   <div class="col-md-3 col-md-push-1 form-group">
                    <label for="gender" >Gender</label>
                    </div>
                    <div class="col-sm-3">

                            <label class="radio-inline">
                                <input id="male" type="radio" name="gender"  value="m" type="radio"  id="male" <?php if(set_value('gender')== "m"){echo "checked";}?>> Male
                            </label>
                            <label class="radio-inline">
                                <input id="female" type="radio" name="gender"  value="f" type="radio" id="female" <?php if(set_value('gender')== "f"){echo "checked";}?>> Female
                            </label>
                            <?php echo form_error('gender'); ?>
                        </div>

                </div>


                 <!-- Fifth row-->
                 <div class="row">
                     <div class="col-md-5 col-md-push-1 form-group">
                                <div><?php echo form_error('occupation'); ?></div>
                                <label for="occupation">Occupation</label>
                                <input type="text" name="occupation" value="<?php echo set_value('occupation'); ?>" class="form-control " id="occupation" >
                     </div>



                </div>


                  <!-- Sixth row-->
                <div class="row">

                            <div class="col-md-5 col-md-push-1 form-group">

                                <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                                <div>

                                    <input id="address" type="text" name="address"  value="<?php echo set_value('address'); ?>" type="text" class="form-control" id="address" >
                                        <?php echo form_error('address'); ?>
                                </div>
                                <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                <div>

                                    <input id="address1" type="text" name="address1"  value="<?php echo set_value('address1'); ?>" type="text" class="form-control" id="address1" >
                                        <?php echo form_error('address'); ?>
                                </div>
                                <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                <div>

                                    <input id="address2" type="text" name="address2"  value="<?php echo set_value('address2'); ?>" type="text" class="form-control" id="address2" >
                                        <?php echo form_error('address'); ?>
                                </div>
                            </div>
                  </div>



                <!-- Seventh row-->
                 <div class="row">
                     <div class="col-md-5 col-md-push-1 form-group">
                                <div class="checkbox">
                                       <label>
                                         <input type="checkbox" name="pastpupil" id="pastpupil">Is a Past Pupil Of this Institute
                                       </label>
                                </div>
                     </div>



                </div>

                 <div class="row">
                     <div class="col-md-1 col-md-push-1">

                       <button type="submit" class="btn btn-raised btn-success ">Next </button>

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
