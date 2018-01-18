
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('attendance/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">


            <div class="row">
                <?php if ($this->session->flashdata('succ_message')) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('succ_message'); ?>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('err_message')) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('err_message'); ?>
                    </div>
                <?php } ?>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">Daily Attendance Recode</div>
                <div class="panel-body">
                    <div class="row" style="margin-left: 1em; margin-bottom: 2em;">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="http://localhost/sep/assets/img/info_ico.png" width="64px" height="64px">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Recording Student Attendance</h4>
                                Tick the students who are absent for the selected date and click "Add" to mark attendance
                            </div>
                        </div>
                    </div>
                    <?php echo form_open('attendance/get_selected_students'); ?>
                    <div class="row">
                        <div class="col-md-3  form-group" style="margin-left: 10px">

                            <label for="attendancedate">Date of the recode</label>
                            <input type="date" name="attendancedate" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="attendancedate">
                            <div><?php echo form_error('attendancedate'); ?></div>
                        </div>
                    </div>

                    <div class="row">
        <!--                <script type="text/javascript">
                            $(document).ready(function() {
                                $('#table_id').DataTable();
                            } );
                        </script>-->
                        <div class="col-md-12" style=" ">
                        <table class="table table-hover" id="table_id">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Admission No</th>
                                    <th>Name</th>
                                    <th>Absent<th>
                                </tr>
                            </thead>
                        </table>
                        </div>
                        <div class="col-md-12" style="  max-height: 300px; overflow-y: scroll; margin-bottom: 10px;">
                            <table class="table table-hover" id="table_id">

                                <tbody>
                                    <?php foreach ($result as $row) { ?>


                                        <tr>
                                            <td><?php echo $row->id; ?></td>
                                            <td><?php echo $row->admission_no; ?></td>
                                            <td><?php echo $row->full_name; ?></td>
                                            <td> <input name="checkboxs[]" class="checkbox1" type="checkbox" id="<?php echo'checkboxs[' . $row->id . ']'; ?>" value="<?php echo $row->id ?>"> </td>


                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>


                        </div>
                        <button type="submit" class="btn btn-raised btn-success" style="margin-left:15px;">Add </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="panel panel-info" style="margin-top: 20px">
                <div class="panel panel-heading">Daily Attendance Recode Log</div>
                <div class="panel panel-body">
                    <div class="row" >
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#table_id2').DataTable();
                            });
                        </script>
                        <div class="col-md-12" >
                            <table class="table table-hover" id="table_id2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Date created</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody id="fillgrid">
                                    <?php foreach ($result2 as $row) { ?>


                                        <tr>
                                            <td><?php echo $row->id; ?></td>
                                            <td><?php echo $row->date; ?></td>
                                            <td><?php echo $row->date_created; ?></td>
                                            <td><a href="<?php echo base_url("index.php/attendance/view_one_attendance"); ?>" data-id='<?php echo $row->id ?>' class='btnedit btn-raised' title='edit'><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                                            <!--<td> <input name="checkboxs[]" class="checkbox1" type="checkbox" id="<?php //echo'checkboxs[' . $row->id . ']';     ?>" value="<?php echo $row->id ?>"> </td>-->


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
<script>
    $(document).ready(function () {
        var btnedit = '';
        fillgrid();
        function fillgrid() {
            btnedit = $("#fillgrid .btnedit");
            var editurl = btnedit.attr('href');

            //edit record
            btnedit.on('click', function (e) {
                e.preventDefault();
                var editid = $(this).data('id');
                $.colorbox({
                    href: "<?php echo base_url() ?>index.php/attendance/view_one_attendance/" + editid,
                    top: 50,
                    width: 500,
                    onClosed: function () {
                        //location.reload();
                        fillgrid();
                    }
                });
            });
        }

    });
</script>
