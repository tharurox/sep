    <script type="text/javascript" src="cdn.datatables.net/buttons/1.5.0/js/buttons.html5.min.js"> </script>
    <div class="container">
        <div class="row">
        <div class="col-md-3">
            <?php $this->view('teacher/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <div class="row">
                <?php if (isset($succ_message)) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $succ_message; ?>
                    </div>
                <?php } ?>
                <?php if (isset($err_message)) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $err_message; ?>
                    </div>
                <?php } ?>
            </div>
        
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#teacherList').DataTable( {   

                                    "processing": true,
                                     "dom": 'lBfrtip',
                                    buttons:[ 'colvis',
                                                {
                                             extend: 'pdfHtml5',
                                             customize: function(doc) {
                                             doc.content.splice( 1, 0, {
                                             margin: [ 0, 0, 0, 5 ],
                                             alignment: 'center',
                                             image: 'data:image/jpeg;base64,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'
                                             } );
                                             }, 
                                             title:'Teacher Details',
                                             exportOptions: {
                                             columns: ':visible'
                                                            },

                                                        }
                                     ],
                                    columnDefs: [ {
                                    targets:[-2,-3,-4,-5,-6,-7,-8,-9,-10,-11,-12,-13,-14,-15],
                                   visible: false
                                    } ]
                                   } );
                            });
                        </script>
                        <table id="teacherList" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIC</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Grade</th>
                                    <th>Medium</th>
                                    <th>Contact</th>
                                    <th>Serial Number</th>
                                    <th>Personal File Numnber</th>
                                    <th>Gender</th>
                                    <th>Section</th>
                                    <th>Teacher Reg Nu</th>
                                    <th>Nic Number </th>
                                    <th>Service</th>
                                    <th>AppointmentNature</th>
                                    <th>DOB</th>
                                    <th>Civil Status</th>
                                    <th>Joined Date</th>
                                    <th>Pension Date</th>
                                    <th>Educational Qualifications</th>
                                    <th>Remarks</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row) { ?>
                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->nic_no; ?></td>
                                <td><?php echo $row->full_name; ?></td>
                                <td><?php  $gender=$row->gender;
                                 if ($gender == 'm') {
                                        echo 'Male';
                                    } else if ($gender == 'f') {
                                        echo 'Female';
                                    }
                                ?></td>
                                <td><?php echo $row->grade; ?></td>
                                <td><?php
                                    $med = $row->medium;
                                    if ($med == 's') {
                                        echo 'Sinhala';
                                    } else if ($med == 'e') {
                                        echo 'English';
                                    } else if ($med == 't') {
                                        echo 'Tamil';
                                    }
                                    ?></td>
                                <td><?php echo $row->contact_mobile; ?></td>
                                <td><?php echo $row->serial_no; ?></td>
                                <td><?php echo $row->personal_file_no; ?></td>
                                <td><?php echo $row->gender; ?></td>
                                <td><?php echo $row->section; ?></td>
                                <td><?php echo $row->teacher_register_no; ?></td>
                                <td><?php echo $row->nic_no; ?></td>
                                <td><?php echo $row->service; ?></td>
                                <td><?php echo $row->nature_of_appointment; ?></td>
                                <td><?php echo $row->dob; ?></td>
                                <td><?php echo $row->civil_status; ?></td>
                                <td><?php echo $row->joined_date; ?></td>
                                <td><?php echo $row->pension_date; ?></td>
                                <td><?php echo $row->educational_qualific; ?></td>
                                <td><?php echo $row->remarks; ?></td>
                                <td>
                                <a href="<?php echo base_url("index.php/profile") . "?key=" . $row->user_id;?>" class="btn btn-raised btn-primary btn-xs" aria-hidden="true"><i class="fa fa-eye"></i></a>
                                <a href="<?php echo base_url("index.php/teacher/load_teacher") . "/" . $row->id; ?>" class="btn btn-raised btn-primary btn-xs" aria-hidden="true"><i class="fa fa-edit"></i></a>&nbsp;
                                <a id="delete-user" data-user-id="<?php echo $row->user_id; ?>" class="btn btn-raised btn-danger btn-xs del" aria-hidden="true"><i class="fa fa-trash"></i></a></td>

                            </tr>
                         

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
  $('.del').click(function() {
    var userId = $(this).attr("data-user-id");
    deleteUser(userId);
  });

  function deleteUser(userId) {

    swal({
      title: "Are you sure?",
      text: "Are you sure that you want to delete this user?",
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, delete it!",
      confirmButtonColor: "#ec6c62"
    }, function() {
        window.location.href = "<?php echo base_url("index.php/teacher/archive_teacher") ?>" + "/" + userId;
    });


  }

  </script>
