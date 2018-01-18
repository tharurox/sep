<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php
            if($user_type == 'A'){
                $this->view('event/admin_sidebar_nav');
            }else{
                $this->view('event/sidebar_nav_teacher');
            }

            ?>
        </div>

        <div class="col-md-9">
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
            <?php if ($this->session->flashdata('succ')) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('succ'); ?>
            </div>
            <?php } ?>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Create New Event Type</strong>
                </div>
                <div class="panel-body">
                    <?php
                    // Change the css classes to suit your needs

                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('event/create_event_type', $attributes);
                    ?>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Event Type</label>
                        <div class="col-sm-5">
                            <input id="event_type" type="text" name="event_type"  value="<?php if(isset($succ_message)){ echo '';}else{echo set_value('event_type');} ?>" type="text" class="form-control" id="event_type" placeholder="Event Name">
                            <?php echo form_error('event_type'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-5">

                            <textarea id="description" type="text" name="description" type="text" class="form-control" id="description" placeholder=""><?php if(isset($succ_message)){ echo '';}else{echo set_value('description');} ?></textarea>
                            <?php echo form_error('description'); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-raised btn-primary" value="Add">
                            <button type="reset" class="btn btn-raised btn-default">Reset</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Current Event Types</strong>
                </div>
                <div class="panel-body">
                    <?php
                            if(count($details) == 0){ ?>
                                <div class="col-md-12 col-md-offset-* text-center">
                                   <div class="well well-lg">
                                        <i class="fa fa-exclamation-triangle fa-5x"></i>
                                        <div class="">
                                          <h2>No Event Types Found</h2>
                                        </div>
                                   </div>
                                </div>

                            <?php
                            }else{ ?>
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Event Type</th>
                            <th>Event Description</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($details as $row) { ?>


                            <tr>
                                <td><?php echo $row->event_type; ?></td>
                                <td><?php echo $row->description; ?></td>
                                <td><a href="<?php echo base_url("index.php/event/view_event_type_details") . "/" . $row->id; ?>" class="btn btn-raised btn-primary btn-xs" aria-hidden="true"><i class="fa fa-eye"></i></a></td>
                                <td><a id="delete-user" data-user-id="<?php echo $row->id; ?>" class="btn btn-raised btn-danger btn-xs del" aria-hidden="true"><i class="fa fa-trash"></i></a></td>            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } ?>


                </div>
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
      text: "Are you sure that you want to delete this ?",
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, delete it!",
      confirmButtonColor: "#ec6c62"
    }, function() {
        window.location.href = "<?php echo base_url("index.php/event/delete_event_type")?>" + "/" + userId;
    });


  }

  </script>
