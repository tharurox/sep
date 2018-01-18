<div class="well">
    <div id="errorresponse">

    </div>
    <form class="form" id="frmupdate" role="form" action="" method="POST">
        <input type="hidden" id="newsid" name="newsid" class="form-control" value="<?php echo $details->id; ?>">
        <div class="form-group">
            <label for="exampleInputEmail2">News Type</label>
            <input type="text" id="newsname" name="newsname" class="form-control" value="<?php echo $details->name; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">News Description</label>
            <input class="form-control" id="newsdescription" name="newsdescription" type="text" value="<?php echo $details->description; ?>" >
        </div>
        <div class="form-group">
            <input type="button" class="btn btn-raised btn-success" id="updateitem" value="update">
            <input type="reset" class="btn btn-raised btn-default" value="Reset">
        </div>
    </form>
</div>
