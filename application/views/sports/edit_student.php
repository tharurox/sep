<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php $this->view('sports/sport_admin_navbar'); ?>
        </div>

        <div class="col-md-9">
            <div class="container">
                <h2>Edit Leaders</h2>
                <?php echo form_open('sports/edit_student'); ?>
                    <div class="form-group">
                        <input type="hidden"  value="<?php echo $result->id ?>" name="id">
                        <label for="name">Sport Name</label>
                        <input type="text" id="sname" name="sname" class="form-control" value="<?php echo $result->sport_name ?>">
                    </div>

                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" id="cat" name="cat" class="form-control" value="<?php echo $result->category ?>">
                    </div>

                    <div class="form-group">
                        <label for="name">Division</label>
                        <input type="text" id="div" name="div" class="form-control" value="<?php echo $result->division ?>">
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