<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('classes/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <?php if (isset($succ_message)) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $succ_message; ?>
            </div>
            <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">Edit Class</div>
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
                                    <h4 class="media-heading">Edit Class <?php echo $class->name; ?> <span class="label label-info"><?php echo $class->academic_year ;?></span> </h4>
                                    Edit Class Details here.
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
                            <?php echo form_open("classes/edit_class/{$class->id}", $attributes); ?>
                            <div class="form-group">
                                <label for="grade" class="col-sm-3 control-label">Grade</label>
                                <div class="col-sm-9">
                                    <p class="form-control-static"><?php echo get_grade_name($class->grade_id); ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="class_name" class="col-sm-3 control-label">Class Name</label>
                                <div class="col-sm-9">
                                    <p class="form-control-static"><?php echo $class->name; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="class_teacher" class="col-sm-3 control-label">Class Teacher</label>
                                <div class="col-sm-9">
                                    <?php if (is_null($class->teacher_id)) { ?>
                                        <select class="form-control" name='class_teacher' id="class_teacher">
                                            <option value="select_teacher">Select Class Teacher</option>
                                            <?php foreach ($teachers as $teacher) { ?>
                                                <option value="<?php echo $teacher->id; ?>" <?php echo ($class->teacher_id == $teacher->id ? "selected" : NULL); ?>><?php echo $teacher->full_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else { ?>
                                    <p class="form-control-static">
                                        <?php echo get_class_teacher_name($class->teacher_id); ?>
                                        <a class="label label-danger" href="<?php echo base_url("index.php/classes/remove_class_teacher/{$class->id}");?>">
                                            &nbsp;&nbsp;<i class="fa fa-times"></i> Remove Class Teacher&nbsp;&nbsp;
                                        </a>
                                    </p>
                                    <?php } ?>

                                    <?php echo form_error('class_teacher', $error_prefix, $error_suffix); ?>
                                </div>
                            </div>
                             <?php if (is_null($class->teacher_id)) { ?>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </div>
                            </div>
                            <?php } ?>
                            <?php echo form_close(); ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
