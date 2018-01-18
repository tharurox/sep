<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('teacher/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Generate Teacher Reports</div>
                <div class="panel-body">
                    <?php
                    // Change the css classes to suit your needs
                    $l=0;
                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('teacher/report_pdf'."/".$value, $attributes);
                    ?>
                    <div class="row" style="margin-left: 1em; margin-bottom: 2em;">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo base_url("assets/img/info_ico.png"); ?>" width="64px" height="64px">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Teacher Report</h4>
                                There are two report types. "Section" report and "Teacher" report. In Section report, you can
                                print section wise reports. In Teacher report, you can print individual teacher report.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select id="reporttype" name="reporttype" class="form-control" onchange="report_type()">
                                        <option value="0" <?php if($value==0){ echo 'selected="selected"';} ?>>Select Report Type</option>
                                        <option value="1" <?php if($value==1){ echo 'selected="selected"';} ?>>Section Report</option>
                                        <option value="2" <?php if($value==2){ echo 'selected="selected"';} ?>>Teacher Report</option>
                                    </select>
                                    <?php echo form_error('reporttype'); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <?php if ($value == 0) { ?>

                                    <?php } else if ($value == 1) { $l = 1; ?>
                                        <select id="report" name="report" class="form-control">
                                            <option value="1">1/5</option>
                                            <option value="2">6/7</option>
                                            <option value="3">8/9</option>
                                            <option value="4">10/11</option>
                                            <option value="5">A/L Science</option>
                                            <option value="6">A/L Commerce</option>
                                            <option value="7">A/L Arts</option>
                                        </select>
                                    <?php } else if ($value == 2) { $l = 2; ?>
                                        <select id="report" name="report" class="form-control">
                                            <?php
                                            foreach ($users as $row) {
                                                //echo "<option value='" . $row->event_type . "'>" . $row->event_type . "</option>";
                                                echo "<option value='$row->id'>$row->full_name</option>";
                                            }
                                            ?>
                                        </select>
                                    <?php } else {
                                        $l = 3;
                                    } ?>

                                        <?php echo form_error('report'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" class="btn btn-raised btn-danger" value="Genarate Report">
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                        <div class="row">
                            <div class="col-md-12 col-md-offset-* text-center">
                                <div class="well well-lg" id="teacher_rep">
                                    <i class="fa fa-exclamation-triangle fa-5x"></i>
                                    <div class="page-header">
                                      <h1>No Data Found</h1>
                                    </div>
                               </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $('#report').on('change', function () {
        formdata = new FormData();
        var type = document.getElementById('reporttype').value;
        var report = document.getElementById('report').value;
        if (formdata) {
            formdata.append("tpe", type);
            formdata.append("rpt", report);
        }
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/teacher/generate_report/",
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
        }).done(function (data) {
            $("#teacher_rep").html(data);
        });

    });
</script>

<script type="text/javascript">
    function report_type() {
        var item = document.getElementById('reporttype').value;
        if (item == 0) {
            window.location = "<?php echo base_url('index.php/teacher/teacher_report') . "/" . "0"; ?>";
        }
        else if (item == 1) {
            window.location = "<?php echo base_url('index.php/teacher/teacher_report') . "/" . "1"; ?>";
        }
        else if (item == 2) {
            window.location = "<?php echo base_url('index.php/teacher/teacher_report') . "/" . "2"; ?>";
        }
    }

</script>
