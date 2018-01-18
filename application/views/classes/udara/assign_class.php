<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('classes/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
        	<!-- Message -->
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

            	<?php
            		if(isset($selectedops)){
            			print_r($selectedops);
            		}
            	?>

        	<!-- New Class -->
            <div class="panel panel-default">
			  <div class="panel-heading">
			    <strong>ASSSING CLASS</strong>
			  </div>
			  <div class="panel-body">
			  
			  <div class="row">
			   	<div class="col-md-12">
			   		<h4>Pending Students without Class</h4><hr>
			   	</div>
			   </div>
			   <?php 
			   		$attributes = array('class' => '', 'name' => 'pendinglist');
			   		echo form_open('classes/assign_class/', $attributes); ?>
			   <div class="row">

				   	<div class="col-md-4">
				   		<select name="students" multiple class="form-control" size=20 style='height: 100%;'>
						  <?php
	                         foreach ($studentlist as $row) { ?>
								<option value="<?php echo $row->id; ?>"><?php echo $row->admission_no. " - ". $row->name_with_initials ; ?></option>
							<?php } ?>
						</select>
				   	</div>
				   	<div class="col-md-4 text-center">
				   		<button type="button" onClick="SelectMoveRows(document.pendinglist.students,document.pendinglist.selectedstudents)" style="width:125px;" class="btn btn-primary">Add >></button><br>
				   		<button style="margin-top:10px; width:125px;" type="button" onClick="SelectMoveRows(document.pendinglist.selectedstudents,document.pendinglist.students)" class="btn btn-danger"><< Remove</button>
				   	</div>
				   	<div class="col-md-4">
				   		<div class="row">
				   			<div class="col-md-12">
					   		<select id="selectedstudents" name="selectedstudents" multiple="multiple" class="form-control" size=20 >
							</select>
							</div>
						</div>
						<div class="row" style="margin-top:10px">
							<div class="col-md-12">	
								<select name="cmbbatch" class="form-control">
									 <option value="0">- Select Class -</option>
						      	<?php
	                            foreach ($classlist as $row) { ?>
								  <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
								<?php } ?>
								</select>
							</div>
						</div>
						
						<div class="row" style="margin-top:10px">
							<div class="col-md-12">	
								<button type="submit" name="submit" onclick="selectAll();" id="submit" class="btn btn-success">Assign to Class</button>
							</div>
						</div>

						<input type="hidden" name="hiddenbox"  id="hiddenbox">


						<script type="text/javascript">
							

							function selectAll()
							{
								var select_ids = [];
								$('select#selectedstudents option').each(function(index, element) {
									select_ids.push($(this).val());
								})
								$('select#selectedstudents').val(select_ids);
								$('#hiddenbox').val(select_ids);
							}
						</script>
				   	</div>
			   </div>
			   <?php echo form_close(); ?>
			  </div>
			</div>


        </div>
    </div>
</div>

<script language="Javascript">
function SelectMoveRows(SS1,SS2)
{
    var SelID='';
    var SelText='';
    // Move rows from SS1 to SS2 from bottom to top
    for (i=SS1.options.length - 1; i>=0; i--)
    {
        if (SS1.options[i].selected == true)
        {
            SelID=SS1.options[i].value;
            SelText=SS1.options[i].text;
            var newRow = new Option(SelText,SelID);
            SS2.options[SS2.length]=newRow;
            SS1.options[i]=null;
        }
    }
    SelectSort(SS2);
}
function SelectSort(SelList)
{
    var ID='';
    var Text='';
    for (x=0; x < SelList.length - 1; x++)
    {
        for (y=x + 1; y < SelList.length; y++)
        {
            if (SelList[x].text > SelList[y].text)
            {
                // Swap rows
                ID=SelList[x].value;
                Text=SelList[x].text;
                SelList[x].value=SelList[y].value;
                SelList[x].text=SelList[y].text;
                SelList[y].value=ID;
                SelList[y].text=Text;
            }
        }
    }
}
</script>