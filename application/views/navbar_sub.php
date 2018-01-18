

<!-- Admin Nav Bar Start -->
<?php if($user_type == 'A'){ ?>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php if($navbar == 'dashboard'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="glyphicon glyphicon-home"></i><span>Home</span> </a> </li>
        <li <?php if($navbar == 'teacher'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/teacher'); ?>"><i class="glyphicon glyphicon-user"></i><span>Academic Staff</span> </a> </li>
        <li <?php if($navbar == 'leave'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/leave'); ?>"><i class="glyphicon glyphicon-bed"></i><span>Leaves</span> </a> </li>
         <?php if($this->session->userdata['user_type'] == 'A') {?><li <?php if($navbar == 'attendance'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/attendance'); ?>"><i class="glyphicon glyphicon-list-alt"></i><span>Attendance</span> </a> </li><?php } ?>
        <?php if($this->session->userdata['user_type'] == 'A') {?><li <?php if($navbar == 'timetable') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/timetable'); ?>"><i class="glyphicon glyphicon-time"></i><span>Timetable</span> </a> </li><?php } ?>
      	<li <?php if($navbar == 'student'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/student'); ?>"><i class="glyphicon glyphicon-education"></i><span>Students</span> </a> </li>
        <!-- <li><a href="#"><i class="glyphicon glyphicon-knight"></i><span>Sports</span> </a> </li> -->
          <li <?php if($navbar == 'sports'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/sports'); ?>"><i class="glyphicon glyphicon-flash"></i><span>Sports</span> </a> </li>
          <li <?php if($navbar == 'event') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/event'); ?>"><i class="glyphicon glyphicon-bullhorn"></i><span>Events</span> </a> </li>
        <?php if($this->session->userdata['user_type'] == 'A') {?><li <?php if($navbar == 'admin'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/admin'); ?>"><i class="glyphicon glyphicon-cog"></i><span>Admin</span> </a> </li><?php } ?>
        <!--  <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-download-alt"></i><span>Other</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
    <!-- /container -->
  </div>
  <!-- /subnavbar-inner -->
</div>
<?php } ?>
<!-- End of Admin Side Bar -->

<!-- Teacher Nav Bar Start -->
<?php if($user_type == 'T'){ ?>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php if($navbar == 'dashboard'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="glyphicon glyphicon-home"></i><span>Dashboard</span> </a> </li>
        <!-- <li <?php if($navbar == 'teacher'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/teacher'); ?>"><i class="glyphicon glyphicon-user"></i><span>Teacher</span> </a> </li> -->
        <!-- <li <?php if($navbar == 'attendance'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/attendance'); ?>"><i class="glyphicon glyphicon-list-alt"></i><span>Attendance</span> </a> </li> -->
        <!-- <li <?php if($navbar == 'timetable') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/timetable'); ?>"><i class="glyphicon glyphicon-time"></i><span>Timetable</span> </a> </li> -->
        <li <?php if($navbar == 'student') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/student'); ?>"><i class="glyphicon glyphicon-education"></i><span>Students</span> </a> </li>
        <li <?php if($navbar == 'teacher'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/teacher'); ?>"><i class="glyphicon glyphicon-user"></i><span>Academic Staff</span> </a> </li>
        <!-- <li><a href="#"><i class="glyphicon glyphicon-knight"></i><span>Sports</span> </a> </li> -->
        <li <?php if($navbar == 'event') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/event'); ?>"><i class="glyphicon glyphicon-bullhorn"></i><span>Events</span> </a> </li>
        <li <?php if($navbar == 'leave'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/leave'); ?>"><i class="glyphicon glyphicon-bed"></i><span>leaves</span> </a> </li>
         <?php if($this->session->userdata['user_type'] == 'A') {?><li <?php if($navbar == 'attendance'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/attendance'); ?>"><i class="glyphicon glyphicon-list-alt"></i><span>Attendance</span> </a> </li><?php } ?>
        <?php if($this->session->userdata['user_type'] == 'A') {?><li <?php if($navbar == 'timetable') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/timetable'); ?>"><i class="glyphicon glyphicon-time"></i><span>Timetable</span> </a> </li><?php } ?>
        <li <?php if($navbar == 'class'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/classes/view_class_teacher'); ?>"><i class="fa fa-university" aria-hidden="true"></i><span>Classes</span> </a> </li>
         <li <?php if($navbar == 'admin'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/admin'); ?>"><i class="glyphicon glyphicon-cog"></i><span>Admin</span> </a> </li>
       <!--  <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-download-alt"></i><span>Other</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
    <!-- /container -->
  </div>
  <!-- /subnavbar-inner -->
</div>
<?php } ?>

<!-- End of Teacher Side Bar -->

<!-- navbar Vice Principal !-->

<?php if($user_type == 'V'){ ?>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php if($navbar == 'dashboard'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="glyphicon glyphicon-home"></i><span>Home</span> </a> </li>
        <li <?php if($navbar == 'teacher'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/teacher'); ?>"><i class="glyphicon glyphicon-user"></i><span>Academic Staff</span> </a> </li>
        <li <?php if($navbar == 'leave'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/leave'); ?>"><i class="glyphicon glyphicon-bed"></i><span>Leaves</span> </a> </li>
         <?php if($this->session->userdata['user_type'] == 'A') {?><li <?php if($navbar == 'attendance'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/attendance'); ?>"><i class="glyphicon glyphicon-list-alt"></i><span>Attendance</span> </a> </li><?php } ?>
        <?php if($this->session->userdata['user_type'] == 'A') {?><li <?php if($navbar == 'timetable') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/timetable'); ?>"><i class="glyphicon glyphicon-time"></i><span>Timetable</span> </a> </li><?php } ?>
        <li <?php if($navbar == 'student'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/student'); ?>"><i class="glyphicon glyphicon-education"></i><span>Students</span> </a> </li>
        <!-- <li><a href="#"><i class="glyphicon glyphicon-knight"></i><span>Sports</span> </a> </li> -->
          <li <?php if($navbar == 'sports'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/sports'); ?>"><i class="glyphicon glyphicon-flash"></i><span>Sports</span> </a> </li>
          <li <?php if($navbar == 'event') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/event'); ?>"><i class="glyphicon glyphicon-bullhorn"></i><span>Events</span> </a> </li>
        <?php if($this->session->userdata['user_type'] == 'V') {?><li <?php if($navbar == 'admin'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/admin'); ?>"><i class="glyphicon glyphicon-cog"></i><span>Admin</span> </a> </li><?php } ?>
        <!--  <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-download-alt"></i><span>Other</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
    <!-- /container -->
  </div>
  <!-- /subnavbar-inner -->
</div>
<?php } ?>





<!-- Cl staff menubar !-->

<?php if($user_type == 'C'){ ?>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php if($navbar == 'dashboard'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="glyphicon glyphicon-home"></i><span>Dashboard</span> </a> </li>
        <!-- <li <?php if($navbar == 'teacher'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/teacher'); ?>"><i class="glyphicon glyphicon-user"></i><span>Teacher</span> </a> </li> -->
        <!-- <li <?php if($navbar == 'attendance'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/attendance'); ?>"><i class="glyphicon glyphicon-list-alt"></i><span>Attendance</span> </a> </li> -->
        <!-- <li <?php if($navbar == 'timetable') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/timetable'); ?>"><i class="glyphicon glyphicon-time"></i><span>Timetable</span> </a> </li> -->
        <li <?php if($navbar == 'student') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/student'); ?>"><i class="glyphicon glyphicon-education"></i><span>Students</span> </a> </li>
        <li <?php if($navbar == 'teacher'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/teacher'); ?>"><i class="glyphicon glyphicon-user"></i><span>Teachers</span> </a> </li>
        <!-- <li><a href="#"><i class="glyphicon glyphicon-knight"></i><span>Sports</span> </a> </li> -->
        <li <?php if($navbar == 'event') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/event'); ?>"><i class="glyphicon glyphicon-bullhorn"></i><span>Events</span> </a> </li>
        <li <?php if($navbar == 'leave'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/leave'); ?>"><i class="glyphicon glyphicon-bed"></i><span>Leaves</span> </a> </li>
         <?php if($this->session->userdata['user_type'] == 'A') {?><li <?php if($navbar == 'attendance'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/attendance'); ?>"><i class="glyphicon glyphicon-list-alt"></i><span>Attendance</span> </a> </li><?php } ?>
        <?php if($this->session->userdata['user_type'] == 'A') {?><li <?php if($navbar == 'timetable') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/timetable'); ?>"><i class="glyphicon glyphicon-time"></i><span>Timetable</span> </a> </li><?php } ?>
        
       <!--  <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-download-alt"></i><span>Other</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
    <!-- /container -->
  </div>
  <!-- /subnavbar-inner -->
</div>
<?php } ?>




<!-- end of cl staff menubar !-->
<!-- Student Nav Bar Start -->
<?php if($user_type == 'S'){ ?>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php if($navbar == 'dashboard'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/dashboard'); ?>"><i class="glyphicon glyphicon-home"></i><span>Dashboard</span> </a> </li>
        <!-- <li <?php if($navbar == 'teacher'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/teacher'); ?>"><i class="glyphicon glyphicon-user"></i><span>Teacher</span> </a> </li> -->
        <!-- <li <?php if($navbar == 'leave'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/leave'); ?>"><i class="glyphicon glyphicon-bed"></i><span>Leave</span> </a> </li> -->
         <!-- <li <?php if($navbar == 'attendance'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/attendance'); ?>"><i class="glyphicon glyphicon-list-alt"></i><span>Attendance</span> </a> </li> -->
        <!-- <li <?php if($navbar == 'timetable') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/timetable'); ?>"><i class="glyphicon glyphicon-time"></i><span>Timetable</span> </a> </li> -->
        <li <?php if($navbar == 'student') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/profile'); ?>"><i class="glyphicon glyphicon-user"></i><span>Profile</span> </a> </li>
        <!-- <li><a href="#"><i class="glyphicon glyphicon-knight"></i><span>Sports</span> </a> </li> -->
        <!-- <li <?php if($navbar == 'event') { echo "class='active'";} ?>><a href="<?php echo base_url('index.php/event'); ?>"><i class="glyphicon glyphicon-bullhorn"></i><span>Events</span> </a> </li> -->
        <!-- <li <?php if($navbar == 'admin'){ echo "class='active'";} ?> ><a href="<?php echo base_url('index.php/admin'); ?>"><i class="glyphicon glyphicon-cog"></i><span>Admin</span> </a> </li> -->
       <!--  <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-download-alt"></i><span>Other</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
    <!-- /container -->
  </div>
  <!-- /subnavbar-inner -->
</div>
<?php } ?>
<!-- End of Student Side Bar -->
