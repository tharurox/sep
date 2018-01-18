<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('backups/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <h3>Restore Backups</h3>
            <form role="form">
                <div class="row">
                    <div class="col-md-4">
                        <input type="file" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <input type="submit" class="btn btn-raised btn-primary" value="Restore Backups">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
