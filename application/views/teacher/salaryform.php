<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php  {
                        $this->view('teacher/sidebar_nav_teacher');
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
            <div class="panel panel-info">
                <div class="panel-heading">Edit Account</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <?php
                        $error_prefix = "<p class=\"help-block error\">";
                        $error_suffix = "</p>"
                        ?>
                        <!-- Open form to edit admin -->
                        <?php echo form_open("teacher/submitSalarySheet/{$user_id->user_id}"); ?>
                    
                                 <table class="table table-user-information">
                                            <tbody>
                                                   <tr>
                                                  <td><label><b>ගෙවීම්</b></label></td>
                                                </tr>

                                                <tr>
                                                    <td><label>ඒකාබද්ද වැටුප </label></td>
                                                    <td><input type="text" name="value1" id="value1" value="" ></td>

                                                     <td><label>හිඟ වැටුප් ගෙවීම් </label></td>
                                                    <td><input type="text" name="value2" id="value2" value="" ></td>
                                                </tr>
                                                <tr>
                                                    <td><label>ජිවන වියදම් දීමනාව </label></td>
                                                    <td><input type="text" name="value3" id="value3" value="" ></label></td>
                                                
                                                    <td><label>විදුහල්පති දීමනා</label></td>
                                                    <td><input type="text" name="value4" id="value4" value="" ></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>වෙනත් දීමනා </label></td>
                                                    <td><input type="text" name="value5" id="value5" value="" ></label></td>
                                           
                                                    <td><label>ජිවන වියදම් දීමනාව </label></td>
                                                    <td><input type="text" name="value6" id="value6" value="" ></label></td>
                                                </tr>

                                                <tr>
                                                  <td><label><b>අඩු කිරීම්</b></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label>වැ.අ.වි.වැ. </label></td>
                                                    <td><input type="text" name="subvalue1" id="subvalue1" value=""></label></td>
                                                
                                                    <td><label>සී.ස.අ.සේ.ස.ණ.ස</label></td>
                                                    <td><input type="text" name="subvalue2" id="subvalue2" value=""></label></td>
                                                </tr>
                                                    <tr>
                                                    <td><label>උත්සව අත්තිකාරම්</label></td>
                                                    <td><input type="text" name="subvalue3" id="subvalue3" value=""></label></td>
                                               
                                                    <td><label>විශේෂ අත්තිකාරම්</label></td>
                                                    <td><input type="text" name="subvalue4" id="subvalue4" value=""></label></td>
                                                </tr>
                                                 <tr>
                                                    <td><label>ආපදා ණය වාරිකය</label></td>
                                                    <td><input type="text" name="subvalue5" id="subvalue5" value=""></label></td>
                                                    <td><label>දේපල ණය</label></td>
                                                    <td><input type="text" name="subvalue6" id="subvalue6" value=""></label></td>
                                                </tr>
                                                 <tr>
                                                    <td><label>නිවාස කුළී</label></td>
                                                    <td><input type="text" name="subvalue7" id="subvalue7" value=""></label></td>
                                              
                                                    <td><label>විදුලි බිල්</label></td>
                                                    <td><input type="text" name="subvalue8" id="subvalue8" value=""></label></td>
                                                </tr>
                                                 <tr>
                                                    <td><label>මුද්දර ගාස්තු</label></td>
                                                    <td><input type="text" name="subvalue9" id="subvalue9" value=""></label></td>
                                              
                                                    <td><label>රජයේ නිලධාරීන්ගේ යහසාධක සංගමය</label></td>
                                                    <td><input type="text" name="subvalue10" id="subvalue10" value=""></label></td>
                                                </tr>
                                                 <tr>
                                                    <td><label>රා‍ජ්‍ය සේවක දේපළ ණය වාරිකය</label></td>
                                                    <td><input type="text" name="subvalue11" id="subvalue11" value=""></label></td>
                                                
                                                    <td><label>වෙනත්</label></td>
                                                    <td><input type="text" name="subvalue12" id="subvalue12" value=""></label></td>
                                                </tr>
                                                
                                    <tr>
                           
                        
                            </tr>
                        </table>
                        </div>
                         
                        </div>
                        <button type="submit" class="btn btn-raised btn-success">Submit For Approval</button>
                        <button type="reset" data-user-id="" class="btn btn-raised btn-danger">Reset</a>
                      
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $('#delete-user').click(function() {
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
        window.location.href = "<?php echo base_url("index.php/admin/delete"); ?>" + "/" + userId;
    });


  }

  </script>
