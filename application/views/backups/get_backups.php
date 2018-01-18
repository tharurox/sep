<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('backups/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-info">
              <div class="panel-heading">
                <strong>Create Backups</strong>
              </div>
              <div class="panel-body">
                <script type="text/javascript">
                    function download() {

                        if($('#type').val() == "Index"){
                            alert("Select a Category!");
                            return;
                        }


                        //this passes the type to the same page
                        window.location.href =  window.location.href + "?type=" + $('#type').val();
                    }
                </script>

                   <div class="row">
                       <div class="col-md-4 col-md-offset-2">
                           <div class="form-group">
                               <select class="form-control" id="type">
                                   <option value="Index">Select Backup Type</option>
                                   <option value="fulldb">Full Database</option>
                                   <option value="users">Users</option>
                                   <option value="students">Students</option>
                                   <option value="teachers">Teachers</option>
                               </select>
                           </div>
                       </div>
                       <div class="col-md-4">
                           <input type="submit" class="btn btn-raised btn-primary" value="Create Backups" onclick="download();">
                       </div>
                   </div>
              </div>
            </div>
        </div>
    </div>
</div>
