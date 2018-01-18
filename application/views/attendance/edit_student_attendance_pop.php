<div class="well" style="max-height: 400px; overflow-y: scroll;">
    <div id="errorresponse">

    </div>
    <form class="form" id="frmupdate" role="form" action="" method="POST">
        <table class="table table-hover" id="table_idpop">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Admission No</th>
                    <th>Name</th>
                    <th>Absent<th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) { ?>


                    <tr>
                        <td ><?php echo $row->student_id; ?></td>
                        <td ><?php echo $row->admission_no; ?></td> 
                        <td><?php echo $row->full_name; ?></td>
                        <td > <input name="checkboxs" class="checkbox1" type="checkbox" id="<?php echo $row->student_id; ?>" value="<?php echo $row->student_id ?>" <?php
                            if ($row->is_present == 0) {
                                echo 'CHECKED';
                            }
                            ?> > </td>
                        <td class="attdate hide" id="date"><?php echo $row->date; ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary " id="update-attendance">Edit</button>

        <script>
            $(document).ready(function () {
                $(document).on('click', "#update-attendance", function (e) {
                    e.preventDefault();
                    var checkboxValues = [];
                    $('input[name="checkboxs"]:checked').each(function () {

                        checkboxValues.push($(this).val());
                    });
                    var date =JSON.stringify($("#date").text());
                    var cvalu = JSON.stringify(checkboxValues);
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() ?>index.php/attendance/edit_one_attendance',
                        data: {data: cvalu,
                                date: date },
                        cache: false,
                        success: function (e) {
                           $("#errorresponse").html('<span style="color:blue">'+e+'</span>');
                        }
                    });

                });
            });
        </script>
    </form>
</div>
