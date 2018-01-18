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
            <!-- Varialbles -->
            <?php
                if (isset($_GET['action']) && $_GET['action'] == "approve" && isset($_GET['status']) && $_GET['action'] == true){
                    $succ_message = "Successfully Approved the Leave";
                }
                if(isset($_GET['action']) && $_GET['action'] == "approve" && isset($_GET['status']) && $_GET['action'] == false){
                    $error_message = "Failed to Approved the Leave";
                }
                if (isset($_GET['action']) && $_GET['action'] == "reject" && isset($_GET['status']) && $_GET['action'] == true){
                    $succ_message = "Successfully Rejected the Leave";
                }
                if(isset($_GET['action']) && $_GET['action'] == "reject" && isset($_GET['status']) && $_GET['action'] == false){
                    $error_message = "Failed to Reject the Leave";
                }
                // Redirect on success
                if (isset($_GET['action']) && isset($_GET['status'])){ ?>
                    <script type="text/javascript">
                        var redirect = function() {
                            window.location = "<?php echo base_url("index.php/leave"); ?>";
                        };

                        setTimeout(redirect, 3000);
                    </script>
            <?php } ?>
            <!--    Messages         -->
            <?php if (isset($error_message)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error </strong>
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>
            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success </strong>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>LEAVE DETAILS</strong>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo base_url("assets/img/teacher_icon.png"); ?>" height='120' width='120' class="img-circle"> </div>

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <?php
                                foreach ($leave_details as $row) {
                                    echo"<tbody>". PHP_EOL;
//                                    echo"<tr>". PHP_EOL;
//                                    echo"<td><b>Leave ID</b></td>". PHP_EOL;
//                                    echo"<td>".$row->id."</td>". PHP_EOL;
//                                    echo"</tr>". PHP_EOL;
                                    echo"<tr>". PHP_EOL;
                                    echo"<td><b>Name</b></td>". PHP_EOL;
                                    echo"<td>".$row->full_name."</td>". PHP_EOL;
                                    echo"</tr>". PHP_EOL;
                                    echo"<tr>". PHP_EOL;
                                    echo"<td><b>Leave Type</b></td>". PHP_EOL;
                                    echo"<td>".$row->name."</td>". PHP_EOL;
                                    echo"</tr>". PHP_EOL;

                                    echo"<tr>". PHP_EOL;
                                    echo" </tr><tr>". PHP_EOL;
                                    echo"<td><b>Applied Date</b></td>". PHP_EOL;
                                    echo"<td>".$row->applied_date."</td>". PHP_EOL;
                                    echo"</tr>". PHP_EOL;
                                    echo"<tr>". PHP_EOL;
                                    echo"<td><b>Leave Start Date</b></td>". PHP_EOL;
                                    echo"<td>".$row->start_date."</td>". PHP_EOL;
                                    echo"</tr>". PHP_EOL;
                                    echo"<tr>". PHP_EOL;
                                    echo"<td><b>Duty Resuming Date</b></td>". PHP_EOL;
                                    echo"<td>".$row->end_date."</td>". PHP_EOL;
                                    echo"</tr>". PHP_EOL;
                                    echo"<tr>". PHP_EOL;
                                    echo"<td><b>Reason</b></td>". PHP_EOL;
                                    echo"<td>".$row->reason."</td>". PHP_EOL;
                                    echo"</tr>". PHP_EOL;
                                    echo"<tr>". PHP_EOL;
                                    echo"<td><b>No of Days</b></td>". PHP_EOL;
                                    echo"<td>".$row->no_of_days."</td>". PHP_EOL;
                                    echo"</tr>". PHP_EOL;
                                    echo"<tr>". PHP_EOL;
                                    echo"<td><b>Leave Status</b></td>". PHP_EOL;

                                    if ($row->status == "Pending") {
                                        echo "<td><span class='label label-primary'>" . $row->status . "</span></td>" . PHP_EOL;
                                    } elseif ($row->status == "Approved") {
                                        echo "<td><span class='label label-success'>" . $row->status . "</span></td>" . PHP_EOL;
                                    } else {
                                        echo "<td><span class='label label-danger'>" . $row->status . "</span></td>" . PHP_EOL;
                                    }

                                    echo"</tr>". PHP_EOL;
                                    echo"</tbody>". PHP_EOL;



                                    echo"</table>". PHP_EOL; ?>
                            <!-- Check if the leave is pending -->
                            <?php if ($row->status == "Pending") { ?>
                              <button id="btnLeaveHistory" data-leave-id="<?php echo $row->id; ?>" class="btn btn-raised btn-raised btn-info" class="btn btn-raised btn-info" data-toggle="modal" data-target=".btnLeaveHistory">Leave History</button>

                              <div class="modal fade btnLeaveHistory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel">Leave History</h4>
                                    </div>
                                    <div class="modal-body">

                                      <table class="table table-hover">
                                          <thead>
                                              <tr>
                                                  <th>Leave Type</th>
                                                  <th>Total</th>
                                                  <th>Available</th>
                                                  <th>Taken</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td>Casual</td>
                                                  <td><?php echo $casual_leaves ?></td>
                                                  <td><?php echo ($casual_leaves - $applied_casual_leaves) ?></td>
                                                  <td><?php echo $applied_casual_leaves ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Medical</td>
                                                  <td><?php echo $medical_leaves ?></td>
                                                  <td><?php echo ($medical_leaves - $applied_medical_leaves) ?></td>
                                                  <td><?php echo $applied_medical_leaves ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Duty</td>
                                                  <td><?php echo $duty_leaves ?></td>
                                                  <td><?php echo ($duty_leaves - $applied_duty_leaves) ?></td>
                                                  <td><?php echo $applied_duty_leaves ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Other</td>
                                                  <td><?php echo $other_leaves ?></td>
                                                  <td><?php echo ($other_leaves - $other_leaves) ?></td>
                                                  <td><?php echo $applied_other_leaves ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Maternity</td>
                                                  <td><?php echo $maternity_leaves ?></td>
                                                  <td><?php echo ($maternity_leaves - $applied_maternity_leaves) ?></td>
                                                  <td><?php echo $applied_maternity_leaves ?></td>
                                              </tr>
                                              <tr>
                                                  <td><b>Total</b></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td><b><?php echo $total_leaves ?></b></td>
                                              </tr>
                                          </tbody>
                                      </table>

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn  btn-raised btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <a id="btnApprove" data-leave-id="<?php echo $row->id; ?>" class="btn btn-raised btn-success">Approve</a>
                              <a id="btnReject" data-leave-id="<?php echo $row->id; ?>"  class="btn btn-raised btn-danger">Reject</a>
                            <?php } ?>
                                <?php
                                    }
                                ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
 // Approve Leave
  $('#btnApprove').click(function() {
    var leaveid = $(this).attr("data-leave-id");
    approve(leaveid);
  });

  function approve(leaveid) {
    swal({
      title: "Are you sure?",
      text: "Are you sure that you want to Appove this Leave?",
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, Approve it!",
      confirmButtonColor: "#5cb85c"
    }, function() {
        window.location.href = "<?php echo base_url("index.php/leave/approve_leave"); ?>" + "/" + leaveid;
    });
  }

  // Reject Leave
  $('#btnReject').click(function() {
    var leaveid = $(this).attr("data-leave-id");
    reject(leaveid);
  });

  function reject(leaveid) {
    swal({
      title: "Are you sure?",
      text: "Are you sure that you want to Reject this Leave?",
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, Reject it!",
      confirmButtonColor: "#ec6c62"
    }, function() {
        window.location.href = "<?php echo base_url("index.php/leave/reject_leave"); ?>" + "/" + leaveid;
    });
  }

  </script>
