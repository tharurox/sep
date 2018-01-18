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
              <strong>Enter Exam Marks</strong>
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
                          <h4 class="media-heading">Exam Details</h4>

                          The exam details is displayed.

                          The details of marks can be viewed here

                      </div>
                  </div>
              </div><hr>
              <div class="col-md-10">
                <?php echo form_open(); ?>
									<!-- table -->
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
