<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('teacher/sidebar_nav'); ?>
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
                <div class="panel panel-info">
                    <div class="panel-body">
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#example').DataTable();
                            });
                        </script>
                        <table id="example" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ඒකාබද්ද වැටුප</th>
                                    <th>හිඟ වැටුප් ගෙවීම් </th>
                                    <th>ජිවන වියදම් දීමනාව</th>
                                    <th>විදුහල්පති දීමනා</th>
                                    <th>වෙනත් දීමනා</th>
                                    <th>ජිවන වියදම් දීමනාව</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row) { ?>
                            <tr>
                                <td><?php echo $row->value1; ?></td>
                                <td><?php echo $row->value2; ?></td>
                                <td><?php echo $row->value3; ?></td>
                                <td><?php echo $row->value4; ?></td>
                                <td><?php echo $row->value5; ?></td>
                                <td><?php echo $row->value6; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
