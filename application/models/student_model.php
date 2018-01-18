<?php
/**
 * Ecole - Student Model
 *
 * Handles DB Functionalities of the Student component
 *
 * @author  Sampath R.P.C.
 */

class Student_Model extends CI_Model {


    /**
     * constructor
     */
    public function __construct() {
        parent::__construct();
      $this->load->helper('date');
    }


    /**
     * Insert New Student recode
     *
     * @param type $student_data
     * @return boolean
     */
    public function insert_new_student($student_data) {
        try {
            if($this->db->insert('students', $student_data)){
             $id = $this->db->insert_id();
               return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    public function approve_to_databaseStudent($id){

          try {
                  $sql = "INSERT INTO students SELECT * FROM temp_students WHERE user_id ='$id' ";
                  $sql2 = "DELETE FROM temp_students WHERE user_id='$id' ";
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


    public function approve_to_databaseGaurdian($id){

              try {
                  $sql = "INSERT INTO guardians SELECT * FROM temp_guardians WHERE student_id ='$id' ";
                  $sql2 = "DELETE FROM temp_guardians WHERE student_id='$id' ";
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
     * Insert New Temp Student recode
     *
     * @param type $student_data
     * @return boolean
     */
    public function insert_new_Temp_student($student_data) {
        try {
            if($this->db->insert('temp_students', $student_data)){
             $id = $this->db->insert_id();
               return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }



    /**
     * Insert New Guardian recode
     *
     * @param type $guardian_data
     * @return type
     */
    public function insert_new_Guardian($guardian_data) {


        if ($this->db->insert('guardians',$guardian_data)){
            $id = $this->db->insert_id();
            return $id;
        } else {
            return NULL;
        }
    }



    /**
     * Insert New Temp Guardian recode
     *
     * @param type $guardian_data
     * @return type
     */
    public function insert_new_Temp_Guardian($guardian_data) {


        if ($this->db->insert('temp_guardians',$guardian_data)){
            $id = $this->db->insert_id();
            return $id;
        } else {
            return NULL;
        }
    }

    /**
     * getting the last recode details of students table
     *
     * @return type mixed :boolean or query result
     */
    public function get_last_row() {
            $this->db->order_by("id", "desc");
        if ($rows = $this->db->get('users')) {
            $row = $rows->row();
            return $row;
        } else {
            return null;
        }
    }

      /**
     * getting the last recode details of students table
     *
     * @return type mixed :boolean or query result
     */
    public function get_temp_last_row() {
            $this->db->order_by("id", "desc");
        if ($rows = $this->db->get('temp_students')) {
            $row = $rows->row();
            return $row;
        } else {
            return null;
        }
    }


    /**
     * getting the recode details of Newly added Student
     *
     * @param type $id
     * @return type
     */
    public function get_last_inserted_student($id) {
        if ($query = $this->db->get_where('students',array('id' => $id),1)) {
            $row = $query->row();
            return $row;
        } else {
            return null;
        }
    }
    /**
     * getting the recode details of Newly added Student in temp
     *
     * @param type $id
     * @return type
     */
    public function get_last_temp_inserted_student($id) {
        if ($query = $this->db->get_where('temp_students',array('id' => $id),1)) {
            $row = $query->row();
            return $row;
        } else {
            return null;
        }

    }
    






    /**
     * getting the recode details of  Student details by given id
     *
     * @param type $id
     * @return type query results
     */
    public function get_student_only($id) {
        try {
            if ($data =  $this->db->get_where('students',array('user_id' => $id),1)){
                $row = $data->row();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }


    /**
     * getting the recode details of  Student details by given id
     *
     * @param type $id
     * @return type query results
     */
    public function get_Temp_student_only($id) {
        try {
            if ($data =  $this->db->get_where('temp_students',array('user_id' => $id),1)){
                $row = $data->row();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }


    /**
     * getting the recode details of guardian details by given id
     *
     * @param type $id
     * @return type query resuls
     */
    public function get_guardian_only($id) {
        try {
            if($data = $this->db->get_where('guardians',array('student_id' => $id),1)){
                $row = $data->row();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }



    /**
     * getting the recode details of guardian details by given id
     *
     * @param type $id
     * @return type query resuls
     */
    public function get_temp_guardian_only($id) {
        try {
            if($data = $this->db->get_where('temp_guardians',array('student_id' => $id),1)){
                $row = $data->row();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    




    /**
     * getting all the student recode details without pagination
     *
     * @return type query results
     */
    public function get_all_students_2() {

        $query = $this->db->get('students');
        return $query;
    }


    /**
     * get all archived student recodes
     *
     * @return boolean
     */
    function get_all_archive_students() {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('archived_students');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function get_class_names(){
        $query = $this->db->get('classes');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

     function get_class_name_by_id($id){
        $query = $this->db->get_where('classes',array('id'=>$id),1);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }


    /**
     * delete student recode + his guardian details
     *
     * @param type $id
     * @return boolean
     */
    public function delete_student($id) {
        $sql1 = "DELETE s,g FROM archived_students AS s INNER JOIN archived_guardians AS g ON s.user_id = g.student_id  WHERE  s.user_id = '$id'";

        if ($query = $this->db->query($sql1)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }



    /**
     *update Guardian recode
     *
     * @param type $guardian
     * @param type $myid
     * @return boolean
     */
    public function update_guardian($guardian, $myid) {
        $sql = "UPDATE guardians SET fullname = '{$guardian['name']}', name_with_initials = '{$guardian['nameWithInitials']}', dob = '{$guardian['birthday']}', occupation = '{$guardian['occupation']}',
                                        addr ='{$guardian['address']}',contact_home='{$guardian['contact_home']}',contact_mobile='{$guardian['contact_mobile']}' WHERE student_id='$myid' ";
        // $sql = "UPDATE teachers SET nic_no='{$teacher['nic']}' WHERE id='$myid' ";

        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }



    /**
     *update Guardian recode
     *
     * @param type $guardian
     * @param type $myid
     * @return boolean
     */
    public function update_temp_guardian($guardian, $myid) {
        $sql = "UPDATE temp_guardians SET fullname = '{$guardian['name']}', name_with_initials = '{$guardian['nameWithInitials']}', dob = '{$guardian['birthday']}', occupation = '{$guardian['occupation']}',
                                        addr ='{$guardian['address']}',contact_home='{$guardian['contact_home']}',contact_mobile='{$guardian['contact_mobile']}' WHERE student_id='$myid' ";
        // $sql = "UPDATE teachers SET nic_no='{$teacher['nic']}' WHERE id='$myid' ";

        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    /**
     * update Student recode
     *
     * @param type $student
     * @param type $myid
     * @return boolean
     */
    public function update_student($student, $myid) {
        $sql = "UPDATE students SET full_name ='{$student['name']}',  permanent_addr='{$student['address']}', name_with_initials='{$student['nameWithInitials']}', contact_home='{$student['contact_home']}', email='{$student['email']}'  WHERE user_id='$myid'";

        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }



    /**
     * update Student recode
     *
     * @param type $student
     * @param type $myid
     * @return boolean
     */
    public function update_temp_student($student, $myid) {
        $sql = "UPDATE temp_students SET full_name ='{$student['name']}',  permanent_addr='{$student['address']}', name_with_initials='{$student['nameWithInitials']}', contact_home='{$student['contact_home']}', email='{$student['email']}'  WHERE user_id='$myid'";

        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }




    /**
     * Insert new student's log details
     *
     * @param type $username
     * @param type $password
     * @param type $create
     * @param type $fname
     * @param type $lname
     * @return boolean
     */
    public function insert_new_student_userdata($username, $password, $create, $fname, $lname) {
        $encryptpwd = md5($password);
        $user_data=array(
            'username'=>$username,
            'password'=>$encryptpwd,
            'first_name'=>$fname,
            'last_name'=>$lname,
            'created_at'=>$create,
            'user_type'=>'S'
        );
        try {

            if ($this->db->insert('users',$user_data)) {
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    public function insert_new_guardian_data($username, $password, $create, $fname, $lname) {
      $encryptpwd = md5($password);
      $user_data = array(
        'username'=>$username,
        'password'=>$encryptpwd,
        'first_name'=>$fname,
        'last_name'=>$lname,
        'created_at'=>$create,
        'user_type'=>'P'
      );
      try {

        if ($this->db->insert('users',$user_data)) {
          $id = $this->db->insert_id();
          return $id;
        } else {
          return NULL;
        }
      } catch (Exception $e) {
        return FALSE;
      }

    }

        /**
     * getting the recode details of  Student with his guardian details by given id
     *
     * @param type $id
     * @return type query results
     */
    public function get_student_profile($id) {

        try {
            if ($data = $this->db->query("SELECT * FROM students s, guardians g WHERE s.user_id = g.student_id  AND  s.user_id = '$id'")) {
                $row = $data->row();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /**
     * set user_id of the student in the student table
     *
     * @param type $ID
     * @param type $userid
     * @return boolean
     */
    public function set_user_id($ID, $userid) {
        try {
            $data=array(
                'user_id'=>$userid
            );
            $this->db->where('id', $ID);
            $res=$this->db->update('students', $data);
            if ($res) {

                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

        public function set_user_id_InTemp($ID, $userid) {
        try {
            $data=array(
                'user_id'=>$userid
            );
            $this->db->where('id', $ID);
            $res=$this->db->update('temp_students', $data);
            if ($res) {

                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

        public function set_user_id_InTempG($ID, $userid) {
        try {
            $data=array(
                'student_id'=>$userid
            );
            $this->db->where('id', $ID);
            $res=$this->db->update('temp_guardians', $data);
            if ($res) {

                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return null;
        }
    }





    /**
     * Get Logged user's username
     *
     * @param type $user_id
     * @return boolean
     */
    public function get_details($user_id) {


        $query=$this->db->get_where('users',array('id'=>$user_id));

        if ($query->num_rows() > 0) {
             $row=$query->row();
            return $row->username;
        } else {
            return FALSE;
        }
    }

    /**
     * Get Logged user's username
     *
     * @param type $user_id
     * @return boolean
     */
    public function get_student($user_id) {


        $query=$this->db->get_where('students',array('id'=>$user_id));

        if ($query->num_rows() > 0) {
             $row=$query->row();
            return $row->username;
        } else {
            return FALSE;
        }
    }


    /**
     * change Logged user's password
     *
     * @param type $user_id
     * @param type $new_password
     * @return boolean
     */
    public function change_password($user_id, $new_password) {
        $hashed_password = md5($new_password);
        $query = "UPDATE users SET password='{$hashed_password}' WHERE id='{$user_id}'";
        $result = $this->db->query($query);

        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     *  get Logged user's encrypted password
     *
     * @param type $user_id
     * @return type query results
     */
    public function get_password_hash($user_id) {

       $query = $this->db->get_where('users',array('id'=>$user_id),1);

        $row = $query->row();
        return $row->password;
    }

    /**
     * Insert New Guardian recode
     *
     * @param type $id
     * @return boolean
     */
    public function archive_student($id) {


        try {

             $data_s = $this->db->get_where('students', array('user_id' => $id),1);

            if ($data_s->row()) {
                $student_data = $data_s->row();

                $user_id = $student_data->user_id;
                $admissionno = $student_data->admission_no;
                $admissiondate = $student_data->admission_date;
                $fullname = $student_data->full_name;
                $initials = $student_data->name_with_initials;
                $dob = $student_data->dob;
                $gender = "M";
                $nic = $student_data->nic_no;
                $language = $student_data->language;
                $religion_id = $student_data->religion;
                $address1 = $student_data->permanent_addr;
                $address2 = $student_data->permanent_addr1;
                $address3 = $student_data->permanent_addr2;
                $contact = $student_data->contact_home;
                $house_id = $student_data->house_id;
                $email = $student_data->email;
                $created_at = date('Y-m-d H:i:s');

                $data_g = $this->db->get_where('guardians',array('student_id' => $id));
                $guardian_d = $data_g->row();



                if ($this->db->query("INSERT INTO archived_students (`user_id` , `admission_no` , `admission_date` , `full_name` , `name_with_initials` , `dob` , `gender`, `language` , `religion` , `permanent_addr` , `permanent_addr1` , `permanent_addr2` , `contact_home` , `email` , `house_id` , `created_at`)
    			VALUES ('$user_id' , '$admissionno', '$admissiondate' , '$fullname' , '$initials' , '$dob' , '$gender' , '$language' , '$religion_id' , '$address1' , '$address2' , '$address3' , '$contact' , '$email' , '$house_id' , '$created_at')")) {


                    $data_g =$this->db->get_where('guardians', array('student_id' => $id),1);

                    if($data_g->row() == null | $data_g->row()== null){

                    if($data_g->row() == null){
                        $sql3 = "DELETE FROM students WHERE user_id = $id";
                        $query = $this->db->query($sql3);
                      
                    }

                }


                    if ($data_g->row()) {
                        $guardian_data = $data_g->row();


                        $student_id = $guardian_data->student_id;
                        $fullname = $guardian_data->fullname;
                        $initials = $guardian_data->name_with_initials;
                        $dob = $guardian_data->dob;
                        $gender = $guardian_data->gender;
                        $occupation = $guardian_data->occupation;
                        $relation = $guardian_data->relation;
                        $pastpupil = $guardian_data->is_pastpupil;
                        $adddress = $guardian_data->addr;
                        $contact_home = $guardian_data->contact_home;
                        $contact_mobile = $guardian_data->contact_mobile;

                        if ($this->db->query("INSERT INTO archived_guardians (`student_id` , `fullname` , `name_with_initials` , `dob` , `gender` , `relation` , `occupation` , `addr` , `contact_home` , `contact_mobile`,`is_pastpupil` )
    			VALUES ('$student_id', '$fullname'  , '$initials' , '$dob' , '$gender' , '$relation' , '$occupation' , '$adddress' , '$contact_home' , '$contact_mobile','$pastpupil')")) {

                            $sql1 = "DELETE s,g FROM students AS s INNER JOIN guardians AS g ON s.user_id = g.student_id  WHERE  s.user_id = '$id'";

                            if ($query = $this->db->query($sql1)) {
                                return TRUE;
                            } else {
                                return FALSE;
                            }
                        }
                    }
                }


            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }


    public function deleteFromTemp($id){



              try {
                  $sql = "DELETE FROM temp_students WHERE user_id = $id ";
                  $sql2 = "DELETE FROM temp_guardians WHERE student_id='$id' ";
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
     * getting the recode details of archived student by given id
     *
     * @param type $id
     * @return type query resuls
     */
    public function get_archived_student_only($id) {
        try {
             $data =$this->db->get_where('archived_students',array('user_id' => $id),1);

            if ($row = $data->row()) {
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }



    /**
     * for serverside datatable of student recodes
     *
     * @param type $data
     * @return type mixed : boolean , query results
     */
    public function get_all_student_details($data) {
        $limit = intval(htmlspecialchars($data["limit"]));
        $offset = intval(htmlspecialchars($data["offset"]));
        $orderBy = htmlspecialchars(strtolower($data["orderby"]));
        $orderByCol = htmlspecialchars(strtolower($data["orderCol"]));
        $search = htmlspecialchars(strtolower($data["search"]));


        $sql = "SELECT s.id, s.user_id, s.admission_no, s.name_with_initials, s.contact_home FROM students s where s.id LIKE '%" . $search . "%' or s.admission_no LIKE '%" . $search . "%' or s.name_with_initials LIKE '%" . $search . "%' or s.contact_home LIKE '%" . $search . "%'  Order By " . $orderByCol . " " . $orderBy . " LIMIT " . $limit . " OFFSET " . $offset . " ";
        $query = $this->db->query($sql);

        $sql2 = "SELECT count(s.id) as count FROM students s where s.id LIKE '%" . $search . "%' or s.admission_no LIKE '%" . $search . "%' or s.name_with_initials LIKE '%" . $search . "%' or s.contact_home LIKE '%" . $search . "%'";
        $count = $this->db->query($sql2);

        if ($count->row()) {
            $getthis = false;

            $countRows = $count->row()->count;
        } else {
            $getthis = true;
            $countRows = 0;
        }


        $arr = array(
            "data" => $query->result(),
            "count" => $countRows,
            "responed" => $getthis
        );


        return $arr;
    }


    /**
     * for serverside datatable of student temp recodes
     *
     * @param type $data
     * @return type mixed : boolean , query results
     */
    public function get_all_temp_student_details($data) {
        $limit = intval(htmlspecialchars($data["limit"]));
        $offset = intval(htmlspecialchars($data["offset"]));
        $orderBy = htmlspecialchars(strtolower($data["orderby"]));
        $orderByCol = htmlspecialchars(strtolower($data["orderCol"]));
        $search = htmlspecialchars(strtolower($data["search"]));


        $sql = "SELECT s.id, s.user_id, s.admission_no, s.name_with_initials, s.contact_home FROM temp_students s where s.id LIKE '%" . $search . "%' or s.admission_no LIKE '%" . $search . "%' or s.name_with_initials LIKE '%" . $search . "%' or s.contact_home LIKE '%" . $search . "%'  Order By " . $orderByCol . " " . $orderBy . " LIMIT " . $limit . " OFFSET " . $offset . " ";
        $query = $this->db->query($sql);

        $sql2 = "SELECT count(s.id) as count FROM temp_students s where s.id LIKE '%" . $search . "%' or s.admission_no LIKE '%" . $search . "%' or s.name_with_initials LIKE '%" . $search . "%' or s.contact_home LIKE '%" . $search . "%'";
        $count = $this->db->query($sql2);

        if ($count->row()) {
            $getthis = false;

            $countRows = $count->row()->count;
        } else {
            $getthis = true;
            $countRows = 0;
        }


        $arr = array(
            "data" => $query->result(),
            "count" => $countRows,
            "responed" => $getthis
        );


        return $arr;
    }



    /**
     * genarate student report
     *
     * @param type $report
     * @return boolean
     */
    public function generate_report($report) {
        $data = $this->db->query("select s.* from students s inner join classes c on c.grade_id=s.current_grade where c.grade_id = '$report' ");

        if ($data->num_rows() > 0) {
            return $data->result();
        }else{
            return FALSE;
        }


    }

    /**
     * genarate student report
     *
     * @param type $report
     * @return boolean
     */
    public function generate_class_report($class) {
        $data = $this->db->query("select s.* from students s inner join classes c on c.id=s.current_class where c.id = '$class' ");

        if ($data->num_rows() > 0) {
            return $data->result();
        }else{
            return FALSE;
        }


    }

    /**
     * get student user id by given addmission no
     *
     * @param type $index
     * @return type query results
     */
    function get_id_by_index($index){
         try {

             $data=$this->db->get_where('students',array('admission_no'=>$index),1);
            if ($data->row()) {
                $row = $data->row()->user_id;
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /**
     * get all note details
     *
     * @return boolean
     */
    function get_all_notes(){
         $data = $this->db->query("select s.admission_no ,s.contact_home ,c.name, n.* from students s, classes c ,notes n where c.grade_id=s.current_class and s.user_id=n.student_id");

        if ($data->num_rows() > 0) {
            return $data->result();

        }else{
            return FALSE;
        }
    }

    /**
     * get details of a specific note by given id
     *
     * @param type $id
     * @return boolean
     */
     function get_note($id){
         $data = $this->db->get_where('notes',array('id'=>$id),1);


        if ($data) {
            return $data->row();
        }else{
            return FALSE;
        }
    }

    /**
     * Chane note settings
     *
     * @param type $id
     * @param type $action
     * @return boolean
     */
     public function take_action($id, $action) {
        $query = "UPDATE notes SET action='{$action}',status='1' WHERE id='{$id}'";
        $result = $this->db->query($query);

        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

/**
 * Get last inserted student admission number.
 */
    public function get_last_student_id() {

        try {
            if ($data = $this->db->query("SELECT * FROM students ORDER BY id DESC LIMIT 1")) {
                $row = $data->row()->admission_no;
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    public function student_certificate($id) {
        $data = $this->db->query("select * from `students` where `admission_no` = $id");
        $result = $data->row();
        return $result;
    }

}

?>
