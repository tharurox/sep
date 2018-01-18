<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('classes/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Classes List</div>
                <div class="panel-body">
                    <?php if(count($students_without_class)> 0) { ?>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Reminder!</strong>
                                There are <a href="<?php echo base_url('index.php/classes/students_without_class'); ?>"><?php echo count($students_without_class); ?> student(s)</a> without classes.
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if(count($result) > 0) { ?>
                    <div class="row"style="margin-top: 10px;">
                        <div class="col-md-12">
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#class-table').DataTable({
                                        "columnDefs": [
                                            {"orderable": false, "targets": 5}
                                        ]
                                    });
                                });
                            </script>
                            <table id="class-table" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Grade</th>
                                        <th>Class</th>
                                        <th>Class Teacher</th>
                                        <th>Student Count</th>
                                        <th>Academic Year</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row) { ?>
                                        <tr>
                                            <td><?php echo $row->id; ?></td>
                                            <td><?php echo get_grade_name($row->grade_id); ?></td>
                                            <td><?php echo $row->name; ?></td>
                                            <td><?php echo get_class_teacher_name($row->teacher_id); ?></td>
                                            <td><?php echo get_number_of_students($row->id); ?></td>
                                            <td><?php echo $row->academic_year; ?></td>
                                            <td>
                                                <a href="<?php echo base_url("index.php/classes/assign_to_class/{$row->id}"); ?>" data-toggle="tooltip" title="Assign Students"><i class="fa fa-graduation-cap" style="font-size: 18px;" ></i></a>&nbsp;
                                                <a href="<?php echo base_url("index.php/classes/view_class/{$row->id}"); ?>" data-toggle="tooltip" title="View Class"><i class="fa fa-eye" style="font-size: 18px;" ></i></a>&nbsp;
                                                <a href="<?php echo base_url("index.php/classes/edit_class/{$row->id}"); ?>" data-toggle="tooltip" title="Edit Class"><i class="fa fa-pencil-square-o" style="font-size: 18px;" ></i></a>&nbsp;

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="row"style="margin-top: 10px;">
                        <div class="col-md-12 text-center">
                            <p><span style="font-size: 50px" class="glyphicon glyphicon-blackboard"></span></p>
                            <p>We haven't found any classes matching your requirement.
                                <a href="<?php echo base_url("index.php/classes/create");?>">Why not create a new class?</a>
                            </p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
