<?php
/**
 * Ecole - Event Model
 *
 * Responsibe for handling date related to school events in the system
 *
 * @author V.I.Galhena
 */
class Event_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /***
     * Interact with the database to create a new event.
     *
     * @param array $insert_event contains event details such as event_name,description,budget,start_date,end_date...
     *
     * @return boolean
     */
    function insert_sport_event($insert_event) {
        try{
            $this->db->insert('events' , $insert_event);
            return TRUE;
        } catch (Exception $ex) {
            return FALSE;
        }

    }

    /***
     * Create new event type
     *
     * @param array $inert_event_type contains event type details such as event type name , description
     * @return boolean
     */
    function insert_new_event_type($inert_event_type) {
        try{
            $this->db->insert('event_type' , $inert_event_type);
            return TRUE;
        } catch (Exception $ex) {
            return FALSE;
        }

    }

    /***
     * Update the event
     *
     * @param int $event_id
     * @param array $update_event contains event details such as event_name,description,budget,start_date,end_date...
     * @return boolean
     */
    function update_event($event_id , $update_event) {
        try{
            $this->db->where('id' , $event_id);
            $this->db->update('events' , $update_event);
            return TRUE;
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    /***
     * Cancel the event. Only admin can cancel a event
     *
     * @param int $id
     * @return boolean
     */
    function cancel_event($id) {
        try {
            if ($this->db->query("UPDATE events SET `status` = 'cancelled'  WHERE `id` = '$id'")) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {

        }
    }

    /***
     * Get pending event details
     *
     * @return mixed resulting row or null value
     */
    public function get_event_details() {
        $today = date('Y-m-d');
        try {
            if ($data = $this->db->query("select * from `events`")) {
                $row = $data->result();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /***
     * getting details of the selected event
     *
     * @param int $id
     * @return mixed resulting row or null value
     */
    public function get_approved_event_details($id) {
        try {
            if ($data = $this->db->query("select * from `events` where id = '$id'")) {
                $row = $data->row();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /***
     * getting all event type details
     *
     * @return mixed resulting row or null value
     */
    public function get_event_type_details() {
        try {
            if ($data = $this->db->query("select * from `event_type`")) {
                $row = $data->result();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /***
     * Getting upcoming event details which are approved by the system admin.
     *
     * @param date $today
     * @return mixed resulting row or null value
     */
    public function get_upcoming_events($today) {
        try {

            if ($data = $this->db->query("select * from `events` where start_date >= '$today' and status = 'approved'")) {
                $row = $data->result();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /***
     * This method is used to get selected upcoming event details
     *
     * @param int $id
     * @return mixed resulting row or null value
     */
    public function get_upcoming_event_single_details($id) {
        try {
            if ($data = $this->db->query("select * from `events` where id = '$id'")) {
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
     * select pending event details
     *
     * @return mixed resulting row or null value
     */
    public function get_pending_events_to_approve() {
        try {
            if ($data = $this->db->query("select * from `events` where `status` = 'pending' limit 10")) {
                $row = $data->result();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /***
     * get rejected event details
     *
     * @return mixed resulting set or null value
     */
    public function get_canceled_events() {
        try {
            if ($data = $this->db->query("select * from `events` where `status` = 'cancelled' limit 10")) {
                $row = $data->result();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /***
     * get selected event details
     *
     * @param int $id
     * @return mixed resulting row or null value
     */
    public function load_pending_events($id) {
        try {
            if ($data = $this->db->query("select * from `events` where id = '$id'")) {
                $row = $data->row();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /***
     * update the selected event's status to approved
     *
     * @param int $id
     * @return boolean
     */
    public function approve_event($id) {
        try {
            if ($this->db->query("update events set status = 'approved' where id = '$id'")) {
                return TRUE;
            }
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    /***
     * update the selected event's status to rejected
     *
     * @param int $id
     * @return boolean
     */
    public function reject_event($id) {
        try {
            if ($this->db->query("update events set status = 'rejected' where id = '$id'")) {
                return TRUE;
            }
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    /***
     * get current month event details
     *
     * @param date $month
     * @return mixed resulting row or null value
     */
    public function get_monthly_events($month) {
        try {
            if ($data = $this->db->query("select * from `events` where DATE_FORMAT(start_date, '%m-%Y') = '$month' and status = 'approved'")) {
                $row = $data->result();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /***
     * get all completed event details
     *
     * @param date $today
     * @return mixed resulting set or null value
     */
    public function get_completed_events($today) {
        try {
            if ($data = $this->db->query("select * from `events` where end_date < '$today' and status = 'approved'")) {
                $row = $data->result();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /***
     * get all approved event details
     *
     * @return mixed resulting set or null value
     */
    public function get_all_events() {
        try {
            if ($data = $this->db->query("select * from `events` where status = 'approved'")) {
                $row = $data->result();
                return $row;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /***
     * this method is used to get all the event types that are currently using in school
     *
     * @return mixed resulting set or null value
     */
    public function get_event_types() {
        try {
            if ($data = $this->db->query("select * from event_type")) {
                $row = $data->result();
                return $row;
            }
        } catch (Exception $exc) {
            return null;
        }
    }

    /***
     * this is used to get selected teacher's nic no
     *
     * @param int $id
     * @return mixed resulting row or null value
     */
    public function validate_teacher_id($id) {
        try {
            if ($data = $this->db->query("select nic_no from teachers where nic_no = '$id'")) {
                return $data->row();
            } else {
                return NULL;
            }
        } catch (Exception $exc) {
            return NULL;
        }
    }

    /***
     * this method is used to delete event type
     *
     * @param int $id
     * @return boolean
     */
    public function delete_event_type($id) {
        try {
            if ($this->db->query("delete from event_type where id='$id'")) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    /***
     * this method is used to get selected event type details
     * @param int $id
     * @return mixed resulting set or null value
     */
    public function get_event_type_to_update($id) {
        try {
            if ($data = $this->db->query("select * from event_type where id = '$id'")) {
                $row = $data->row();
                return $row;
            }
        } catch (Exception $ex) {
            return NULL;
        }
    }

    /***
     * this method is used to update the event type details
     *
     * @param int $id
     * @param array $update_event_type contains event type details such as eventtype name , desciption
     * @return boolean
     */
    public function update_event_type($id, $update_event_type) {
        try{
            $this->db->where('id' , $id);
            $this->db->update('event_type' , $update_event_type);
            return TRUE;
        } catch (Exception $ex) {
            return FALSE;
        }

    }

    /***
     * get count of the upcoming events
     *
     * @param date $today
     * @return mixed count or null
     */
    public function get_count_upcoming_events($today) {
        try {
            if ($data = $this->db->query("select count(*) as count from `events` where start_date >= '$today' and status = 'approved'")) {
                $row = $data->row();
                return $row->count;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    /***
     * get the logged user's nic no
     *
     * @param int $user
     * @return mixed string or null
     */
    public function get_logged_user_nic($user) {
        try {
            $data=  $this->db->query("select nic_no from teachers where user_id='$user'");
            if($data->num_rows() > 0) {
                return $data->row()->nic_no;
            }
            else {
              return "Update Your Natinal Identity Card Number";
            }
        } catch (Exception $exc) {
            return NULL;
        }
    }

    /***
     * get the profile image of the given user
     *
     * @param string $nic
     * @return mixed string or resulting row
     */
    public function get_pro_image($nic){
        $data = $this->db->query("select * from teachers where nic_no = '$nic'");
        if($data->num_rows() > 0){
            return $data->row();
        }
        else{
            return "error";
        }
    }

    /***
     * select given user's all event details
     *
     * @param string $nic
     * @return mixed string or resulting row
     */
    public function get_user_all_events($nic) {
        $data = $this->db->query("select * from events where in_charge_id = '$nic'");
        if($data->num_rows() > 0){
            return $data->result();
        }
        else{
            return "no";
        }
    }

    /***
     * This method is used to get the pending, approved and rejected event details
     *
     * @return resulting set
     */
    public function get_running_events() {
        $data = $this->db->query("select * from events where status = 'rejected' or status = 'approved' or status = 'pending'");
        return $data->result();
    }

}
