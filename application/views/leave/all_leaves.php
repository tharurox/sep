

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php
            if($user_type == 'A'){
                $this->view('leave/admin_sidebar');
            }
            elseif($user_type == 'T'){
                $this->view('leave/teacher_sidebar');
            }
            else{
                $this->view('leave/teacher_sidebar');
            }

            ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>ALL LEAVES</strong>
                </div>
                <div class="panel-body">
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#example').DataTable();
                    } );
                </script>
                    <table id="example" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Applied Date</th>
                            <th>Start Date</th>
                            <th>Resuming Date</th>
                            <th>Days</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($all_leaves as $row){

                            echo "<tr>" . PHP_EOL;
                            echo "<th scope='row'>".$row->id."</th>" . PHP_EOL;
                            echo "<td>".$row->full_name."</td>" . PHP_EOL;
                            echo "<td>".$row->name."</td>" . PHP_EOL;
                            echo "<td>".$row->applied_date."</td>" . PHP_EOL;
                            echo "<td>".$row->start_date."</td>" . PHP_EOL;
                            echo "<td>".$row->end_date."</td>" . PHP_EOL;
                            echo "<td>".$row->no_of_days."</td>" . PHP_EOL;
                            echo "<td>".$row->status."</td>" . PHP_EOL;
                            echo "<td>" . PHP_EOL; ?>
                            <a href='<?php echo base_url('index.php/leave/get_leave_details/'.$row->id); ?>' class='btn btn-raised btn-primary btn-xs'><span class='glyphicon glyphicon-list-alt'></span></a>
                        <?php
                            echo "</td>" . PHP_EOL;
                            echo "</tr>" . PHP_EOL;
                        }

                        ?>



                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
