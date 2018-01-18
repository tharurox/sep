<div class="container">
  <div class="row">

    <div class="col-md-3">
      <?php $this->view('certificate/sidebar_nav'); ?>
    </div>

    <div class="col-md-9">
      <div class="panel panel-info">
        <div class="panel-heading">Character Certificate</div>

        <?php
        $error_prefix = "<p class=\"help-block error\">";
        $error_suffix = "</p>";
        $attributes = array('class' => 'form-horizontal');
        ?>

        <?php echo form_open('certificate/report_pdf_character', $attributes); ?>

        <div class="panel-body">
          <div class="media">
              <div class="media-left">
                  <a href="#">
                      <i class="fa fa-certificate fa-4x" aria-hidden="true"></i>
                  </a>
              </div>
              <div class="media-body">
                  <h4 class="media-heading">Character Certificate</h4>
                        The character certificate can be genarated using the student id or the student name.Other fields are automaticaly genarated.
                        Because of that you can easily genarate reports and print reports
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-md-3 col-md-offset-1">
                <input type="text" name="student_id" placeholder="Student ID" class="form-control" id="student_id">
              </div>
              <div class="col-md-3 col-md-offset-1">
                <input type="text" name="std_name" placeholder="Name of the Student" class="form-control">
              </div>
              <div class="col-md-3">
                <input type="button" name="src_btn" value="Search" class="btn btn-raised btn-primary" onclick="abc()">
              </div>
            </div>

            <br><br>

            <div class="row">
              <div class="col-md-9 col-md-offset-1">
                <label for="description">Description:</label>
                <textarea class="form-control" rows="5" id="description" name="description"></textarea>
              </div>
            </div>

            
            <div class="container form-group">
              <input type="submit" class="btn btn-raised btn-danger" value="Genarate Report">
            </div>

            <hr>

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

        <?php echo form_close(); ?>
    </div>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    function abc() {
        formdata = new FormData();
        var student_id = document.getElementById('student_id').value;
        if (formdata) {
            formdata.append("tpe", student_id);
        }
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/certificate/generate_character",
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
        }).done(function (data) {
            $("#teacher_rep").html(data);
        });

    }
</script>
