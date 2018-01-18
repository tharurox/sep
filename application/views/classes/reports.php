<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('classes/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Reports</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">

                            <?php
                            $error_prefix = "<p class=\"help-block error\">";
                            $error_suffix = "</p>";
                            ?>
                            <?php echo form_open('classes/reports', array('class' => 'form-horizontal')); ?>
                            <div class="form-group">
                                <label for="report_type" class="col-sm-4 control-label">Report Type</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="report_type" id="report_type">
                                        <option value="0">Select Report Type</option>
                                        <!--<option value="1">Grade Strength</option>-->
                                        <option value="1">Class Students List</option>
                                    </select>
                                    <?php echo form_error('report_type', $error_prefix, $error_suffix); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="academic_year" class="col-sm-4 control-label">Academic Year</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="academic_year" id="academic_year">
                                        <?php foreach ($academic_year_list as $year) { ?>
                                            <option value="<?php echo $year->academic_year; ?>"><?php echo $year->academic_year; ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="grade" class="col-sm-4 control-label">Report Type</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="grade" id="report_type">
                                        <option value="0">Select Grade</option>
                                        <!--<option value="1">Grade Strength</option>-->
                                        <?php foreach ($grade_list as $grade) { ?>
                                            <option value="<?php echo $grade->id; ?>"><?php echo $grade->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-success">Generate</button>
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
