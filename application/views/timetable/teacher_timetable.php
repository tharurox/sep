<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('classes/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">

            <div class="panel panel-info">
                <div class="panel-heading">Timetable Information</div>
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
																	<?php foreach ($slots as $slot) {
																	  if ($slot->slot_id === "MO1") {
																	    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
																	  }
																  } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TU1") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "WE1") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TH1") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "FR1") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
													</tr>
													<tr style="height: 45px;">
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "MO2") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TU2") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "WE2") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TH2") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "FR2") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
													</tr>
													<tr style="height: 45px;">
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "MO3") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TU3") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "WE3") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TH3") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "FR3") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
													</tr>
													<tr style="height: 45px;">
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "MO4") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TU4") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "WE4") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TH4") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "FR4") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
													</tr>
													<tr>
															<td style="font-weight: bold; text-align: center;" colspan="5">INTERVAL</td>
													</tr>
													<tr style="height: 45px;">
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "MO5") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TU5") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "WE5") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TH5") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "FR5") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
													</tr>
													<tr style="height: 45px;">
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "MO6") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }

                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TU6") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "WE6") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TH6") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "FR6") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
													</tr>
													<tr style="height: 45px;">
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "MO7") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TU7") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "WE7") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TH7") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "FR7") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
													</tr>
													<tr style="height: 45px;">
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "MO8") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TU8") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "WE8") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "TH8") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
															<td align="center">
                                <?php foreach ($slots as $slot) {
                                  if ($slot->slot_id === "FR8") {
                                    echo $slot->grade_id.$slot->name."<br>".$slot->subject_name;
                                  }
                                } ?>
															</td>
													</tr>
											</tbody>
									</table>
                </div>
            </div>
        </div>
    </div>
</div>
