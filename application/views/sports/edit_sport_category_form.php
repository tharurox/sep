<div class="well">
    <div id="errorresponse">

    </div>
    <?php echo form_open('sports/assign_leaders'); ?>
        <input type="hidden" id="sportsid" name="sports_id" class="form-control" value="<?php echo $details->id; ?>">
        <div class="form-group">
            <label for="exampleInputEmail2">Sport Name</label>
            <input type="text" id="sportsname" name="sport_name" class="form-control" value="<?php echo $details->name; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">Description</label>
            <input class="form-control" id="sportsdescription" name="description" type="text" value="<?php echo $details->description; ?>" >
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-raised btn-success" id="updateitem" value="update">
            <input type="reset" class="btn btn-raised btn-default" value="Reset">
        </div>
    <?php echo form_close(); ?>
</div>
