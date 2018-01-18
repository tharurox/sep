<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('timetable/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Timetable For Class <strong><?php echo $class_name; ?></strong> Academic Year: <strong><?php echo $year; ?></strong></div>
                <div class="panel-body">
                    <table class="table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 20%;">MONDAY</th>
                                <th style="text-align: center; width: 20%;">TUESDAY</th>
                                <th style="text-align: center; width: 20%;">WEDNESDAY</th>
                                <th style="text-align: center; width: 20%;">THURSDAY</h>
                                <th style="text-align: center; width: 20%;">FRIDAY</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="height: 45px;">
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'MO1');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "MO1"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                    <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                    <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                    <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "MO1"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TU1');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TU1"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TU1"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'WE1');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "WE1"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "WE1"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TH1');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TH1"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TH1"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'FR1');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "FR1"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "FR1"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr style="height: 45px;">
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'MO2');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "MO2"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                    <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                    <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                    <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "MO2"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TU2');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TU2"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TU2"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'WE2');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "WE2"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "WE2"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TH2');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TH2"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TH2"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'FR2');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "FR2"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "FR2"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr style="height: 45px;">
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'MO3');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "MO3"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                    <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                    <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                    <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "MO3"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TU3');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TU3"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TU3"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'WE3');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "WE3"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "WE3"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TH3');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TH3"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TH3"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'FR3');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "FR3"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "FR3"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr style="height: 45px;">
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'MO4');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "MO4"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                    <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                    <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                    <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "MO4"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TU4');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TU4"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TU4"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'WE4');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "WE4"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "WE4"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TH4');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TH4"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TH4"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'FR4');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "FR4"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "FR4"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold; text-align: center;" colspan="5">INTERVAL</td>
                            </tr>
                            <tr style="height: 45px;">
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'MO5');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "MO5"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                    <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                    <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                    <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "MO5"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TU5');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TU5"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TU5"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'WE5');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "WE5"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "WE5"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TH5');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TH5"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TH5"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'FR5');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "FR5"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "FR5"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr style="height: 45px;">
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'MO6');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "MO6"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                    <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                    <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                    <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "MO6"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TU6');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TU6"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TU6"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'WE6');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "WE6"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "WE6"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TH6');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TH6"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TH6"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'FR6');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "FR6"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "FR6"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr style="height: 45px;">
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'MO7');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "MO7"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                    <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                    <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                    <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "MO7"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TU7');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TU7"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TU7"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'WE7');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "WE7"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "WE7"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TH7');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TH7"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TH7"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'FR7');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "FR7"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "FR7"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr style="height: 45px;">
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'MO8');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "MO8"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                    <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                    <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                    <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "MO8"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TU8');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TU8"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TU8"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'WE8');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "WE8"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "WE8"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'TH8');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "TH8"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "TH8"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                        $slot = $this->timetable_model->get_timetable_slot($timetable_id, 'FR8');
                                        if(!$slot){ ?>
                                            <a href="<?php echo base_url('index.php/timetable/add_slot') . "/" . "$timetable_id" . "/" . "FR8"; ?>">
                                                ADD SLOT
                                        </a>
                                    <?php } else { ?>
                                        <?php echo $this->timetable_model->get_subject_name($slot['subject_id']); ?><br />
                                        <?php echo $this->timetable_model->get_teacher_name($slot['teacher_id']); ?>
                                        <a href="<?php echo base_url('index.php/timetable/delete_slot') . "/" . $timetable_id . "/" . "FR8"; ?>"><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
