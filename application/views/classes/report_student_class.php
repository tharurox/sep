<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <img src="<?php echo base_url("assets/img/dslogo.jpg"); ?>" style="width: 150px">
            <h3>Class Students List for Academic Year <?php echo $academic_year; ?></h3>
        </div>
    </div>
    <?php foreach ($classes as $class) { ?>
    <?php $students = $this->class_model->get_class_students($class->id); ?>
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center"><span class="label label-default"><?php echo $class->name; ?></span></h4>
                <?php if(count($students) === 0) { ?>
                <p class="text-center">
                    <em>No Students Assigned for this Class</em>
                </p>
                <?php } else { ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <!--<th width="100px">Serial No</th>-->
                            <th width="200px">Admission No</th>
                            <th>Full Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        //$serial_no = 0;
                        foreach ($students as $student) {
                        ?>
                        
                        <tr>
                            <!--<td><?php //echo ++$serial_no; ?></td>-->
                            <td><?php echo $student->admission_no; ?></td>
                            <td><?php echo $student->full_name; ?></td>
                        </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

</div>