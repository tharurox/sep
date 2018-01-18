<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('classes/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
          <?php if ($succ_message) { ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $succ_message; ?>
              </div>
          <?php } ?>
            <h3>Upadte Classes</h3>
            <?php
            $error_prefix = "<p class=\"help-block error\">";
            $error_suffix = "</p>";
            $attributes = array('class' => 'form-horizontal');
            ?>
            <!-- primary section -->
            <div class="container">
              <?php echo form_open('classes/update_grade', $attributes); ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <select class="form-control" id="grade" name="grade">
                                  <option value="select_grade">Select Grade</option>
                                  <option value="2">Grade 2</option>
                                  <option value="3">Grade 3</option>
                                  <option value="4">Grade 4</option>
                                  <option value="5">Grade 5</option>
                                  <option value="6">Grade 6</option>
                                  <option value="7">Grade 7</option>
                                  <option value="8">Grade 8</option>
                                  <option value="9">Grade 9</option>
                                  <option value="10">Grade 10</option>
                                  <option value="11">Grade 11</option>
                              </select>
                              <?php echo form_error('grade', $error_prefix, $error_suffix); ?>
                          </div>
                        </div>
                      </div>

                        <div class="col-md-4">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                </div>
              <?php echo form_close(); ?>
            </div>
            <br>

            </div>
        </div>
    </div>
</div>
