<div class="well" style="height: 500px; overflow-y: scroll">
    <?php if ($details != 'error') { ?>
        <form class="form" id="frmupdate" role="form" action="" method="POST">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img src="<?php echo $details->photo_file_name; ?>" id="profile-img" class="img-thumbnail profile-img"> </div>
                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td><label>NIC</label></td>
                                <td><label class="news-item-title"><?php echo $details->nic_no; ?></label></td>
                            </tr>
                            <tr>
                                <td><label>Full Name</label></td>
                                <td><label class="news-item-title"><?php echo $details->full_name; ?></label></td>
                            </tr>
                            <tr>
                                <td><label>Signature No</label></td>
                                <td><label class="news-item-title"><?php echo $details->signature_no; ?></label></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="width: 20%">Event Name</th>
                                <th style="width: 70%">Event Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($events as $row){ ?>
                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->title; ?></td>
                                <td><?php echo $row->description; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    <?php } else { ?>
        <div class="row">
            <div class="col-md-12 col-md-offset-* text-center">
                <div class="well well-lg" id="teacher_rep">
                    <i class="fa fa-exclamation-triangle fa-5x"></i>
                    <div class="page-header">
                        <h1>No Data Found</h1>
                        <br>
                        <h5>Please check whether the user is registered with the system or not. Situation might be, he is deleted from the system.</h5>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>



