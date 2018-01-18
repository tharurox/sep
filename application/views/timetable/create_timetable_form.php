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
                <div class="panel-heading">Create Timetable</div>
                <div class="panel-body">
                    <div class="row" style="margin-left: 1em;">
                        <div class="media" style="margin-bottom: 2em;">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo base_url("assets/img/info_ico.png"); ?>" width="64px" height="64px">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Timetable Creation</h4>
                                Enter the details required below to start creating a timetable. Then you will be redirected to an interface
                                where you can manage time slots.
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

                            echo form_open('timetable/create', $attributes);
                            ?>

                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="class">Class:</label>
                                <div class="col-sm-4">
                                    <select id="class" name="class" class="form-control">
                                        <option value="0">Select Class</option>
                                        <?php foreach ($class_list as $class) { ?>
                                            <option value="<?php echo $class->id; ?>"><?php echo $class->grade_id . " " . $class->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label" for="year">Enter Academic Year: </label>
                                <div class="col-sm-4">
                                    <input id="year" name="year" type="text" maxlength="4" readonly class="form-control" value="<?php echo date("Y"); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-6 col-sm-4">
                                    <button type="submit" class="btn btn-raised btn-primary">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
