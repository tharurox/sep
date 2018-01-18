<!-- Admin side Nav Bar Start -->
<?php if($user_type == 'A'){ ?>
  <div class="panel-group" id="accordion">
      <div class="panel panel-info">
          <div class="panel-heading">
              <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-university"></i>
                      Class Managment</a>
              </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse in">
              <div class="panel-body">
                  <table class="table">
                      <tr>
                          <td>
                              <span class="glyphicon glyphicon-list-alt text-warning"></span><a href="<?php echo base_url('index.php/classes/'); ?>">Classes List</a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <span class="glyphicon glyphicon-blackboard text-warning"></span><a href="<?php echo base_url('index.php/classes/create'); ?>">Create Class</a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <span class="glyphicon glyphicon-education text-warning"></span><a href="<?php echo base_url('index.php/classes/students_without_class'); ?>">Assign Students</a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <span class="glyphicon glyphicon-folder-open text-warning"></span><a href="<?php echo base_url('index.php/classes/reports'); ?>">Reports</a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <span class="	glyphicon glyphicon-random text-warning"></span><a href="<?php echo base_url('index.php/classes/update_grade'); ?>">Auto Genarate Classes</a>
                          </td>
                      </tr>
                  </table>
              </div>
          </div>
      </div>
  </div>
<?php } ?>
<!-- End of Side Admin Side Bar -->

<!-- Teacher Side Nav Bar Start -->
<?php if($user_type == 'T'){ ?>
  <div class="panel-group" id="accordion">
      <div class="panel panel-info">
          <div class="panel-heading">
              <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-university"></i>
                      Class Managment</a>
              </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse in">
              <div class="panel-body">
                  <table class="table">
                      <tr>
                          <td>
                              <span class="glyphicon glyphicon-list-alt text-warning"></span><a href="<?php echo base_url('index.php/classes/view_class_teacher'); ?>">Classes List</a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <i class="fa fa-clock-o text-primary"></i><a href="<?php echo base_url('index.php/timetable/view_teacher_timetable'); ?>">&nbsp;&nbsp;&nbsp;Time Table</a>
                          </td>
                      </tr>
                        <tr>
                        <td>
                            <i class="fa fa-table text-primary" aria-hidden="true"></i><a href="<?php echo base_url('index.php/timetable/teacher_create_timetable'); ?>">&nbsp;&nbsp;&nbsp;Create Timetable</a>
                        </td>
                    </tr>
                  </table>
              </div>
          </div>
      </div>
  </div>
<?php } ?>
<!-- End of Side Teacher Side Bar -->
