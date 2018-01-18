<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('classes/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">

            <div class="panel panel-info">
                <div class="panel-heading">Class Information</div>
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
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-12">
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#class-student-table').DataTable();
                                });
                            </script>
                            <table id="class-student-table" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Admission No</th>
                                        <th>Student Name</th>
                                        <th>Religion</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($class_students as $student) { ?>
                                        <tr>
                                            <td><?php echo $student->id; ?></td>
                                            <td><?php echo $student->admission_no; ?></td>
                                            <td><?php echo $student->full_name; ?></td>
                                            <td><?php echo get_religion($student->religion); ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
