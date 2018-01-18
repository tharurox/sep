<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('timetable/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">Add Slot</div>
                <div class="panel-body">
                    <div class="row" style="margin-left: 1em;">
                        <div class="media" style="margin-bottom: 2em;">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo base_url("assets/img/info_ico.png"); ?>" width="64px" height="64px">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Adding Timeslot for Timetable</h4>
                                Class Name: <?php echo $this->class_model->get_class_name($timetable->class_id) ; ?><br />
                                Academic Year: <?php echo $timetable->year; ?><br />
                                Timeslot ID: <?php echo $slot_id; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <?php
                            $error_prefix = "<p class=\"help-block error\">";
                            $error_suffix = "</p>"
                            ?>
                            <?php
                            $attributes = array(
                                'class' => 'form-horizontal'
                            );

                            echo form_open('timetable/add_slot' . '/' . $timetable->id . '/' . $slot_id, $attributes);
                            ?>

                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="class">Teacher:</label>
                                <div class="col-sm-4">
                                    <select id="teacher" name="teacher" class="form-control">
                                        <option value="0">Select Teacher</option>
                                        <?php foreach ($teacher_list as $teacher) { ?>
                                            <option value="<?php echo $teacher->id; ?>"><?php echo $teacher->name_with_initials; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="class">Subject:</label>
                                <div class="col-sm-4">
                                    <select id="subject" name="subject" class="form-control">
                                        <option value="0">Select Subject</option>
                                        <?php foreach ($subject_list as $subject) { ?>
                                            <option value="<?php echo $subject->id; ?>"><?php echo $subject->subject_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="slot" value="<?php echo $slot_id; ?>">
                            <input type="hidden" name="timetable_id" value="<?php echo $timetable->id; ?>">
                            <div class="form-group">
                                <div class="col-sm-offset-6 col-sm-4">
                                    <button type="submit" class="btn btn-raised btn-primary">ADD SLOT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
