<?php
/**
 * Ecole - Year Model
 *
 * Handles the Year Model Functions
 *
 * @author  V.I.Galhena
 */
class Year_Model extends CI_Model {

	public function __construct() {
			$this->load->database();
	}

    /*
     * Function to add new academic year
     *
     * @param  string name
     * @param  date start_date
     * @param  date end_date
     * @param  date status
     * @param  date t1_start_date
     * @param  date t1_end_date
     * @param  date t2_start_date
     * @param  date t2_end_date
     * @param  date t3_start_date
     * @param  date t3_end_date
     * @param  string structure
     *
     * @return bool
     */
    public function add_new_academic_year($name, $start_date, $end_date, $status, $t1_start_date, $t1_end_date, $t2_start_date, $t2_end_date, $t3_start_date, $t3_end_date, $structure){
        try {
            if($this->db->query("INSERT INTO year_plan ( `name`, `start_date`, `end_date`, `status`, `t1_start_date`, `t1_end_date`, `t2_start_date`, `t2_end_date`, `t3_start_date`, `t3_end_date`, `structure`)
                VALUES ('$name', '$start_date', '$end_date','$status', '$t1_start_date', '$t1_end_date', '$t2_start_date','$t2_end_date', '$t3_start_date' ,'$t3_end_date', '$structure');")) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
     * Function to update an academic year
     *
     * @param  int id
     * @param  string name
     * @param  date start_date
     * @param  date end_date
     * @param  date status
     * @param  date t1_start_date
     * @param  date t1_end_date
     * @param  date t2_start_date
     * @param  date t2_end_date
     * @param  date t3_start_date
     * @param  date t3_end_date
     * @param  string structure
     *
     * @return bool
     */
    public function update_academic_year($id, $name, $start_date, $end_date, $status, $t1_start_date, $t1_end_date, $t2_start_date, $t2_end_date, $t3_start_date, $t3_end_date, $structure){
        try {
            if($this->db->query("UPDATE year_plan SET `name` = '$name', `start_date` = '$start_date', `end_date` = '$end_date', `status` = '$status', `t1_start_date` = '$t1_start_date', `t1_end_date` = '$t1_end_date', `t2_start_date` = '$t2_start_date', `t2_end_date` = '$t2_end_date', `t3_start_date` = '$t3_start_date', `t3_end_date` = '$t3_end_date', `structure` ='$structure'
                WHERE `id` = '$id' ")) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
     * Function to update a holiday
     *
     * @param  int id
     * @param  string structure
     *
     * @return bool
     */
    public function update_holiday($id, $structure){
        try {
            if($this->db->query("UPDATE year_plan SET `structure` ='$structure'
                WHERE `id` = '$id' ")) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch(Exception $ex) {
            return FALSE;
        }
    }


    /*
     * Function to get academic year details
     *
     * @return mixed bool or Results
     */
    public function get_academic_year_details(){
        try{
            $this->db->select('*');
            $this->db->where('status', '1');
            $this->db->limit(1);
            $query = $this->db->get('year_plan');

            return $query->result();
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
     * Function to get all academic year details
     *
     * @return mixed bool or Results
     */
    public function get_all_academic_years(){
        try{
            $query = $this->db->query("SELECT * FROM year_plan ORDER BY start_date desc");

            return $query->result();
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
     * Function to get academic year by id
     *
     * @param  int id
     *
     * @return mixed bool or Results
     */
    public function get_academic_year_by_id($id){
        try{
            $this->db->select('*');
            $this->db->where('id', $id);
            $query = $this->db->get('year_plan');

            return $query->result();
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
     * Function to get year structure
     *
     * @param  int id
     *
     * @return mixed bool or Results
     */
    public function year_structure($id){
        try{
            $this->db->select('*');
            $this->db->where('id', $id);
            $query = $this->db->get('year_plan');

            foreach ($query->result() as $row){
                return $row->structure;
            }

        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
     * Function to add temp dates
     *
     * @param  int year_id
     * @param  date date
     * @param  int status
     *
     * @return bool
     */
    public function add_temp_dates($year_id, $date, $status)
    {
        try {
            if($this->db->query("INSERT INTO year_plan_temp_date ( `year_id`, `date`, `status`)
                VALUES ('$year_id', '$date', '$status');")) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
     * Function to delete temp data
     *
     * @param  int id
     *
     * @return bool
     */
    public function delete_temp_date($id){

        try {
            if($this->db->query("DELETE FROM year_plan_temp_date WHERE id = '$id' ")) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
     * Function to get temp date ids
     *
     * @param  int year_id
     * @param  date date
     *
     * @return mixed bool or Results
     */
    public function get_temp_dates_id($year_id,$date){
        try{
            $this->db->select('*');
            $this->db->where('year_id', $year_id);
            $this->db->where('date', $date);
            $query = $this->db->get('year_plan_temp_date');
            foreach ($query->result() as $row){
                return $row->id;
            }
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
     * Function to get temp dates
     *
     * @param  int year_id
     * @param  date date
     *
     * @return mixed bool or Results
     */
    public function get_temp_dates($year_id,$date){
        try{
            $this->db->select('*');
            $this->db->where('year_id', $year_id);
            $this->db->where('date', $date);
            $query = $this->db->get('year_plan_temp_date');
            foreach ($query->result() as $row){
                return $row->status;
            }
        } catch(Exception $ex) {
            return FALSE;
        }
    }
    //End of Temp Date functions
}
?>
