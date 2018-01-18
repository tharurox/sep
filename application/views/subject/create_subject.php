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
            <div class="panel panel-info">
                <div class="panel-heading">Create Subject</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <?php
                        $error_prefix = "<p class=\"help-block error\">";
                        $error_suffix = "</p>"
                        ?>
                        <?php echo form_open('subject'); ?>
                        <div class="form-group">
                            <label for="subjectname">Subject name</label>
                            <input type="text" name="subjectname" id="subjectname" class="form-control" value="">
                            <?php echo form_error('subjectname', $error_prefix, $error_suffix); ?>
                        </div>
                        <div class="form-group">
                            <label for="subjectcode">Subject Code</label>
                            <input type="text" name="subjectcode" id="subjectcode" class="form-control" value="">
                            <?php echo form_error('subjectcode', $error_prefix, $error_suffix); ?>
                        </div>
                        <div class="form-group">
                            <label for="sectionid">Section</label>
                            <select  name="sectionid" id="sectionid" class="form-control">
                                 <option value="0">Select Section</option>
                                    <option value="1">1/5</option>
                                    <option value="2">6/7</option>
                                    <option value="3">8/9</option>
                                    <option value="4">10/11</option>
                                    <option value="5">A/L Science</option>
                                    <option value="6">A/L Commerce</option>
                                    <option value="7">A/L Arts</option>
                            </select>
                            <?php echo form_error('sectionid', $error_prefix, $error_suffix); ?>
                        </div>
                        <div class="form-group">
                            <label for="subjectinchargeid">Subject incharge</label>
                            <select name="subjectinchargeid" id="subjectinchargeid" class="form-control">
                                    <?php


                                    foreach ($result as $row) {?>



                                <option value="<?php echo $row->id;?>"><?php echo $row->full_name; ?> </option>
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
