<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('classes/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">

            <div class="panel panel-info">
                <div class="panel-heading">Assign Students to Class</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <span class="label label-info">Class Name:</span>&nbsp;
                                <span class="label label-default"><?php echo $class->name; ?></span>
                            </p>
                            <p>
                                <span class="label label-info">Class Teacher:&Tab;</span>&nbsp;
                                <?php if (is_null($class->teacher_id)) { ?>
                                    <a href="<?php echo base_url("index.php/classes/edit_class/{$class->id}"); ?>">Assign Teacher <i class="fa fa-plus-circle"></i></a>
                                <?php } else { ?>
                                    <?php echo get_class_teacher_name($class->teacher_id); ?>
                                <?php } ?>
                            </p>
                            <p>
                                <span class="label label-info">Academic Year:&Tab;</span>&nbsp;
                                <span class="label label-default"><?php echo $class->academic_year; ?></span>
                            </p>
                        </div>
                    </div>
                    <?php echo form_open("classes/process_student_class_assignment/{$class->id}"); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Students Eligible</strong></p>
                            <select multiple id="students-eligible" name="students-eligible[]" class="form-control" style="height: 300px">
                                <?php foreach ($students_eligible as $student) { ?>
                                    <option value="<?php echo $student->id; ?>"><?php echo $student->name_with_initials; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-1" style="padding-top: 150px;">
                            <button class="btn btn-block btn-success" id="btn-right">>></button>
                            <br />
                            <button class="btn btn-raised btn-info" id="btn-left"><<</button>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Students In Class</strong></p>
                            <select multiple id="students-in" name="students-in[]" class="form-control" style="height: 300px">
                                <?php foreach ($students_in as $student) { ?>
                                    <option value="<?php echo $student->id; ?>"><?php echo $student->name_with_initials; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3" style="padding-top: 30px;">
                            <button type="submit" id="submit-btn" class="btn btn-lg btn-raised btn-success">Assign Students</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $("#btn-right").click(function (e) {
        e.preventDefault();
        $("#students-eligible").find('option:selected').remove().appendTo('#students-in');

    });

    $("#btn-left").click(function (e) {
        e.preventDefault();
        $("#students-in").find('option:selected').remove().appendTo('#students-eligible');
    });

    $("form").submit(function () {
        $("#students-eligible option").prop('selected', true);
        $("#students-in option").prop('selected', true);
        return true;
    });


//    document.getElementsByName('submit')[0].onclick = function () {
//        var s1 = document.getElementsByName('select1')[0];
//        for (var i = 0; i < s1.options.length; i++) {
//            s1.options[i].selected = true;
//        }
//    };
</script>
