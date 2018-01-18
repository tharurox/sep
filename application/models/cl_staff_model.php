<?php 




class cl_staff_model extends CI_Model{

	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    public function viewAllStaff(){

    	 try{
            $query = $this->db->query("SELECT * FROM clStaff order by full_name asc");
            return $query->result();
        } catch (Exception $ex) {
            return FALSE;
        }

    }

}