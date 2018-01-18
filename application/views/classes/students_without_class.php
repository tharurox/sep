<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('classes/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Students Without Class</div>
                <div class="panel-body">
                    <div class="row">
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
                                        <th>Grade</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($students_without_class as $student) { ?>
                                        <tr>
                                            <td><?php echo $student->id; ?></td>
                                            <td><?php echo $student->admission_no; ?></td>
                                            <td><?php echo $student->full_name; ?></td>
                                            <td><?php echo get_grade_name($student->current_grade); ?></td>
                                            <td>
                                                <a href="<?php echo base_url("index.php/classes?grade={$student->current_grade}&year=") . date('Y'); ?>" data-toggle="tooltip" title="Assign to Class"><i class="fa fa-university" style="font-size: 18px;" ></i></a>&nbsp;
                                            </td>
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
