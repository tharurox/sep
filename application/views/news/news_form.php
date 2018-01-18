<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Clear History
                    </div>
                    <br>
                    <div class="panel-body">
                        select option :
                        <br><br>
                        <select id="cleartype" name="cleartype" class="form-control">
                            <option value="1">Today</option>
                            <option value="2">Last 7days</option>
                            <option value="3">This month</option>
                            <option value="4">All</option>
                        </select>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-offset-0">
                                <button type="button" class="btn btn-raised btn-success" id="clearhistory">Clear History</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="well">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="<?php echo base_url("assets/img/info_ico.png"); ?>" width="64px" height="64px">
                        </a>
                    </div>
                    <div class="media-body">
                        <br>
                        <div class="col-sm-8">
                            Select stuff member to retrieve the activities he performed.
                        </div>
                        <div class="col-sm-4">
                            <select id="teachername" name="teachername" class="form-control">
                                <?php
                                foreach ($users as $row) {
                                    echo "<option value='$row->user_id'>$row->full_name</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>Profile Image</th>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody id="fillgrid">
                        <?php foreach ($result as $row) { ?>
                            <tr>
                                <td><img src="<?php echo $row->pro_img; ?>" id="profile-img" class="img-thumbnail profile-img" style="height: 40px; width: 50px"></td>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->user_fullname; ?></td>
                                <td><?php echo $row->content; ?></td>
                                <td><?php echo $row->created_at; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#myTable').dataTable();
    });
</script>
<script type="text/javascript">

    $('#teachername').on('change', function () {
        formdata = new FormData();
        var teacher_id = document.getElementById('teachername').value;
        if (formdata) {
            formdata.append("tid", teacher_id);
        }
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/news/list_activities/",
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
        }).done(function (data) {
            $("#fillgrid").html(data);
        });

    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click',"#clearhistory",function (e) {
            e.preventDefault();
            formdata = new FormData();
            var type = document.getElementById('cleartype').value;
            if (formdata) {
                formdata.append("deletetype", type);
            }

            $.ajax({
                url: '<?php echo base_url() ?>index.php/news/clear_history',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
            }).done(function (data) {
                $("#fillgrid").html(data);
            });
        });
    });
</script>
