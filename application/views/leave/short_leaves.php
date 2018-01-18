<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php
            if($user_type == 'A'){
                $this->view('leave/admin_sidebar');
            }
            elseif($user_type == 'T'){
                $this->view('leave/teacher_sidebar');
            }
            else{
                $this->view('leave/teacher_sidebar');
            }

            ?>
        </div>
        <div class="col-md-9">
            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success </strong>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <?php if (isset($error_message)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error </strong>
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>APPLY SHORT LEAVE</strong>
                </div>
                <div class="panel-body">
                <!-- Start of form -->
                    <?php
                        // Change the css classes to suit your needs
                        $attributes = array('class' => '', 'id' => 'frm_apply');
                        echo form_open('leave/apply_short_leave', $attributes);
                    ?>
                    <div class="row">
                        <div class="col-md-4"><label>Leave Type</label></div>
                        <div class="col-md-4"><label>Date</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                echo "<select name='cmb_leavetype' id='cmb_leavetype'  class='form-control'>" . PHP_EOL;
                                echo "<option value='0'>- Select Type -</option>". PHP_EOL;
                                foreach ($leave_types as $row) {
                                    echo "<option value='" . $row->id . "'>" . $row->name . "</option>" . PHP_EOL;
                                }
                                echo "</select>" . PHP_EOL;
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" value="<?php echo set_value('txt_date'); ?>" name="txt_date" id="txt_date" placeholder="Date"    type="date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Reason</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                                    <textarea class="form-control" value="<?php echo set_value('txt_reason'); ?>" rows="3" id="txt_reason" name="txt_reason"></textarea>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <button type="button" id="submitbutton" class="btn btn-raised btn-success">Apply</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php echo form_close(); ?>

                    <script type="text/javascript">
                        $(document).ready(function() {
                          $('#submitbutton').click(function() {

                                if(!$("#txt_date").val() || !$("#txt_reason").val() || $("#cmb_leavetype").val() == 0 ){
                                    $( "#frm_apply" ).submit();
                                } else if($("#cmb_leavetype").val() == 2){
                                    $( "#frm_apply" ).submit();
                                } else {
                                    var count = "<?php echo $short_leave_count; ?>";
                                    if(count >= 2){
                                        ShowConfirmYesNo();
                                    } else {
                                        $( "#frm_apply" ).submit();
                                    }
                                }
                            });
                        });
                    </script>


                    <!-- Warning Message -->
                    <div id="modalConfirmYesNo" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button"
                                    class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 id="lblTitleConfirmYesNo" class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p id="lblMsgConfirmYesNo"></p>
                                </div>
                                <div class="modal-footer">
                                    <button id="btnYesConfirmYesNo"
                                    type="button" class="btn btn-raised btn-primary">Yes</button>
                                    <button id="btnNoConfirmYesNo"
                                    type="button" class="btn btn-raised btn-default">No</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        function AsyncConfirmYesNo(title, msg, yesFn, noFn) {
                            var $confirm = $("#modalConfirmYesNo");
                            $confirm.modal('show');
                            $("#lblTitleConfirmYesNo").html(title);
                            $("#lblMsgConfirmYesNo").html(msg);
                            $("#btnYesConfirmYesNo").off('click').click(function () {
                                yesFn();
                                $confirm.modal("hide");
                            });
                            $("#btnNoConfirmYesNo").off('click').click(function () {
                                noFn();
                                $confirm.modal("hide");
                            });
                        }

                        function ShowConfirmYesNo() {
                            var val = AsyncConfirmYesNo(
                                "<i class='fa fa-exclamation-triangle'></i> - You have Already Applied  "+ "<?php echo $short_leave_count; ?>" + " Short Leaves this month",
                                "Are you sure you wants to continue?",
                                MyYesFunction,
                                MyNoFunction
                            );

                            return false;
                        }

                        function MyYesFunction() {
                            $( "#frm_apply" ).submit();
                        }
                        function MyNoFunction() {

                        }

                    </script>

                <!-- End of Panel body -->
                </div>
            </div>

            <div class="panel panel-info">
              <div class="panel-heading">
                <strong>THIS MONTH SHORT LEAVES</strong>
              </div>
              <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Leave Type</th>
                            <th>Applied Date</th>
                            <th>Date</th>
                            <th>Reason</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($applied_leaves as $row) {
                             echo "<tr>" . PHP_EOL;
                             echo "<td scope='row'><span class='glyphicon glyphicon-folder-close'></span></td>";
                             echo "<td>" . $row->name . "</td>" . PHP_EOL;
                             echo "<td>" . $row->applied_date . "</td>" . PHP_EOL;
                             echo "<td>" . $row->date . "</td>" . PHP_EOL;
                             echo "<td>" . $row->reason . "</td>" . PHP_EOL;


                            if ($row->status == "Pending") {
                                 echo "<td><span class='label label-primary'>" . $row->status . "</span></td>" . PHP_EOL;
                            } elseif ($row->status == "Approved") {
                                echo "<td><span class='label label-success'>" . $row->status . "</span></td>" . PHP_EOL;
                            } else {
                                echo "<td><span class='label label-danger'>" . $row->status . "</span></td>" . PHP_EOL;
                            }
                            echo "</tr>" . PHP_EOL;
                         }
                        ?>
                    </tbody>
                </table>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>RECENT SHORT LEAVES</strong>
              </div>
              <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Leave Type</th>
                            <th>Applied Date</th>
                            <th>Date</th>
                            <th>Reason</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($recent_applied_leaves as $row) {
                             echo "<tr>" . PHP_EOL;
                             echo "<td scope='row'><span class='glyphicon glyphicon-folder-close'></span></td>";
                             echo "<td>" . $row->name . "</td>" . PHP_EOL;
                             echo "<td>" . $row->applied_date . "</td>" . PHP_EOL;
                             echo "<td>" . $row->date . "</td>" . PHP_EOL;
                             echo "<td>" . $row->reason . "</td>" . PHP_EOL;


                            if ($row->status == "Pending") {
                                 echo "<td><span class='label label-primary'>" . $row->status . "</span></td>" . PHP_EOL;
                            } elseif ($row->status == "Approved") {
                                echo "<td><span class='label label-success'>" . $row->status . "</span></td>" . PHP_EOL;
                            } else {
                                echo "<td><span class='label label-danger'>" . $row->status . "</span></td>" . PHP_EOL;
                            }
                            echo "</tr>" . PHP_EOL;
                         }
                        ?>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
