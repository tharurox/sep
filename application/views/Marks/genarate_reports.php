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
              <div class="col-md-10">
                <?php echo form_open(); ?>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <h4>Acadamic Year:</h4>
                      </div>
                      <div class="col-md-5">
                        <input type="text" class="form-control" name="examname" placeholder="Examination Name">
                      </div>
                    </div>
                  </div>
									<div class="form-group">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <h4>Student ID:</h4>
                      </div>
                      <div class="col-md-5">
                        <input type="text" class="form-control" name="examname" placeholder="Student ID">
                      </div>
                    </div>
                  </div>
									<div class="form-group">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <h4>Exam Type:</h4>
                      </div>
                      <div class="col-md-4">
                        <select class="form-control">
                          <option value="0">Select a Exam Type</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2 col-md-offset-2">
                        <input type="button" class="btn btn-primary btn-raised" value="Genarate Reports">
                      </div>
                    </div>
                  </div><hr>
                <?php echo form_close(); ?>
              </div><hr>
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
  </div>
</div>
