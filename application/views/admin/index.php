<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->view('admin/sidebar_nav'); ?>
        </div>
        <div class="col-md-9">
            <h3 style="margin-top: 0;">General Settings</h3>
            <div class="admin-btn">
                <i class="fa fa-globe"></i>
                <a href="#">
                    <span class="main">Global Settings</span>
                    <span class="sub">School name, Logo...</span>
                </a>
            </div>
            <div class="admin-btn">
                <i class="fa fa-calendar"></i>
                <a href="<?php echo base_url('index.php/year'); ?>">
                    <span class="main">Year Planner</span>
                    <span class="sub">Setup, Manage Holidays...</span>
                </a>
            </div>
            <div class="admin-btn">
                <i class="fa fa-users"></i>
                <a href="<?php echo base_url('index.php/admin/manage_admins'); ?>">
                    <span class="main">Administrators</span>
                    <span class="sub">Add, Update, Delete...</span>
                </a>
            </div>
            <div class="admin-btn">
                <i class="fa fa-users"></i>
                <a href="<?php echo base_url('index.php/admin/manage_users'); ?>">
                    <span class="main">Users</span>
                    <span class="sub">Update, Delete...</span>
                </a>
            </div>
            <div class="admin-btn">
                <i class="fa fa-university"></i>
                <a href="<?php echo base_url('index.php/classes'); ?>">
                    <span class="main">Classes</span>
                    <span class="sub">Manage Classes...</span>
                </a>
            </div>
            <div class="admin-btn">
                <i class="fa fa-newspaper-o"></i>
                <a href="<?php echo base_url('index.php/news/get_news'); ?>">
                    <span class="main">News</span>
                    <span class="sub">Publish News...</span>
                </a>
            </div>
            <div class="admin-btn">
                <i class="fa fa-history"></i>
                <a href="<?php echo base_url('index.php/news'); ?>">
                    <span class="main">Logs</span>
                    <span class="sub">View Activity Logs...</span>
                </a>
            </div>
             <div class="admin-btn">
                <i class="fa fa-book"></i>
                <a href="<?php echo base_url('/index.php/subject'); ?>">
                    <span class="main">Subjects</span>
                    <span class="sub">Manage Subjects...</span>
                </a>
            </div>
            <div class="admin-btn">
                <i class="fa fa fa-file-text-o"></i>
                <a href="<?php echo base_url('/index.php/student/all_notes'); ?>">
                    <span class="main">Student Notes</span>
                    <span class="sub">View Notes/Complains...</span>
                </a>
            </div>
            <div class="admin-btn">
                <i class="fa fa-download"></i>
                <a href="<?php echo base_url('/index.php/backup/create'); ?>">
                    <span class="main">Backups</span>
                    <span class="sub">Get and restore backups...</span>
                </a>
            </div>
            <div class="admin-btn">
                <i class="fa fa fa-file-text-o"></i>
                <a href="<?php echo base_url('index.php/marks/index'); ?>">
                    <span class="main">Student Grades</span>
                    <span class="sub">Students mark log...</span>
                </a>
            </div>
             <div class="admin-btn">
                <i class="fa fa-certificate"></i>
                <a href="<?php echo base_url('/index.php/certificate'); ?>">
                    <span class="main">Certificates</span>
                    <span class="sub">Genarate Certificates...</span>
                </a>
            </div>
        </div>
    </div>
</div>
