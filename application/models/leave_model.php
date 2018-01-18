<?php
/**
 * Ecole - Leave Model
 *
 * Handles the Leave Model Functions
 *
 * @author  Sampath R.P.C.
 */
class Leave_Model extends CI_Model {

	public function __construct() {
			$this->load->database();
	}

    /*
     * Function to get All Leave Types
     *
     * @return mixed bool or Results
     */
    public function get_leave_types(){
        try{
            $this->db->select('*');
            $query = $this->db->get('leave_types');
            return $query->result();
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
     * Function to get applied leaves list
     *
     * @param  int user_id
     *
     * @return mixed bool or Results
     */
    public function get_applied_leaves_list($uid){
        try{
            $query = $this->db->query("SELECT lt.name,al.applied_date,al.start_date,al.end_date,al.no_of_days,ls.status FROM apply_leaves al,leave_types lt,leave_status ls where (al.leave_type_id  = lt.id) AND al.leave_status = ls.id AND al.user_id='$uid' AND (YEAR(CURDATE())=YEAR(al.start_date)) ORDER BY al.applied_date desc LIMIT 10");
           // $query = $this->db->query("SELECT lt.name,al.applied_date,al.start_date,al.end_date,al.no_of_days,al.leave_status FROM apply_leaves al,leave_types lt where (al.id = lt.id)");
            return $query->result();
        } catch(Exception $ex) {
            return FALSE;
        }
    }

	/*
     * Function to get max leave count for each leave type
     *
     * @param  string name
     *
     * @return mixed bool or Results
     */
	public function get_max_leave_count($name){
		try {
            $this->db->select('max_leave_count');
            $this->db->where('name', $name);
            $query = $this->db->get('leave_types');
            $row = $query->row();
            return $row->max_leave_count;

		} catch (Exception $ex) {
			return FALSE;
		}
	}

    /*
     * Function to get max leave count
     *
     * @param  int leave_type
     * @param  int user_id
     *
     * @return mixed bool or Results
     */
    public function get_no_leaves($leave_type, $uid){
        if( $leave_type == '1' ){
            try {
                //Normal Casual Leaves
                $query = $this->db->query("SELECT sum(no_of_days) as days FROM apply_leaves al
								 														WHERE user_id = '$uid' AND (YEAR(CURDATE())=YEAR(al.start_date))
																						 AND leave_type_id = '$leave_type'  AND al.is_half_day = 0
																						 AND (leave_status = '1' OR leave_status='0')");
                $row = $query->row();
                $normal_days = $row->days;
                //Normal Halfdays
                $query = $this->db->query("SELECT sum(no_of_days) as days FROM apply_leaves al WHERE user_id = '$uid'
								 														AND (YEAR(CURDATE())=YEAR(al.start_date)) AND leave_type_id = '$leave_type'
																						AND al.is_half_day = 1 AND (leave_status = '1' OR leave_status='0')");
                $row = $query->row();
                $half_days = ($row->days)/2;

                return $half_days+$normal_days;

            } catch (Exception $e) {
                return FALSE;
            }
        } else {
            try {
                $query = $this->db->query("SELECT sum(no_of_days) as days FROM apply_leaves al WHERE user_id = '$uid' AND (YEAR(CURDATE())=YEAR(al.start_date)) AND leave_type_id = '$leave_type' AND (leave_status = '1' OR leave_status='0')");
                $row = $query->row();
                return $row->days;

            } catch (Exception $e) {
                return FALSE;
            }
        }

    }

		/*
		 * Function to get max leave count
		 *
		 * @param  int leave_type
		 * @param  int user_id
		 *
		 * @return mixed bool or Results
		 */
		public function get_no_approve_leaves($leave_type, $uid){
				if( $leave_type == '1' ){
						try {
								//Normal Casual Leaves
								$query = $this->db->query("SELECT sum(no_of_days) as days FROM apply_leaves al
																						WHERE user_id = '$uid' AND (YEAR(CURDATE())=YEAR(al.start_date))
																						AND leave_type_id = '$leave_type'  AND al.is_half_day = 0 AND leave_status = '1'");
								$row = $query->row();
								$normal_days = $row->days;
								//Normal Halfdays
								$query = $this->db->query("SELECT sum(no_of_days) as days FROM apply_leaves al
																						WHERE user_id = '$uid' AND (YEAR(CURDATE())=YEAR(al.start_date))
																						 AND leave_type_id = '$leave_type'  AND al.is_half_day = 1 AND leave_status = '1'");
								$row = $query->row();
								$half_days = ($row->days)/2;

								return $half_days+$normal_days;

						} catch (Exception $e) {
								return FALSE;
						}
				} else {
						try {
								$query = $this->db->query("SELECT sum(no_of_days) as days FROM apply_leaves al WHERE user_id = '$uid' AND (YEAR(CURDATE())=YEAR(al.start_date)) AND leave_type_id = '$leave_type' AND leave_status = '1'");
								$row = $query->row();
								return $row->days;

						} catch (Exception $e) {
								return FALSE;
						}
				}

		}

    /*
     * Function to get teacher id by user_id
     *
     * @param  int user_id
     *
     * @return mixed bool or Results
     */
    function get_teacher_id($uid){
        try{
            $this->db->select('id');
            $this->db->where('user_id', $uid);
            $query = $this->db->get('teachers');
            $row = $query->row();
            return $row->id;
        } catch (Exception $ex) {
            return FALSE;
        }
    }

	/*
     * Function to apply for leave
     *
     * @param  int user_id
     * @param  int teacher_id
     * @param  int leave_type_id
     * @param  date applied_date
     * @param  date start_date
     * @param  date end_date
     * @param  string reason
     * @param  int no_of_days
     *
     * @return mixed bool or Results
     */
	public function apply_for_leave($user_id, $teacher_id, $leave_type_id, $applied_date, $start_date, $end_date, $reason, $no_of_days){
		try {
    		if($this->db->query("INSERT INTO apply_leaves (`id`, `user_id`, `teacher_id`, `leave_type_id`, `is_half_day`, `applied_date`,
				 																	`start_date`, `end_date`, `reason`, `leave_status`, `remarks`, `no_of_days`)
                VALUES (NULL ,'$user_id', '$teacher_id', '$leave_type_id','0' ,'$applied_date', '$start_date', '$end_date', '$reason','0',
												NULL ,'$no_of_days');")) {
    			return TRUE;
    		} else {
    			return FALSE;
    		}
    	} catch(Exception $ex) {
    		return FALSE;
    	}
	}

    /*
     * Function to apply half day
     *
     * @param  int user_id
     * @param  int teacher_id
     * @param  date applied_date
     * @param  date start_date
     * @param  string reason
     *
     * @return mixed bool or Results
     */
    public function apply_for_halfday($user_id, $teacher_id, $applied_date, $start_date, $reason){
        try {
            if($this->db->query("INSERT INTO apply_leaves (`id`, `user_id`, `teacher_id`, `leave_type_id`, `is_half_day`, `applied_date`, `start_date`, `end_date`, `reason`, `leave_status`, `remarks`, `no_of_days`)
                VALUES (NULL ,'$user_id', '$teacher_id', '1','1' ,'$applied_date', '$start_date', '$start_date', '$reason','0',NULL ,'1');")) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to get the Pending Leaves Lists
    *
    * @return mixed bool or Results
    */
    public function get_list_of_pending_leaves(){
        try {
            $query = $this->db->query("SELECT t.full_name, al.id, al.user_id,al.leave_type_id,al.applied_date,al.start_date,al.end_date,al.reason FROM apply_leaves al,teachers t WHERE al.user_id = t.user_id AND al.leave_status = '0' ORDER BY al.applied_date desc");
            return $query->result();

        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to get the leave details
    *
    * @param  int id
    *
    * @return mixed bool or Results
    */
    public function get_leave_details($id){
        try {
            $query = $this->db->query("SELECT t.full_name, al.id, al.user_id,lt.name,al.applied_date,al.start_date,al.end_date,
							al.reason,al.no_of_days,ls.status FROM apply_leaves al,teachers t, leave_types lt, leave_status ls
							 WHERE al.leave_status=ls.id AND al.id = '$id' AND al.user_id = t.user_id AND lt.id = al.leave_type_id");
            return $query->result();

        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to approve a leave
    *
    * @param  int id
    *
    * @return bool
    */
    public function approve_leave($id){
        try {
            if($this->db->query("UPDATE apply_leaves SET leave_status='1',remarks='Leave Approved' WHERE id = '$id'")){
                return TRUE;
            } else{
                return FALSE;
            }
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to approve a short leave
    *
    * @param  int id
    *
    * @return bool
    */
    public function approve_short_leave($id){
        try {
            if($this->db->query("UPDATE apply_short_leaves SET status='1',remarks='Short Leave Approved' WHERE id = '$id'")){
                return TRUE;
            } else{
                return FALSE;
            }
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to approve a leave
    *
    * @param  int id
    *
    * @return bool
    */
    public function reject_leave($id){
        try {
            if($this->db->query("UPDATE apply_leaves SET leave_status='2',remarks='Leave Reject' WHERE id = '$id'")){
                return TRUE;
            } else{
                return FALSE;
            }
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to reject a short leave
    *
    * @param  int id
    *
    * @return bool
    */
    public function reject_short_leave($id){
        try {
            if($this->db->query("UPDATE apply_short_leaves SET status='2',remarks='Short Leave Reject' WHERE id = '$id'")){
                return TRUE;
            } else{
                return FALSE;
            }
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to get All Leaves
    *
    * @return mixed bool or Results
    */
    public function get_all_leaves(){
        try{
            $query = $this->db->query("SELECT al.id,t.full_name,lt.name,al.applied_date,al.start_date,al.end_date,al.reason,al.no_of_days,ls.status FROM apply_leaves al,leave_status ls,teachers t,leave_types lt WHERE al.leave_status = ls.id AND t.id = al.teacher_id AND lt.id = al.leave_type_id ORDER by al.applied_date desc");
            return $query->result();
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to reject a short leave
    *
    * @param  int uid
    * @param  date startdate
    * @param  date enddate
    *
    * @return bool
    */
    public function get_leaves_for_report($uid, $startdate, $enddate){
        try{
            $query = $this->db->query("SELECT lt.name,al.applied_date,al.start_date,al.end_date,al.no_of_days,ls.status FROM apply_leaves al,leave_types lt,leave_status ls where (al.leave_type_id  = lt.id) AND al.leave_status = ls.id AND al.user_id='$uid' AND (al.applied_date BETWEEN '$startdate' and '$enddate') ORDER BY al.applied_date desc");
                return $query->result();
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to get All teachers list
    *
    * @return mixed bool or Results
    */
    public function get_teachers(){
        try{
            $this->db->select('*');
            $query = $this->db->get('teachers');
            return $query->result();
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to get a teacher by id
    *
    * @param  int id
    *
    * @return mixed bool or Results
    */
    public function get_teacher_by_id($id){
        try{
            $this->db->select('*');
            $this->db->where('user_id', $id);
            $query = $this->db->get('teachers');
            return $query->result();
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to get user id by teacher id
    *
    * @param  int tid
    *
    * @return mixed bool or Results
    */
    function get_user_id($tid){
        try{
            $this->db->select('user_id');
            $this->db->where('id', $tid);
            $query = $this->db->get('teachers');
            $row = $query->row();
            return $row->user_id;
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to get short leaves types
    *
    * @return mixed bool or Results
    */
    public function get_short_leave_types(){
        try{
            $this->db->select('*');
            $query = $this->db->get('short_leave_types');
            return $query->result();
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to apply for short leaves
    *
    * @param  int user_id
    * @param  int teacher_id
    * @param  int leave_type_id
    * @param  date applied_date
    * @param  date date
    * @param  string reason
    *
    * @return mixed bool or Results
    */
    public function apply_for_short_leave($user_id, $teacher_id, $leave_type_id, $applied_date, $date, $reason){
        try {
            if($this->db->query("INSERT INTO apply_short_leaves (`id`, `user_id`, `teacher_id`, `leave_Type`, `applied_date`, `date`, `reason`, `status`, `remarks`)
                VALUES (NULL ,'$user_id', '$teacher_id', '$leave_type_id','$applied_date', '$date', '$reason','0','' );")) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to get applied short leaves list for the current month
    *
    * @param  int uid
    *
    * @return mixed bool or Results
    */
    public function get_applied_short_leaves_list($uid){
        try{
            $query = $this->db->query("SELECT lt.name,al.applied_date,al.date,al.reason,ls.status
							 													FROM apply_short_leaves al,short_leave_types lt,leave_status ls
																				 where (al.leave_Type  = lt.id) AND al.status = ls.id AND al.user_id='$uid'
																				  AND ( al.leave_Type = '1' ) AND (MONTH(CURDATE())=MONTH(al.date))");
            return $query->result();
        } catch(Exception $ex) {
            return FALSE;
        }
    }

     /*
    * Function to get recent applied short leaves list
    *
    * @param  int uid
    *
    * @return mixed bool or Results
    */
    public function get_recent_applied_short_leaves_list($uid){
        try{
            $query = $this->db->query("SELECT lt.name,al.applied_date,al.date,al.reason,ls.status
																			FROM apply_short_leaves al,short_leave_types lt,leave_status ls
																			where (al.leave_Type  = lt.id) AND al.status = ls.id AND al.user_id='$uid'
																			ORDER BY al.applied_date desc LIMIT 10");
            return $query->result();
        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to get applied short leaves count of the current month
    *
    * @param  int uid
    *
    * @return mixed bool or Results
    */
    public function get_applied_short_leaves_count($uid){
        try{
            $query = $this->db->query("SELECT COUNT(*) as count FROM apply_short_leaves al,short_leave_types lt,leave_status ls
						 														where (al.leave_Type  = lt.id) AND ( al.status = 0 OR al.status = 1 )
																				 AND al.status = ls.id AND al.user_id='$uid' AND ( al.leave_Type = '1' )
																				 AND (MONTH(CURDATE())=MONTH(al.date))");
            $row = $query->row();
            return $row->count;
        } catch(Exception $ex) {
            return FALSE;
        }
    }

     /*
    * Function to get pending short leaves
    *
    * @return mixed bool or Results
    */
    public function get_list_of_pending_short_leaves(){
        try {
            $query = $this->db->query("SELECT t.full_name, al.id, al.user_id,al.applied_date,al.date,al.reason FROM apply_short_leaves al,teachers t WHERE al.user_id = t.user_id AND al.status = '0' ORDER BY al.applied_date desc");
            return $query->result();

        } catch(Exception $ex) {
            return FALSE;
        }
    }

     /*
    * Function to get short leaves details
    *
    * @param  int id
    *
    * @return mixed bool or Results
    */
    public function get_short_leave_details($id){
        try {
            $query = $this->db->query("SELECT t.full_name, al.id, al.user_id,lt.name,al.applied_date,al.date,al.reason,ls.status FROM apply_short_leaves al,teachers t, leave_types lt, leave_status ls WHERE al.status=ls.id AND al.id = '$id' AND al.user_id = t.user_id AND lt.id = al.leave_Type");
            return $query->result();

        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to get count of pending leaves
    *
    * @return mixed bool or Results
    */
    public function get_count_of_pending_leaves(){
        try {
            $query = $this->db->query("SELECT COUNT(*) as count FROM apply_leaves al WHERE al.leave_status = '0'");
            $row = $query->row();
            return $row->count;

        } catch(Exception $ex) {
            return FALSE;
        }
    }

    /*
    * Function to get telephone number by user id
    *
    * @return mixed bool or Results
    */
    public function get_teacher_phone($tid){
        try {
            $query = $this->db->query("SELECT contact_mobile FROM teachers t WHERE t.user_id = '$tid'");
            $row = $query->row();
            return $row->contact_mobile;

        } catch(Exception $ex) {
            return FALSE;
        }
    }

}
?>
