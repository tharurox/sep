<?php

/**
 * Ecole - Teacher Model
 *
 * Responsibe for handling data related to school stuff details
 *
 *
 */
class Teacher_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    /**
     * Insert personal teacher details to the database
     *
     * @param array $personal_teacher_details contains teacher personal details such as full name , age , gender...
     * @return int
     */
    public function insert_new_staff($personal_teacher_details) {
        try{
            $this->db->insert('teachers', $personal_teacher_details);
            $id = $this->db->insert_id();
            return $id;
        } catch (Exception $ex) {
            return NULL;
        }
    }

    public function salaryDetails($salaryDetails){
         try{
            $this->db->insert('salary_details', $salaryDetails);
        } catch (Exception $ex) {
            return NULL;
        }  
    }

     public function insert_temp_new_staff($personal_teacher_details) {
        try{
            $this->db->insert('temp_teachers', $personal_teacher_details);
            $id = $this->db->insert_id();
            return $id;
        } catch (Exception $ex) {
            return NULL;
        }
    }


    public function updateUserID($id,$userid){
             try {
            $data=array(
                'user_id'=>$userid
            );
            $this->db->where('id', $id);
            $res=$this->db->update('temp_teachers', $data);
            if ($res) {

                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return null;
        }

    }
    public function resolveUserID($id){ 

    
                $query = $this->db->query("select user_id from `temp_teachers` where `id` = $id"); 
                $row = $query->row();
                return $row->user_id;
            
    }
    /**
     * Insert teacher accademic details to the database
     *
     * @param int $id
     * @param type $teacher_accademic_details
     * @return type
     */
    public function update_new_staff_temp($id, $teacher_accademic_details) {
        try{
            $this->db->where('id', $id);
            $this->db->update('temp_teachers', $teacher_accademic_details);
            return $id;
        } catch (Exception $ex) {
            return NULL;
        }
    }
//update temp 
       public function update_new_staff($id, $teacher_accademic_details) {
        try{
            $this->db->where('id', $id);
            $this->db->update('teachers', $teacher_accademic_details);
            return $id;
        } catch (Exception $ex) {
            return NULL;
        }
    }

    /**
     * get selected teacher's all details
     *
     * @param int $ID
     * @return mixed resulting row or null value
     */
    public function get_staff_details($ID) {
        try {
            if ($data = $this->db->query("select * from `teachers` where `id` = $ID")) {
                $row = $data->row();
                return $row;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return NULL;
        }
    }

    public function get_last_row(){
           $this->db->order_by("id", "desc");
        if ($rows = $this->db->get('users')) {
            $row = $rows->row();
            return $row;
        } else {
            return null;
        }

    }


  /**
     * get selected teacher's all details from temp table
     *
     * @param int $ID
     * @return mixed resulting row or null value
     */
    public function get_staff_details_temp($ID) {
        try {
            if ($data = $this->db->query("select * from `temp_teachers` where `id` = $ID")) {
                $row = $data->row();
                return $row;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return NULL;
        }
    }
    /**
     * set the time at the teacher registration
     *
     * @param int $id
     * @param time $time
     * @return boolean
     */
    public function set_time($id, $time) {
        try {
            if ($data = $this->db->query("UPDATE `teachers` set `created_at` = '$time'  where `id` = '$id' ")) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return NULL;
        }
    }


    /**
     * set user id to the teachers
     *
     * @param int $ID
     * @param int $userid
     * @return boolean
     */
    public function set_user_id($ID, $userid) {
        try {
            if ($this->db->query("UPDATE `teachers` set `user_id` = '$userid'  where `id` = '$ID' ") == TRUE) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }


    /**
     * set user id to the teachers
     *
     * @param int $ID
     * @param int $userid
     * @return boolean
     */
    public function set_user_id_inTemp($ID, $userid) {
        try {
            if ($this->db->query("UPDATE `temp_teachers` set `user_id` = '$userid'  where `id` = '$ID' ") == TRUE) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    /**
     * update the teacher loging details
     *
     * @param string $username
     * @param string $password
     * @param date-time $create
     * @param int $teacher_log_id
     * @return boolean
     */
    public function update_new_teacher_userdata($username, $password, $create, $teacher_log_id) {
        try {
            $encryptpwd = md5($password);
            if ($this->db->query("UPDATE users SET `username` = '$username', `password` = '$encryptpwd' , `created_at` = '$create' , `user_type` = 'T' WHERE id = '$teacher_log_id' ")) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    /**
     * this method is used to insert teacher's loging data
     *
     * @param string $username
     * @param string $password
     * @param date-time $create
     * @param string $first_name
     * @param string $last_name
     * @param string $photo
     * @param string $email
     * @return boolean
     */
    public function insert_new_teacher_userdata($username, $password, $create, $first_name, $last_name, $photo, $email) {
        try {
            $encryptpwd = md5($password);
            if ($this->db->query("INSERT INTO users (`username`, `password` , `created_at`, `user_type` , `first_name` , `last_name` , `profile_img` , `email`) VALUES ('$username', '$encryptpwd' , '$create', 'T' , '$first_name' , '$last_name' , '$photo' , '$email')")) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return NULL;
        }
    }

//search teacher by nic no
//    public function SearchTeacher($id) {
//
//        $query = $this->db->query("SELECT * FROM teachers WHERE nic_no like'%$id%' or full_name like '%$id%' or user_id like '%$id%' or signature_no like '%$id%' or serial_no like '%$id%' ");
//        return $query;
//    }

    /**
     * retrieve selected teacher's details
     *
     * @param int $id
     * @return resulting row
     */
    public function getTeacherProfile($id) {
        try{
            $query = $this->db->query("SELECT * FROM teachers WHERE id ='$id'");
            return $query->row();
        } catch (Exception $ex) {
            return FALSE;
        }
    }


        public function getTeacherProfile_inTemp($id) {
        try{
            $query = $this->db->query("SELECT * FROM temp_teachers WHERE id ='$id'");
            return $query->row();
        } catch (Exception $ex) {
            return FALSE;
        }
    }



    /**
     * retrieve teacher details by ordering in ascending order
     *
     * @return resulting set
     */
    public function SearchAllTeachers() {
        try{
            $query = $this->db->query("SELECT * FROM teachers order by full_name asc");
            return $query->result();
        } catch (Exception $ex) {
            return FALSE;
        }
    }

      /**
     * retrieve teacher details by ordering in ascending order
     *
     * @return resulting set
     */
    public function SearchAllTeachers_inTemp() {
        try{
            $query = $this->db->query("SELECT * FROM temp_teachers order by full_name asc");
            return $query->result();
        } catch (Exception $ex) {
            return FALSE;
        }
    }

        public function getSalarySheet_details() {
        try{
            $query = $this->db->query("SELECT * FROM teachers t, salary_details s WHERE t.user_id = s.teacher_id");
            return $query->result();
        } catch (Exception $ex) {
            return FALSE;
        }
    }
       public function getSalarySheet_details_id($id) {
        try{
            $query = $this->db->query("SELECT * FROM teachers t, salary_details s WHERE t.user_id = s.teacher_id AND s.teacher_id='$id'");
            return $query->result();
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    public function getSalarySheet($id){
         try{
            $query = $this->db->query("SELECT * FROM salary_details WHERE id='$id' ");
           // return $query->result();
             $row = $query->row();
                return $row;
        } catch (Exception $ex) {
            return FALSE;
        }

    }

        public function getSalarySheettoPrint($id){
         try{
            $query = $this->db->query("SELECT * FROM salary_details WHERE id='$id' ");
             $row = $query->result();
                return $row;
        } catch (Exception $ex) {
            return FALSE;
        }

    }

    /**
     * update teacher details
     *
     * @param array $teacher contains teacher details including both personal and accademic details
     * @param int $myid
     * @return boolean
     */
    public function UpdateTeacher($teacher, $myid) {
        try{
            $this->db->where('id', $myid);
            $this->db->update('teachers', $teacher);
            return TRUE;
        } catch (Exception $ex) {
            return FALSE;
        }
    }



    /**
     * update teacher details
     *
     * @param array $teacher contains teacher details including both personal and accademic details
     * @param int $myid
     * @return boolean
     */
    public function UpdateTeacher_inTemp($teacher, $id) {
        try{
            $this->db->where('id', $id);
            $this->db->update('temp_teachers', $teacher);
            return TRUE;
        } catch (Exception $ex) {
            return FALSE;
        }
    }


    /**
     * delete teacher details
     *
     * @param int $id
     * @return boolean
     */
    public function DeleteTeacher($id) {
        $sql = "DELETE FROM archived_teachers WHERE id='$id'";
        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * get teacher id
     *
     * @param int $userid
     * @return mixed boolean or int value
     */
    public function get_teacher_id($userid) {
        try {
            $query = $this->db->query("SELECT id FROM teachers WHERE user_id='$userid'");
            $row = $query->row();
            return $row->id;
        } catch (Exception $ex) {
            return FALSE;
        }
    }


        /**
     * get teacher id
     *
     * @param int $userid
     * @return mixed boolean or int value
     */
    public function get_temp_teacher_id($userid) {
        try {
            $query = $this->db->query("SELECT id FROM temp_teachers WHERE user_id='$userid'");
            $row = $query->row();
            return $row->id;
        } catch (Exception $ex) {
            return FALSE;
        }
    }


    //APPROVE TO DATABASE 
    public function approve_to_databaseTeacher($id){

         try {
                  $sql = "INSERT INTO teachers SELECT * FROM temp_teachers WHERE id ='$id' ";
                  $sql2 = "DELETE FROM temp_teachers WHERE id='$id' ";
            if ($query = $this->db->query($sql)) {
                $query = $this->db->query($sql2);
            return TRUE;
        } else {
            return FALSE;
        }

              } catch (Exception $ex) {
            return FALSE;
        }


    }



    /**
     * get teacher details of given section
     *
     * @param string $section
     * @return type
     */
    public function get_section_teacher_details($section) {
        try {
            if ($data = $this->db->query("select * from teachers where section = '$section' ")) {
                $row = $data->result();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /**
     * this method is used to upload the image to the system
     *
     * @param int $id
     * @param string $img
     * @return boolean
     */
    public function upload_pic($id, $img) {
        try {
            if ($this->db->query("UPDATE teachers SET photo_file_name = '$img' WHERE id = '$id' ")) {
                return TRUE;
            }
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    /**
     * retreive the image of given user
     *
     * @param int $id
     * @return string
     */
    public function get_profile_img($id) {
        try{
            $sql = "SELECT photo_file_name FROM teachers WHERE id='$id'";
            $query = $this->db->query($sql);
            return $query->row()->photo_file_name;
        } catch (Exception $ex) {
            return FALSE;
        }
    }



        public function get_profile_temp_img($id) {
        try{
            $sql = "SELECT photo_file_name FROM temp_teachers WHERE id='$id'";
            $query = $this->db->query($sql);
            return $query->row()->photo_file_name;
        } catch (Exception $ex) {
            return FALSE;
        }
    }


    /**
     * get user id of the given teacher
     *
     * @param int $id
     * @return int
     */
    public function getTeacherUserId($id) {
        try{
            $query = $this->db->query("SELECT user_id FROM teachers WHERE id ='$id'");
            return $query->row()->user_id;
        } catch (Exception $ex) {
            return FALSE;
        }
    }


        public function getTeacherUserIdFromEmail($email) {
        try{
            $query = $this->db->query("SELECT user_id FROM users WHERE email ='$email'");
            return $query->row()->user_id;
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    /**
     * check user id
     *
     * @param int $teacher_log_id
     * @return boolean
     */
    public function check_userid($teacher_log_id) {
        if ($this->db->query("SELECT * FROM users WHERE id = '$teacher_log_id'")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * this method is used to archive the teacher details
     *
     * @param int $id
     * @return boolean
     */
    public function archive_teacher($id) {
        try {
            if ($data_t = $this->db->query("SELECT * FROM teachers  WHERE user_id = '$id'")) {
                $teachr_data = $data_t->row();
                $NIC = $teachr_data->nic_no;
                $name = $teachr_data->full_name;
                $initial = $teachr_data->name_with_initials;
                $birth = $teachr_data->dob;
                $gender = $teachr_data->gender;
                $Nationality = $teachr_data->nationality_id;
                $religion = $teachr_data->religion_id;
                $civilstatus = $teachr_data->civil_status;
                $address = $teachr_data->permanent_addr;
                $address1 = $teachr_data->permanent_addr1;
                $address2 = $teachr_data->permanent_addr2;
                $contactMob = $teachr_data->contact_mobile;
                $contactHome = $teachr_data->contact_home;
                $email = $teachr_data->email;
                $widow = $teachr_data->wnop_no;

                if ($this->db->query("INSERT INTO archived_teachers(`id`,`nic_no`, `full_name`, `name_with_initials` , `dob` , `gender`, `nationality_id` , `religion_id` , `civil_status` , `permanent_addr` ,`permanent_addr1`,`permanent_addr2`, `contact_mobile` , `contact_home` , `email` , `wnop_no`)
    			VALUES ('$id','$NIC', '$name' , '$initial' , '$birth', '$gender' , '$Nationality' , '$religion' , '$civilstatus' , '$address' , '$address1', '$address2', '$contactMob' , '$contactHome' , '$email' , '$widow')")) {

                    $sql1 = "DELETE FROM teachers  WHERE user_id = '$id'";
                    if ($query = $this->db->query($sql1)) {
                        return TRUE;
                    } else {
                        return FALSE;
                    }
                }
            } else {

                return FALSE;
            }
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    /**
     * get all archived teacher details
     *
     * @return mixed resulting set or bollean
     */
    function get_all_archive_teachers() {
        $query = $this->db->query("SELECT * FROM  archived_teachers");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    /**
     * retieve user details of the given teacher
     *
     * @param int $id
     * @return type
     */
    public function user_details($id) {
        try{
            $sql = "SELECT * FROM users WHERE id='$id'";
            $query = $this->db->query($sql);
            return $query->row();
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    /**
     * retrive the nic no of the given user
     *
     * @param int $uid
     * @return string
     */
    public function teacher_nic_from_user_id($uid) {
        $data = $this->db->query("select * from teachers where user_id = '$uid'");
        if ($data->num_rows() > 0) {
            return $data->row()->nic_no;
        } else {
            return "0";
        }
    }

    /**
     * this method is used to generate teacher individual repot and sectionwise teacher report
     *
     * @param int $type
     * @param int $report
     */
    public function generate_report($type, $report) {
        if ($type == 1) {
            $data = $this->db->query("select * from teachers where section = '$report' ");
            echo "<img src='" . base_url('assets/img/dslogo.jpg') . "' width='128px' height='128px' style='margin-left: 4em'>";
            echo "<h3 style='margin-bottom: 0; margin-left: 3em'>D.S Senanayake College</h3>";
            echo "<h5 style='margin-top: 0; margin-left: 5em'>Report - ";
            if ($report == 1) {
                echo '1/5';
            } else if ($report == 2) {
                echo '6/7';
            } else if ($report == 3) {
                echo '8/9';
            } else if ($report == 4) {
                echo '10/11';
            } else if ($report == 5) {
                echo 'A/L Science';
            } else if ($report == 6) {
                echo 'A/L Commerce';
            } else if ($report == 7) {
                echo 'A/L Arts';
            } else {
                echo '';
            }
            echo "Section Teacher List</h5>";
            echo "<div class='row' style='margin-left: 5em'>
                    <table class='table table-hove'>
                    <thead>
                    <tr>
                        <th align='left' width='150px'>Signature No</th>
                        <th align='left' width='150px'>Name</th>
                        <th align='left' width='150px'>NIC</th>
                        <th align='left' width='150px'>Registered Date</th>
                    </tr>
                    </thead>
                    <tbody>";
            foreach ($data->result() as $row) {
                echo "<tr align='left' width='50%'>
                        <td>$row->signature_no;</td>
                        <td>$row->name_with_initials</td>
                        <td>$row->nic_no</td>
                        <td>$row->first_appointment_date</td>
                    </tr>";
            }
            echo "  </tbody>
                    </table>
                    </div>";
        } else {
            $data = $this->db->query("select * from `teachers` where `id` = $report");
            $result = $data->row();
            $propic = $this->get_profile_img($report);
            echo "<img src='" . base_url('assets/img/dslogo.jpg') . "' width='128px' height='128px' style='margin-left: 4em'>";
            echo "<img src='$propic' id='profile-img' class='img-thumbnail profile-img' style='height: 100px ; width: 100px ; margin-left: 12em ;'>";
            echo "<h3 style='margin-bottom: 0; margin-left: 3em'>D.S Senanayake College</h3>";
            echo "<h5 style='margin-top: 0; margin-left: 5em'>Teacher Report - $result->name_with_initials</h5>";
            echo "<div class='row' style='margin-left: 5em'>
                    <h3><u>Basic Details</u></h3>
                    <table class='table table-hover'>
                    <thead>
                    <tr>
                        <th align='left' width='50%'></th>
                        <th align='left' width='50%'></th>
                    </tr>
                </thead>
                <tbody>";
            echo "<tr align='left' width='50%'>
                    <td>NIC</td>
                    <td>$result->nic_no</td>
                </tr>
                <tr align='left' width='50%'>
                    <td>Full Name</td>
                    <td>$result->full_name</td>
                </tr>
                <tr align='left' width='50%'>
                    <td>Name with Initials</td>
                    <td>$result->name_with_initials</td>
                </tr>
                <tr align='left' width='50%'>
                    <td>Birthday</td>
                    <td>$result->dob</td>
                </tr>
                <tr align='left' width='50%'>
                    <td>Gender</td>
                    <td>";
            if ($result->gender == 'm') {
                echo 'Male';
            } else if ($result->gender == 'f') {
                echo 'Female';
            }
            echo "</td>";
            echo "</tr>
                <tr align='left' width='50%'>
                <td>Nationality</td>
                <td>";
            if ($result->nationality_id == 1) {
                echo "Sinhala";
            } else if ($result->nationality_id == 2) {
                echo "Sri Lankan Tamil";
            } else if ($result->nationality_id == 3) {
                echo "Indian Tamil";
            } else if ($result->nationality_id == 4) {
                echo "Muslim";
            } else {
                echo "Other";
            }
            echo "</td>
                    </tr>
                    <tr align='left' width='50%'>
                        <td>Religion</td>
                        <td>";
            if ($result->religion_id == 1) {
                echo "Buddhism";
            } else if ($result->religion_id == 2) {
                echo "Hindunism";
            } else if ($result->religion_id == 3) {
                echo "Islam";
            } else if ($result->religion_id == 4) {
                echo "Catholicism";
            } else if ($result->religion_id == 5) {
                echo "Christianity";
            } else {
                echo "Other";
            }
            echo "</td>
                    </tr>
                    <tr align='left' width='50%'>
                    <td>Civil Status</td>
                    <td>";
            if ($result->civil_status == 's') {
                echo "Single";
            } else if ($result->civil_status == 'm') {
                echo "Married";
            } else if ($result->civil_status == 'w') {
                echo "Widow";
            } else {
                echo "Other";
            }
            echo "</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Address</td>
                <td>$result->permanent_addr,
                    $result->permanent_addr1,
                    $result->permanent_addr2
                </td>
            </tr>
            <tr align='left' width='50%'>
                <td>Contact Mobile No</td>
                <td>$result->contact_home</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Widow & Orphan No</td>
                <td>$result->wnop_no</td>
            </tr>
        </tbody>
    </table>
    <h3><u>Academic Details</u></h3>
    <table class='table table-hover'>
        <thead>
            <tr >
                <th align='left' width='50%'></th>
                <th align='left' width='50%'></th>
            </tr>
        </thead>
        <tbody>
            <tr align='left' width='50%'>
                <td>Register No</td>
                <td>$result->teacher_register_no</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Signature No</td>
                <td>$result->signature_no</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Serial No</td>
                <td>$result->serial_no</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Date Joined School</td>
                <td>$result->joined_date</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Medium</td>
                <td>";
            if ($result->medium == 's') {
                echo "Sinhala";
            } else if ($result->medium == 'e') {
                echo "English";
            } else if ($result->medium == 't') {
                echo "Tamil";
            } else {
                echo "";
            }

            echo "</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Designation</td>
                <td>";
            if ($result->designation_id == 1) {
                echo "Principal";
            } else if ($result->designation_id == 2) {
                echo "Acting Principal";
            } else if ($result->designation_id == 3) {
                echo "Deputy Principal";
            } else if ($result->designation_id == 4) {
                echo "Acting Deputy Principal";
            } else if ($result->designation_id == 5) {
                echo "Assistant Principal";
            } else if ($result->designation_id == 6) {
                echo "Acting Assistant Principal";
            } else if ($result->designation_id == 7) {
                echo "Teacher";
            } else {
                echo "";
            }
            echo "</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Section</td>
                <td>";
            if ($result->section == 1) {
                echo "1/5";
            } else if ($result->section == 2) {
                echo "6/7";
            } else if ($result->section == 3) {
                echo "8/9";
            } else if ($result->section == 4) {
                echo "10/11";
            } else if ($result->section == 5) {
                echo "A/L Science";
            } else if ($result->section == 6) {
                echo "A/L Commerce";
            } else if ($result->section == 7) {
                echo "A/L Arts";
            } else {
                echo "";
            }
            echo "</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Main Subject</td>
                <td>";
            if ($result->main_subject_id == 1) {
                echo "Maths";
            } else if ($result->main_subject_id == 2) {
                echo "Science";
            } else if ($result->main_subject_id == 3) {
                echo "Chemistry";
            } else if ($result->main_subject_id == 4) {
                echo "Physics";
            } else if ($result->main_subject_id == 5) {
                echo "Business Studies";
            } else if ($result->main_subject_id == 6) {
                echo "English";
            } else if ($result->main_subject_id == 7) {
                echo "History";
            } else if ($result->main_subject_id == 8) {
                echo "Information Technology";
            } else if ($result->main_subject_id == 9) {
                echo "Sinhala";
            } else if ($result->main_subject_id == 10) {
                echo "Mechanics";
            } else if ($result->main_subject_id == 11) {
                echo "Tamil";
            } else if ($result->main_subject_id == 12) {
                echo "Other";
            } else {
                echo "";
            }
            echo "</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Service Garde</td>
                <td>";
            if ($result->grade == 1) {
                echo "Sri Lanka Education Administrative ServiceI";
            } else if ($result->grade == 2) {
                echo "Sri Lanka Education Administrative ServiceII";
            } else if ($result->grade == 3) {
                echo "Sri Lanka Education Administrative ServiceIII";
            } else if ($result->grade == 4) {
                echo "Sri Lanka Principal ServiceI";
            } else if ($result->grade == 5) {
                echo "Sri Lanka Principal Service2I";
            } else if ($result->grade == 6) {
                echo "Sri Lanka Principal Service2II";
            } else if ($result->grade == 7) {
                echo "Sri Lanka Principal Service3";
            } else if ($result->grade == 8) {
                echo "Sri Lanka Teacher ServiceI";
            } else if ($result->grade == 9) {
                echo "Sri Lanka Teacher Service2I";
            } else if ($result->grade == 10) {
                echo "Sri Lanka Teacher Service2II";
            } else if ($result->grade == 11) {
                echo "Sri Lanka Teacher Service3I";
            } else if ($result->grade == 12) {
                echo "Sri Lanka Teacher Service3II";
            } else if ($result->grade == 13) {
                echo "Sri Lanka Teacher Service Pending";
            } else {
                echo "";
            }
            echo "</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Nature of Appointment</td>
                <td>";
            if ($result->nature_of_appointment == 1) {
                echo "Degree";
            } else if ($result->nature_of_appointment == 2) {
                echo "Diploma";
            } else if ($result->nature_of_appointment == 3) {
                echo "Trained";
            } else if ($result->nature_of_appointment == 4) {
                echo "Other";
            } else {
                echo "";
            }
            echo "</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Educational Qualifications</td>
                <td>$result->educational_qualific</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Professional Qualifications</td>
                <td>$result->professional_qualific</td>
            </tr>
            <tr align='left' width='50%'>
                <td>First Appointment Date</td>
                <td>$result->first_appointment_date</td>
            </tr>
            <tr align='left' width='50%'>
                <td>Due Pension Date</td>
                <td>$result->pension_date</td>
            </tr>
            </table>
        </div>";
        }
    }

    /**
     *
     * @return type
     */
    public function get_teacher_list() {
        $sql = "SELECT `id`, `full_name` FROM teachers ORDER BY `id`";
        return $this->db->query($sql)->result();
    }

    /**
     *
     * @param type $teacher_id
     * @return type
     */
    public function get_teacher_name($teacher_id) {
        $sql = "SELECT name_with_initials FROM teachers WHERE id='{$teacher_id}'";
        return $this->db->query($sql)->row();
    }
}
