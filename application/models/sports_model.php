<?php

class Sports_Model extends CI_Model {

    //loading database on class creationorderMainAddress
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    public function add_sport_category($name,$description,$agecat){
        $this->db->query("INSERT INTO sport_category(name,description,age_category) VALUES('$name','$description','$agecat')");
        return TRUE;
    }

    public function view_sport_category() {
        $data = $this->db->query("SELECT * FROM sport_category");
        return $data->result();
    }

    public function sport_category_details($id) {
        $data = $this->db->query("select * from sport_category where id='$id'");
        return $data->row();
    }

    public function view_sport_captains() {
        $data = $this->db->query("SELECT * FROM sport_captains");
        return $data->result();
    }

    public function view_sport_team() {
        $data = $this->db->query("SELECT * FROM sport_team");
        return $data->result();
    }

    public function view_sport_incharge() {
        $data = $this->db->query("SELECT * FROM sport_incharge");
        return $data->result();
    }

    public function edit_sport_details($id,$name,$des){
        $data = array(
            'name'=> $name,
            'description'=> $des
        );

        $this->db->where("id",$id);
        $this->db->update('sport_category',$date);
        return true;

    }

    public function get_all_sports(){
        $data = $this->db->query("SELECT name FROM sport_category");
        return $data->result();
    }

    public function get_all_teachers(){
        $data = $this->db->query("SELECT full_name FROM teachers");
        return $data->result();
    }

    public function get_all_students(){
        $data = $this->db->query("SELECT full_name FROM students");
        return $data->result();
    }

    public function captain_name($id){

        try {
            if($data = $this->db->query("SELECT full_name FROM students WHERE admission_no ='$id'")){
                $row = $data->row()->full_name;
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    public function get_cap_regno($name){
        $data = $this->db->query("SELECT admission_no FROM students WHERE	full_name LIKE '%$name%' LIMIT 1;");
        //var_dump($data);
        return $data->result();
    }

    public function delete_sport($id){
        $this->db->query("delete from sport_category where id='$id'");
        return TRUE;
    }

    /*
    *update sport deatils in to database
    */
    public function update_sport($id, $sport_data) {
        
        $sql = "UPDATE sport_category SET name ='{$sport_data['name']}',  description='{$sport_data['des']}'  WHERE id='$id'";

        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
    *get individual sport details from the db
    */
    public function get_sport($id) {
        try {
            if ($data = $this->db->query("SELECT * FROM sport_category WHERE id = '$id'")) {
                $row = $data->row();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /*
    *insert sports deatils in to database
    */
    public function add_sport_captains($name,$cat,$division,$cap,$vice) {
        $this->db->query("INSERT INTO sport_captains(name,category,division,captain,vice) VALUES('$name','$cat','$division','$cap','$vice')");
        return TRUE;
    }

    public function delete_captain($id){
        $this->db->query("delete from sport_captains where id='$id'");
        return TRUE;
    }

    /*
    *get individual leader details from the db
    */
    public function get_captain($id) {
        try {
            if ($data = $this->db->query("SELECT * FROM sport_captains WHERE id = '$id'")) {
                $row = $data->row();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /*
    *update leader deatils in to database
    */
    public function update_captain($id, $cap_data) {
        
        $sql = "UPDATE sport_captains SET category ='{$cap_data['cat']}', division='{$cap_data['div']}', captain='{$cap_data['cap']}', vice='{$cat_data['vice']}'  WHERE id='$id'";

        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function add_sport_team($name,$reg_no,$sname,$cat,$division) {
        $this->db->query("INSERT INTO sport_team(name,reg_no,sport_name,category,division) VALUES('$name','$reg_no','$sname','$cat','$division')");
        return TRUE;
    }

    public function delete_team_member($id){
        $this->db->query("delete from sport_team where id='$id'");
        return TRUE;
    }

    /*
    *get individual student details from the db
    */
    public function get_student($id) {
        try {
            if ($data = $this->db->query("SELECT * FROM sport_team WHERE id = '$id'")) {
                $row = $data->row();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /*
    *update student deatils in to database
    */
    public function update_student($id, $team_data) {
        
        $sql = "UPDATE sport_team SET sport_name ='{$team_data['sname']}', category='{$team_data['cat']}', division='{$team_data['div']}' WHERE id='$id'";

        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function add_sport_incharge($sname,$name) {
        $this->db->query("INSERT INTO sport_incharge(incharge_name,sport_name) VALUES('$sname','$name')");
        return TRUE;
    }

    public function delete_team_incharge($id){
        $this->db->query("delete from sport_incharge where id='$id'");
        return TRUE;
    }

    public function get_incharge($id) {
        try {
            if ($data = $this->db->query("SELECT * FROM sport_incharge WHERE id = '$id'")) {
                $row = $data->row();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /*
    *update student deatils in to database
    */
    public function update_incharge($id, $incharge_data) {
        
        $sql = "UPDATE sport_incharge SET incharge_name ='{$incharge_data['sname']}', sport_name='{$incharge_data['tname']}' WHERE id='$id'";

        if ($query = $this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
?>
