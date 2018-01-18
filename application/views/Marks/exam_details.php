<div class="container">
  <div class="row">
    <div class="col-md-3">
      <?php $this->view('Marks/sidebar_nav'); ?>
    </div>
    <div class="col-md-9">
      <div class="container">
        <div class="col-md-9">
          <div class="panel panel-info">
            <div class="panel-heading">
              <strong>Enter Exam Details</strong>
            </div>
            <div class="panel-body">
              <div class="row" style="margin-left: 1em; margin-bottom: 2em;">
                  <div class="media">
                      <div class="media-left">
                          <a href="#">
                              <img class="media-object" src="<?php echo base_url("assets/img/info_ico.png"); ?>" width="64px" height="64px">
                          </a>
                      </div>
                      <div class="media-body">
                          <h4 class="media-heading">Examination Details</h4>
                          The examination details can be entered to the system by means of giving the start and the relevant end dates of the examination.
                      </div>
                  </div>
              </div><hr>
              <div class="col-md-10">
                <?php
                $error_prefix = "<p class=\"help-block error\">";
                $error_suffix = "</p>";
                $attributes = array('class' => 'form-horizontal');
                ?>
                <?php echo form_open('marks/exam_marks'); ?>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <h4>Examination Name:</h4>
                      </div>
                      <div class="col-md-5">
                        <input type="text" class="form-control" name="examname" placeholder="Examination Name">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <h4>Year:</h4>
                      </div>
                      <div class="col-md-5">
                        <input type="text" class="form-control" name="year" placeholder="Year">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <h4>Grade:</h4>
                      </div>
                      <div class="col-md-4">
                        <select id="name" name="grade" class="form-control">
                          <option value="0" <?php if (set_value('name') == '0') { echo "selected"; } ?>Select a Grade</option>
                          <?php foreach($ids as $name)  { ?>
                            <option value="<?php echo $name->id; ?>"><?php echo $name->name; ?> </option>
                          <?php } ?>
                        </select>

                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <h4>Start Date:</h4>
                      </div>
                      <div class="col-md-4">
                        <input type="Date" class="form-control" name="start_date">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <h4>End Date:</h4>
                      </div>
                      <div class="col-md-4">
                        <input type="Date" class="form-control" name="end_date">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2 col-md-offset-2">
                        <input type="submit" class="btn btn-primary btn-raised" value="Submit">
                      </div>
                      <div class="col-md-2 col-md-offset-1">
                        <input type="reset" class="btn btn-danger btn-raised" value="Reset">
                      </div>
                    </div>
                  </div>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
