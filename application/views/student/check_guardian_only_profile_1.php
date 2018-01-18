
<div class="container">

<div class="row">

<div class="col-md-3">
            <?php $this->view('student/sidebar_nav_t'); ?>
</div>

<div class="col-md-9">






<div class="well">

</ul
<div class="panel  panel-info"  >
                 <div class="panel-heading panel-info " >
                    GUARDIAN DETAILS
                       <span class="pull-right">
                        <a href="<?php echo base_url("index.php/student/view_student_profile") . "/" .$user_id->student_id;?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-raised btn-xs btn-primary"><i class="">Student Details</i></a>
                        <a href="<?php echo base_url("index.php/student"); ?>" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-raised btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                       </span>
                </div>
                 <div class="panel panel-body" >
<form id="tab2">
<div class="panel panel-info">
<div class="panel-heading" >
    <h3 class="panel-title"><?php echo $user_id->name_with_initials; ?></h3>
</div>
<div class="panel-body">
<div class="row">
<div class="col-md-3 col-lg-3 " align="center"><!-- <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle">--> </div>
<div class=" col-md-9 col-lg-9 ">
<table class="table table-user-information">
    <tbody>
    <tr>
        <td>
            <label>Name</label>

        </td>
        <td>

            <label><?php echo $user_id->name_with_initials; ?></label>
        </td>
    </tr>
    <tr>
        <td><label>Relation</label></td>
        <td><label><?php  $relation=$user_id->relation;
                         if($relation == 'f'){
                                            echo "Father";
                                        }
                                        else if($relation == 'm'){
                                            echo "Female";
                                        }else{
                                            echo "Guardian";
                                        }
                ?></label></td>
    </tr>
    <tr>
        <td><label>Contact Home</label></td>
        <td><label><?php echo $user_id->contact_home; ?></label></td>
    </tr>
    <tr>
        <td><label>Contact Mobile</label></td>
        <td><label><?php echo $user_id->contact_mobile; ?></label></td>
    </tr>
    <tr>
        <td><label>Birthday</label></td>
        <td><label><?php echo $user_id->dob; ?></label></td>
    </tr>
    <tr>
        <td><label>Address</label></td>
        <td><label><?php echo $user_id->addr.",".user_id->addr1 ; ?></label></td>
    </tr>

    <tr>
        <td><label>Gender</label></td>
        <td><label>
                <?php $val = $user_id->gender;
                                        if($val == 'm'){
                                            echo "Male";
                                        }
                                        else{
                                            echo "Female";
                                        }
                                        ?>
            </label></td>
    </tr>
    <tr>
        <td><label>Past Pupil</label></td>
        <td><label>
                <?php $val = $user_id->is_pastpupil;
                                        if($val == 1){
                                            echo "Yes";
                                        }
                                        else{
                                            echo "No";
                                        }
                                        ?>
            </label></td>
    </tr>


    </tbody>
</table>
</div>
</div>
</div>

</div>




</form>

</div>
</div>



</div>



</div>

</div>
</div>
