<div class="container">
    <div class="row">
        <div class="col-md-3">
          <?php $this->view('subject/sidebar_nav'); ?>
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
                    <?php echo $err_message; ?>
                </div>
            <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">Change Subject Incharge</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <?php
                        $error_prefix = "<p class=\"help-block error\">";
                        $error_suffix = "</p>"
                        ?>
                        <?php echo form_open('subject/edit_subject'); ?>
                        <input type="text" name="subjectid" id="subjectid" readonly class="form-control" value="<?php echo $subject_details->id;?>">
                        <div class="form-group">
                            <label for="subjectname">Subject name</label>
                            <input type="text" name="subjectname" id="subjectname" readonly class="form-control" value="<?php echo $subject_details->subject_name;?>">
                            <?php echo form_error('subjectname', $error_prefix, $error_suffix); ?>
                        </div>
                        <div class="form-group">
                            <label for="subjectcode">Subject Code</label>
                            <input type="text" name="subjectcode" id="subjectcode" readonly class="form-control" value="<?php echo $subject_details->subject_code;?>">
                            <?php echo form_error('subjectcode', $error_prefix, $error_suffix); ?>
                        </div>
                        <div class="form-group">
                            <label for="sectionid">Section</label>

                              <input type="text" name="subjectcode" readonly  id="subjectcode" readonly class="form-control" value="<?php if($subject_details->section_id ==1){echo '1/5';}else if($subject_details->section_id ==2){echo '6/7';}else if($subject_details->section_id ==3){echo '8/9';}else if($subject_details->section_id ==4){echo '10/11';}else if($subject_details->section_id ==5){echo 'A/L Science';}else if($subject_details->section_id ==6){echo 'A/L Commerce';}else if($subject_details->section_id ==7){echo 'A/L Arts';}?>">

                            <?php echo form_error('sectionid', $error_prefix, $error_suffix); ?>
                        </div>
                        <div class="form-group">
                            <label for="subjectinchargeid">Subject incharge</label>
                            <select name="subjectinchargeid" id="subjectinchargeid" class="form-control">
                                    <?php


                                    foreach ($result as $row) {?>



                                <option value="<?php echo $row->id;?>" <?php if($subject_details->subject_incharge_id ==$row->id ){echo 'selected';}?>><?php echo $row->full_name; ?> </option>
                                                                                                       <?php  }
                                      ?>
                            </select>

                            <?php echo form_error('subjectinchargeid', $error_prefix, $error_suffix); ?>
                        </div>

                        <input type="submit" class="btn btn-raised btn-success" value=" Submit ">
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
