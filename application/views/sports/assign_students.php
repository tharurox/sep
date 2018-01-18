<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php $this->view('sports/sport_admin_navbar'); ?>
        </div>

        <div class="col-md-9">

            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success </strong>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <?php if (isset($error_message)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error </strong>
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>ASSIGN SPORT TEAM</strong>
                </div>
                <div class="panel-body">
                    <?php
                    // Change the css classes to suit your needs

                    $attributes = array('class' => 'form-horizontal', 'id' => '');
                    echo form_open('', $attributes);
                    ?>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Student Name</label>
                        <div class="col-sm-5">
                            <select id="name" name="name" class="form-control">
                                <option value="0" <?php if (set_value('name') == '0') { echo "selected"; } ?>>Select a Name</option>
                            <?php foreach($students as $student)  { ?>
                                 <option value="<?php echo $student->full_name; ?>"><?php echo $student->full_name; ?> </option>
                            <?php } ?>
                            </select>
                            <?php echo form_error('teachername'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Register No</label>
                        <div class="col-sm-5">
                            <input id="regno" type="text" name="regno"  value="<?php if(isset($succ_message)){ echo '';}else{echo set_value('event_name');} ?>" type="text" class="form-control" id="event_name" placeholder="Register No:">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Sport Name</label>
                        <div class="col-sm-5">
                            <select id="name" name="sname" class="form-control">
                                <option value="0" <?php if (set_value('name') == '0') { echo "selected"; } ?>>Select a Sport</option>
                            <?php foreach($sports as $sport)  { ?>
                                 <option value="<?php echo $sport->name; ?>"><?php echo $sport->name; ?> </option>
                            <?php } ?>
                            </select>
                            <?php echo form_error('teachername'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-6">
                            <div class="col-md-6">
                                <label class="radio-inline">
                                    <input id="age1" type="radio" name="agecat"  value="1" <?php if (set_value('gender') == '1') { echo "checked"; } ?>> Under 10
                                </label>
                                <br>
                                <label class="radio-inline">
                                    <input id="age2" type="radio" name="agecat" value="2" <?php if (set_value('gender') == '2') { echo "checked"; } ?>> Under 12
                                </label>
                                <br>
                                <label class="radio-inline">
                                    <input id="age3" type="radio" name="agecat"  value="3" <?php if (set_value('gender') == '3') { echo "checked"; } ?>> Under 14
                                </label>
                                <br>
                                <label class="radio-inline">
                                    <input id="age4" type="radio" name="agecat" value="4" <?php if (set_value('gender') == '4') { echo "checked"; } ?>> Under 16
                                </label>
                                <br>
                                <label class="radio-inline">
                                    <input id="age3" type="radio" name="agecat"  value="5" <?php if (set_value('gender') == '5') { echo "checked"; } ?>> Under 18
                                </label>
                                <br>
                                <label class="radio-inline">
                                    <input id="age4" type="radio" name="agecat" value="6" <?php if (set_value('gender') == '6') { echo "checked"; } ?>> Under 20
                                </label>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label class="radio-inline">
                                    <input id="age1" type="radio" name="agecat"  value="7" <?php if (set_value('gender') == '7') { echo "checked"; } ?>> Under 13
                                </label>
                                <br>
                                <label class="radio-inline">
                                    <input id="age2" type="radio" name="agecat" value="8" <?php if (set_value('gender') == '8') { echo "checked"; } ?>> Under 15
                                </label>
                                <br>
                                <label class="radio-inline">
                                    <input id="age3" type="radio" name="agecat"  value="9" <?php if (set_value('gender') == '9') { echo "checked"; } ?>> Under 17
                                </label>
                                <br>
                                <label class="radio-inline">
                                    <input id="age4" type="radio" name="agecat" value="10" <?php if (set_value('gender') == '10') { echo "checked"; } ?>> Under 19
                                </label>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Devision</label>
                        <div class="col-sm-5">
                            <select id="devision" name="devision" class="form-control">
                                <option value="0" <?php if (set_value('devision') == '0') { echo "selected"; } ?>>Select Devision</option>
                                <option value="1" <?php if (set_value('devision') == '1') { echo "selected"; } ?>>Devision1</option>
                                <option value="2" <?php if (set_value('devision') == '2') { echo "selected"; } ?>>Devision2</option>
                                <option value="3" <?php if (set_value('devision') == '3') { echo "selected"; } ?>>Devision3</option>
                            </select>
                            <?php echo form_error('teachername'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-raised btn-primary" value="Add">
                            <button type="reset" class="btn btn-raised btn-default">Reset</button>
                        </div>
                    </div>

                </div>
                <a name="sports"></a>
                    <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong>Sports Team</strong>
                    </div>
                    <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Sport</th>
                                <th>Age Category</th>
                                <th>Devision</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="fillgrid">
                            <?php foreach ($team as $row) { ?>
                            <tr>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->sport_name; ?></td>
                                <td><?php 
                                    
                                    $cat = $row->category; 
                                    if ($cat == 1) {
                                        echo 'Under 10';
                                    } else if ($cat == 2) {
                                        echo 'Under 12';
                                    } else if ($cat == 3) {
                                        echo 'Under 14';
                                    } else if ($cat == 4) {
                                        echo 'Under 16';
                                    } else if ($cat == 5) {
                                        echo 'Under 18';
                                    } else if ($cat == 6) {
                                        echo 'Under 20';
                                    } else if ($cat == 7) {
                                        echo 'Under 13';
                                    } else if ($cat == 8) {
                                        echo 'Under 15';
                                    } else if ($cat == 9) {
                                        echo 'Under 17';
                                    } else if ($cat == 10) {
                                        echo 'Under 19';
                                    } else {
                                        echo '';
                                    }
                                ?>  
                                </td>
                                <td><?php 
                                    $div = $row->division; 
                                    if ($div == 1) {
                                        echo 'Division 1';
                                    } else if ($div == 2) {
                                        echo 'Division 2';
                                    } else if ($div == 3) {
                                        echo 'Division 3';
                                    }
                                ?></td>
                                
                                <td><a href='<?php echo base_url('index.php/sports/edit_single_student/'.$row->id); ?>' class='btn btn-raised btn-primary btn-xs'>Update</a></td>
                                <td><a href='<?php echo base_url('index.php/sports/delete_team/'.$row->id); ?>' class='btn btn-raised btn-danger btn-xs'>Delete</a></td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
            </div>

        </div>

    </div>

</div>
