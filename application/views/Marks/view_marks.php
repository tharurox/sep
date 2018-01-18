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
              <strong>Marks List</strong>
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
                          <h4 class="media-heading">Marks</h4>
                        Marks of the students can be entered to a given student of a particular grade.
                      </div>
                  </div>
              </div><hr>
              <div class="col-md-10">
                <?php echo form_open(); ?>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <h4>Examination Name:</h4>
                      </div>
                      <div class="col-md-5">
                        <select id="name" name="name" class="form-control">
                          <option value="0" <?php if (set_value('name') == '0') { echo "selected"; } ?>Examination name</option>
                          <?php foreach($names as $name)  { ?>
                            <option value="<?php echo $name->id; ?>"><?php echo $name->name; ?> </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <h4>Student ID:</h4>
                      </div>
                      <div class="col-md-5">
                        <input type="text" class="form-control" name="student_id" placeholder="Student ID">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <h4>Subject Name:</h4>
                      </div>
                      <div class="col-md-4">
                        <select id="name" name="subject_id" class="form-control">
                          <option value="0" <?php if (set_value('name') == '0') { echo "selected"; } ?>Select a Subject</option>
                          <?php foreach($subjects as $subject)  { ?>
                            <option value="<?php echo $subject->id; ?>"><?php echo $subject->subject_name; ?> </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <h4>Mark:</h4>
                      </div>
                      <div class="col-md-4">
                        <input type="number" class="form-control" name="marks">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2 col-md-offset-2">
                        <input type="submit" class="btn btn-primary btn-raised" value="Submit">
                      </div>
                      <div class="col-md-2">
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
