
<link rel="stylesheet" type="text/css" href="/DataTables-1.10.7/media/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="/DataTables-1.10.7/media/js/jquery.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#student_table').DataTable();
} );
</script>
<div class="container">
    <div class="row">
        <div class="col-md-3">
             <?php $this->view('student/sidebar_nav_t'); ?>
        </div>
        <div class="col-md-9">
            <div class="row">
                <?php if (isset($succ_message)) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $succ_message; ?>
                    </div>
                <?php } ?>
                <?php if (isset($err_message)) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $err_message; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <?php
                    $attributes = array(
                        'class' => 'form-inline'
                    );
                    echo form_open('student/search_one', $attributes);
                    ?>
                    <div class="form-group">
                        <input type="text" id="id" name="id" class="form-control" placeholder="Search.." size="20">
                    </div>
                     <button type="submit" class="btn btn-raised btn-success"><i class="fa fa-filter"></i> Filter Results</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <br>
                    <lable ><span class="label label-info" > Tip !</span><small><i> " Search by Student No/ Admission No / Student Name " </i> </small> </lable>

                </div>
            </div>
            <br>
            <div class="row">
                <table class="table table-hover" id="table_id">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Admission No</th>
                            <th>Name</th>
                            <th>Contact no</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row) { ?>


                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->admission_no; ?></td>
                                <td><?php echo $row->name_with_initials; ?></td>
                                <td><?php echo $row->contact_home; ?></td>

                                <td><a href="<?php echo base_url("index.php/profile") . "?key=" . $row->user_id; ?>" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></td>


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
               <div id="pagination">
                <nav><?php if(isset($links)){ ?>
                        <?php foreach ($links as $link) { ?>
                            <?php echo $link; ?>
                        <?php }
                }
                        ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
