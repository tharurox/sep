<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php
            $this->view('news/sidebar_nav');
            ?>
        </div>

        <div class="col-md-9">
            <?php
                if(isset($_GET['delete']) && $_GET['delete'] == true){
                    $succ_message = "News has been deleted.";
                }
            ?>
            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success </strong>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <?php if (isset($err_message)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $err_message; ?>
                </div>
            <?php } ?>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>View All News</strong>
                </div>
                <div class="panel-body">
                    <script>
                        $(document).ready( function () {
                            $('#news_table').DataTable();
                        } );
                    </script>
                    <table class="table table-hover" id="news_table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>News</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="fillgrid">
                            <?php foreach ($details as $row) { ?>
                                <tr>
                                    <td><?php echo substr($row->name,0,60)."..."; ?></td>
                                    <td><?php echo strip_tags(substr($row->description,0,100))."..."; ?></td>
                                    <td>
                                        <a href="<?php echo base_url("index.php/news/view_news/".$row->id ); ?>" data-id='<?php echo $row->id ?>' class='btnedit' title='View'><span class="glyphicon glyphicon-file" aria-hidden="true"></span></a>
                                        <a href="<?php echo base_url("index.php/news/edit_news/".$row->id); ?>" data-id='<?php echo $row->id ?>' class='btnedit' title='Edit'><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        <a id="btnDelete" data-news-id="<?php echo $row->id; ?>" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>

</div>

<script>
    $(document).ready(function () {
        $('#btnDelete').click(function() {
            var newsid = $(this).attr("data-news-id");
            delete_news(newsid);
          });

          function delete_news(newsid) {
            swal({
              title: "Are you sure?",
              text: "Are you sure that you want to Delete this News?",
              type: "warning",
              showCancelButton: true,
              closeOnConfirm: false,
              confirmButtonText: "Yes, Delete it!",
              confirmButtonColor: "#ec6c62"
            }, function() {
                window.location.href = "<?php echo base_url("index.php/news/delete_news"); ?>" + "/" + newsid;
            });
          }
            });
</script>
