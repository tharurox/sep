<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php  {
                        $this->view('teacher/sidebar_nav');
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

            <?php
                    // Change the css classes to suit your needs
                    $l=0;
                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('teacher/salary_report'."/".$salary->teacher_id);
                    ?>

            <div class="panel panel-info">
                <div class="panel-heading">Edit Account</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <?php
                        $error_prefix = "<p class=\"help-block error\">";
                        $error_suffix = "</p>"
                        ?>
                        
                        <!-- Open form to edit admin -->
                    
                        
                                 <table class="table table-user-information">
                                            <tbody>
                                                <tr>
                                                    <td><label>ඒකාබද්ද වැටුප </label></td>
                                                    <td><input type="text" name="value1" id="value1" value="<?php echo $salary->value1; ?>" disabled="true"></td>

                                                     <td><label>හිඟ වැටුප් ගෙවීම් </label></td>
                                                    <td><input type="text" name="value2" id="value2" value="<?php echo $salary->value2; ?>" disabled="true"></td>
                                                </tr>
                                                <tr>
                                                    <td><label>ජිවන වියදම් දීමනාව </label></td>
                                                    <td><input type="text" name="value3" id="value3" value="<?php echo $salary->value3; ?>" disabled="true"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>විදුහල්පති දීමනා</label></td>
                                                    <td><input type="text" name="value4" id="value4" value="<?php echo $salary->value4; ?>" disabled="true"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>වෙනත් දීමනා </label></td>
                                                    <td><input type="text" name="value5" id="value5" value="<?php echo $salary->value5; ?>" disabled="true"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>ජිවන වියදම් දීමනාව </label></td>
                                                    <td><input type="text" name="value6" id="value6" value="<?php echo $salary->value6; ?>" disabled="true"></label></td>
                                                </tr>
                                                <tr>
                                                
                                               
                                                </tr>

                                                 <tr>
                                                  <td><label><b>අඩු කිරීම්</b></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>වැ.අ.වි.වැ. </label></td>
                                                    <td><input type="text" name="subvalue1" id="subvalue1" value="<?php echo $salary->subvalue1; ?>" disabled="true"></label></td>
                                                
                                                    <td><label>සී.ස.අ.සේ.ස.ණ.ස</label></td>
                                                    <td><input type="text" name="subvalue2" id="subvalue2" value="<?php echo $salary->subvalue2; ?>" disabled="true"></label></td>
                                                </tr>
                                                    <tr>
                                                    <td><label>උත්සව අත්තිකාරම්</label></td>
                                                    <td><input type="text" name="subvalue3" id="subvalue3" value="<?php echo $salary->subvalue3; ?>" disabled="true"></label></td>
                                               
                                                    <td><label>විශේෂ අත්තිකාරම්</label></td>
                                                    <td><input type="text" name="subvalue4" id="subvalue4" value="<?php echo $salary->subvalue4; ?>" disabled="true"></label></td>
                                                </tr>
                                                 <tr>
                                                    <td><label>ආපදා ණය වාරිකය</label></td>
                                                    <td><input type="text" name="subvalue5" id="subvalue5" value="<?php echo $salary->subvalue5; ?>" disabled="true"></label></td>
                                                    <td><label>දේපල ණය</label></td>
                                                    <td><input type="text" name="subvalue6" id="subvalue6" value="<?php echo $salary->subvalue6; ?>" disabled="true"></label></td>
                                                </tr>
                                                 <tr>
                                                    <td><label>නිවාස කුළී</label></td>
                                                    <td><input type="text" name="subvalue7" id="subvalue7" value="<?php echo $salary->subvalue7; ?>" disabled="true"></label></td>
                                              
                                                    <td><label>විදුලි බිල්</label></td>
                                                    <td><input type="text" name="subvalue8" id="subvalue8" value="<?php echo $salary->subvalue9; ?>" disabled="true"></label></td>
                                                </tr>
                                                 <tr>
                                                    <td><label>මුද්දර ගාස්තු</label></td>
                                                    <td><input type="text" name="subvalue9" id="subvalue9" value="<?php echo $salary->subvalue9; ?>" disabled="true"></label></td>
                                              
                                                    <td><label>රජයේ නිලධාරීන්ගේ යහසාධක සංගමය</label></td>
                                                    <td><input type="text" name="subvalue10" id="subvalue10" value="<?php echo $salary->subvalue10; ?>" disabled="true"></label></td>
                                                </tr>
                                                 <tr>
                                                    <td><label>රා‍ජ්‍ය සේවක දේපළ ණය වාරිකය</label></td>
                                                    <td><input type="text" name="subvalue11" id="subvalue11" value="<?php echo $salary->subvalue11; ?>" disabled="true"></label></td>
                                                
                                                    <td><label>වෙනත්</label></td>
                                                    <td><input type="text" name="subvalue12" id="subvalue12" value="<?php echo $salary->subvalue12; ?>" disabled="true"></label></td>
                                                </tr>

                         
                        </tbody>
                      
                        </table>
                       

                        </div>

                         
                        </div>
                          <div class="col-md-3">
                                <input type="submit" class="btn btn-raised btn-danger" value="Genarate Report">
                            </div>
                    
                         
                        <button name="approve" id="approve" sal-value="<?php echo $salary->teacher_id; ?>" class="btn btn-raised btn-success">Approve</button>
                        <button type="reset" data-user-id="" class="btn btn-raised btn-danger">Reject</a>
                      
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $('#approve').click(function() {
    var userId = $(this).attr("sal-value");
    approveSheet(userId);
  });   

  function approveSheet(userId) {
    swal({
      title: "Are you sure?",
      text: "Are you sure that you want to approve the salary sheet?",
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Approve it!",
      confirmButtonColor: "#228B22"
    }, function() {
         window.location.href = "<?php echo base_url("teacher/salary_report"); ?>" + "/ + userId";
         window.location.href = "<?php echo base_url("index.php/teacher/approveSalaryReq"); ?>" + "/" + userId;


    });


  }

  </script>
