<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('classes/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <?php if ($succ_message) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">Create Class</div>
                <div class="panel-body">
                    <div class="row" style="margin-left: 1em; margin-bottom: 2em;">
                        <!-- Create Class Info -->
                        <div class="col-md-12">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="<?php echo base_url("assets/img/info_ico.png"); ?>" width="64px" height="64px">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Create a Class for Academic Year: <?php echo date('Y'); ?> </h4>
                                    Select the grade and enter the class name. If you want to auto generate list of classes, use école <a href="#">bulk class generator tool.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Create Class Form -->
                        <?php
                        $error_prefix = "<p class=\"help-block error\">";
                        $error_suffix = "</p>";
                        $attributes = array('class' => 'form-horizontal');
                        ?>
                        <div class="col-md-8">
                            <?php echo form_open('classes/create', $attributes); ?>
                            <div class="form-group">
                                <label for="grade" class="col-sm-3 control-label">Grade</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name='grade' id="grade">
                                        <option value="select_grade">Select Grade</option>
                                        <?php foreach ($grades as $grade) { ?>
                                        <option value="<?php echo $grade->id; ?>" <?php echo set_select('grade', $grade->id); ?>><?php echo $grade->name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('grade', $error_prefix, $error_suffix); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="class_name" class="col-sm-3 control-label">Class Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="class_name" name="class_name" placeholder="Enter class name">
                                    <?php echo form_error('class_name', $error_prefix, $error_suffix); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="class_teacher" class="col-sm-3 control-label">Class Teacher</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name='class_teacher' id="class_teacher">
                                        <option value="select_teacher">Select Class Teacher</option>
                                        <?php foreach ($teachers as $teacher) { ?>
                                            <option value="<?php echo $teacher->id; ?>"><?php echo $teacher->full_name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="help-block"><span class="label label-info">TIP:</span> you can add class teacher later.</span>
                                    <?php echo form_error('class_teacher', $error_prefix, $error_suffix); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success">Create</button>
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
