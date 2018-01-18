<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php $this->view('sports/sport_admin_navbar'); ?>
        </div>

        <div class="col-md-9">
            <div class="container">
                <h2>Edit In-charge</h2>
                <?php echo form_open('sports/edit_teacher'); ?>
                    <div class="form-group">
                        <input type="hidden"  value="<?php echo $result->id ?>" name="id">
                        <label for="name">Sport Name</label>
                        <input type="text" id="sname" name="sname" class="form-control" value="<?php echo $result->incharge_name ?>">
                    </div>

                    <div class="form-group">
                        <label for="name">Teacher Name</label>
                        <input type="text" id="tname" name="tname" class="form-control" value="<?php echo $result->sport_name ?>">
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-raised btn-primary">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="reset" value="Reset" class="btn btn-raised btn-default">
                            </div>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>