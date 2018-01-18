<?php
/**
 * Ecole - Leave Controller
 *
 * Handles the Leave Methods
 *
 * @author  Sampath R.P.C.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class leave extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Leave_Model');
        $this->load->model('Year_Model');
        $this->load->model('Teacher_Model');
        $this->load->model('News_Model');
        $this->load->model('Email_Model');
        // $this->load->helper('sms_helper');
    }

    /**
     *  Index Method to View Leave Controller Pages
     *  This Function will help you to View Leave Functions
     */
    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $data['navbar'] = "leave";

        $data['page_title'] = "Leave Management";
        $data['first_name'] = $this->session->userdata('first_name');
        $userid = $this->session->userdata['id'];

        //Load form combo
        $data['leave_types'] = $this->Leave_Model->get_leave_types();

        //Getting Values from Leaves DB
        $data['casual_leaves'] = $this->Leave_Model->get_max_leave_count("Casual");
        $data['medical_leaves'] = $this->Leave_Model->get_max_leave_count("Medical");
        $data['duty_leaves'] = $this->Leave_Model->get_max_leave_count("Duty");
        $data['other_leaves'] = $this->Leave_Model->get_max_leave_count("Other");
        $data['maternity_leaves'] = $this->Leave_Model->get_max_leave_count("Maternity");

        //Getting List of Applied Leaves
        $data['applied_leaves'] = $this->Leave_Model->get_applied_leaves_list($userid);

        //Get Separate leaves count according to the type
        $data['applied_casual_leaves'] = $this->Leave_Model->get_no_leaves('1', $userid);
        $data['applied_medical_leaves'] = $this->Leave_Model->get_no_leaves('2', $userid);
        $data['applied_duty_leaves'] = $this->Leave_Model->get_no_leaves('3', $userid);
        $data['applied_other_leaves'] = $this->Leave_Model->get_no_leaves('4', $userid);
        $data['applied_maternity_leaves'] = $this->Leave_Model->get_no_leaves('5', $userid);

        //total leaves
        $data['total_leaves'] = $data['applied_casual_leaves'] + $data['applied_medical_leaves'] + $data['applied_duty_leaves'] +
         $data['applied_other_leaves'] + $data['applied_maternity_leaves'];

        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        //For Admin Views
        if ($data['user_type'] == 'A') {
            //Get Pending Leaves List
            $data['admin_pending_list'] = $this->Leave_Model->get_list_of_pending_leaves();
            $data['admin_pending_short_list'] = $this->Leave_Model->get_list_of_pending_short_leaves();

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/leave/admin_leave', $data);
            $this->load->view('/templates/footer');
        } elseif ($data['user_type'] == 'T') {


            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/leave/leave', $data);
            $this->load->view('/templates/footer');
        } else {
            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/leave/leave', $data);
            $this->load->view('/templates/footer');
        }
    }

    /**
     *  Function to Apply Leave
     *  This Function will help you to apply leaves on teacher side
     */
    public function apply_leave() {
        $data['navbar'] = "leave";

        //Basic data to be loaded
        $data['user_type'] = $this->session->userdata['user_type'];
        //Load form combo
        $data['leave_types'] = $this->Leave_Model->get_leave_types();
        date_default_timezone_set('Asia/Kolkata');
        $userid = $this->session->userdata['id'];

        //Getting Values from Leaves DB
        $data['casual_leaves'] = $this->Leave_Model->get_max_leave_count("Casual");
        $data['medical_leaves'] = $this->Leave_Model->get_max_leave_count("Medical");
        $data['duty_leaves'] = $this->Leave_Model->get_max_leave_count("Duty");
        $data['other_leaves'] = $this->Leave_Model->get_max_leave_count("Other");
        $data['maternity_leaves'] = $this->Leave_Model->get_max_leave_count("Maternity");

        //Getting List of Applied Leaves
        $data['applied_leaves'] = $this->Leave_Model->get_applied_leaves_list($this->session->userdata['id']);

        //Get Separate leaves count according to the type
        $data['applied_casual_leaves'] = $this->Leave_Model->get_no_leaves('1', $userid);
        $data['applied_medical_leaves'] = $this->Leave_Model->get_no_leaves('2', $userid);
        $data['applied_duty_leaves'] = $this->Leave_Model->get_no_leaves('3', $userid);
        $data['applied_other_leaves'] = $this->Leave_Model->get_no_leaves('4', $userid);
        $data['applied_maternity_leaves'] = $this->Leave_Model->get_no_leaves('5', $userid);

        //total leaves
        $data['total_leaves'] = $data['applied_casual_leaves'] + $data['applied_medical_leaves'] + $data['applied_duty_leaves'] + $data['applied_other_leaves'] + $data['applied_maternity_leaves'];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_reason', 'Reason', "required|xss_clean");
        $this->form_validation->set_rules('txt_startdate', 'Start Date', "required|xss_clean|is_unique[apply_leaves.start_date]|callback_check_date_for_current_year");
        $this->form_validation->set_rules('txt_enddate', 'End Date', "required|xss_clean|is_unique[apply_leaves.end_date]|callback_check_date_for_current_year");

        $data['page_title'] = "Leave Management";

        if ($this->form_validation->run() == FALSE) {

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/leave/leave', $data);
            $this->load->view('/templates/footer');
        } else {
            //Get Post Data
            $leavetype = $this->input->post('cmb_leavetype');
            $startdate = $this->input->post('txt_startdate');
            $enddate = $this->input->post('txt_enddate');
            $reason = $this->input->post('txt_reason');
            $applieddate = date("Y-m-d");
            $teacherid = $this->Leave_Model->get_teacher_id($userid);

            $noofdates = date_diff(date_create($startdate), date_create($enddate));
            $sdate = $noofdates->format("%a");

            $dateold = date_diff(date_create($applieddate), date_create($startdate));
            $dateoldc = $dateold->format("%R%a");

            //Get info from the Academic Year
            $academic_year = $this->Year_Model->get_academic_year_details();
            foreach ($academic_year as $row) {
                $year_structure = $row->structure;

                //Building the Array from the Database
                $string = $year_structure;
                $partial = explode(', ', $string);
                $final = array();
                array_walk($partial, function($val, $key) use(&$final) {
                    list($key, $value) = explode('=', $val);
                    $final[$key] = $value;
                });

                //Array customized with Year Planner
                $dataset = array();

                $enddate_var = $enddate;
                $enddate_var = date('Y-m-d', strtotime('-1 day', strtotime($enddate_var)));
                $days = date_diff(date_create($startdate), date_create($enddate_var));
                //No of days in between Term 1 start and end
                $t1days = $days->format("%a");
                $newdate = $startdate;

                //Iterating days of Start date to end date
                for ($i = 0; $i <= $t1days; $i++) {
                    //Iterating Year Structure
                    foreach ($final as $key => $value) {
                        if ($key == $newdate) {
                            $dataset[$newdate] = $value;
                        }
                    }
                    $newdate = strtotime($newdate);
                    $newdate = strtotime("+1 day", $newdate);
                    $newdate = date('Y-m-d', $newdate);
                }
            }

            //No of days for Medical and Casual
            $no_of_days_mc = 0;

            //Checking Leave type for Medical and Casual
            if ($leavetype == 1 || $leavetype == 2 || $leavetype == 3 || $leavetype == 4) {
                foreach ($dataset as $key => $value) {
                    if ($value == 0 || $value == 5) {
                        $no_of_days_mc++;
                    }
                }
            } else {
                $noofdates = date_diff(date_create($startdate), date_create($enddate_var));
                $sdate = $noofdates->format("%a");
                $no_of_days_mc = $sdate;
            }

            //validation for dates
            if ($sdate == '0') {
                $data['error_message'] = "Start date cannot be the End date of the leaves";
            } elseif ($dateoldc < 0) {
                $data['error_message'] = "Start Date cannot be a previous date";
            } elseif ($enddate < $startdate) {
                $data['error_message'] = "End Date cannot be a previous date";
            }
            elseif ($no_of_days_mc == 0) {
                $data['error_message'] = "No of days are 0. May be you applied a leave on School Holidays. Check with Year Plan";
            }
            //Commented because No need of validations
            // //bit buggy here
            // elseif($leavetype =='1' && $data['casual_leaves'] == $data['applied_casual_leaves']){
            //     $data['error_message'] = "No Casual leaves left to apply";
            // } elseif($leavetype =='2' && $data['medical_leaves'] == $data['applied_medical_leaves']){
            //     $data['error_message'] = "No Medical leaves left to apply";
            // }
            // //Need to apply some more logic here when it comes to maternity leaves. But not right now
            // elseif($leavetype =='5' && $data['maternity_leaves'] >= $data['applied_maternity_leaves']){
            //     $data['error_message'] = "No Maternity leaves left to apply";
            // }
            else {


                if ($this->Leave_Model->apply_for_leave($userid, $teacherid, $leavetype, $applieddate, $startdate, $enddate, $reason, $no_of_days_mc) == TRUE) {
                    $data['succ_message'] = "Leave Applied Successfully for " . $no_of_days_mc . " days";



                    // Send Email
                    $messagesubject = "Apply for Leave";
                    $messagestring = "You have requested leaves from <strong>". $startdate ."</strong> to <strong>". $enddate ."</strong> (". $no_of_days_mc ." days). You will receive the Leave Approval/Rejection Email once the Principal's action";
                 //   $this->Email_Model->send_basic_email($userid, $messagestring, $messagesubject);

                    //loading values again
                    //Getting Values from Leaves DB
                    $data['casual_leaves'] = $this->Leave_Model->get_max_leave_count("Casual");
                    $data['medical_leaves'] = $this->Leave_Model->get_max_leave_count("Medical");
                    $data['duty_leaves'] = $this->Leave_Model->get_max_leave_count("Duty");
                    $data['other_leaves'] = $this->Leave_Model->get_max_leave_count("Other");
                    $data['maternity_leaves'] = $this->Leave_Model->get_max_leave_count("Maternity");

                    //Getting List of Applied Leaves
                    $data['applied_leaves'] = $this->Leave_Model->get_applied_leaves_list($this->session->userdata['id']);

                    //Get Separate leaves count according to the type
                    $data['applied_casual_leaves'] = $this->Leave_Model->get_no_leaves('1', $userid);
                    $data['applied_medical_leaves'] = $this->Leave_Model->get_no_leaves('2', $userid);
                    $data['applied_duty_leaves'] = $this->Leave_Model->get_no_leaves('3', $userid);
                    $data['applied_other_leaves'] = $this->Leave_Model->get_no_leaves('4', $userid);
                    $data['applied_maternity_leaves'] = $this->Leave_Model->get_no_leaves('5', $userid);

                    //total leaves
                    $data['total_leaves'] = $data['applied_casual_leaves'] + $data['applied_medical_leaves'] + $data['applied_duty_leaves'] + $data['applied_other_leaves'] + $data['applied_maternity_leaves'];
                } else {
                    $data['error_message'] = "Failed to save data to the Database";
                }
            }


            //For news field
            $tech_id = $this->session->userdata('id');
            $tech_details = $this->Teacher_Model->user_details($tech_id);
            $this->News_Model->insert_action_details($tech_id, "Apply for leave", $tech_details->profile_img, $tech_details->first_name);
            //////
            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/leave/leave', $data);
            $this->load->view('/templates/footer');
        }
    }

    /**
     * Function to Get Leave Details
     *
     * @param  int
     *
     * @return Results
     */
    public function get_leave_details($id) {
        $data['navbar'] = "leave";

        $data['page_title'] = "Leave Details";
        $data['id'] = $id;

        $data['user_type'] = $this->session->userdata['user_type'];

        //Get Leave Details
        $data['leave_details'] = $this->Leave_Model->get_leave_details($id);

        //$userID = $this->$data['leave_details']->user_id;


        foreach($data['leave_details'] as $val){
           $userID = $val->user_id;
        }

        //Getting Values from Leaves DB
        $data['casual_leaves'] = $this->Leave_Model->get_max_leave_count("Casual");
        $data['medical_leaves'] = $this->Leave_Model->get_max_leave_count("Medical");
        $data['duty_leaves'] = $this->Leave_Model->get_max_leave_count("Duty");
        $data['other_leaves'] = $this->Leave_Model->get_max_leave_count("Other");
        $data['maternity_leaves'] = $this->Leave_Model->get_max_leave_count("Maternity");

        //Getting List of Applied Leaves
        $data['applied_leaves'] = $this->Leave_Model->get_applied_leaves_list($userID);

        //Get Separate leaves count according to the type
        $data['applied_casual_leaves'] = $this->Leave_Model->get_no_approve_leaves('1', $userID);
        $data['applied_medical_leaves'] = $this->Leave_Model->get_no_approve_leaves('2', $userID);
        $data['applied_duty_leaves'] = $this->Leave_Model->get_no_approve_leaves('3', $userID);
        $data['applied_other_leaves'] = $this->Leave_Model->get_no_approve_leaves('4', $userID);
        $data['applied_maternity_leaves'] = $this->Leave_Model->get_no_approve_leaves('5', $userID);

        //total leaves
        $data['total_leaves'] = $data['applied_casual_leaves'] + $data['applied_medical_leaves'] + $data['applied_duty_leaves'] + $data['applied_other_leaves'] + $data['applied_maternity_leaves'];

        //Passing it to the View
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('/leave/view_leave', $data);
        $this->load->view('/templates/footer');
    }

    /**
     * Function to Approve Leave
     *
     * @param  int
     *
     * @return Results
     */
    public function approve_leave($id) {


        $data['navbar'] = "leave";

        $data['page_title'] = "Leave Details";
        $data['id'] = $id;

        //Get Approve Leave Status
        $data['leave_approve_status'] = $this->Leave_Model->approve_leave($id);

        $data['user_type'] = $this->session->userdata['user_type'];

        if ($data['leave_approve_status'] == TRUE) {
            // Send Email
            $leave_details = $this->Leave_Model->get_leave_details($id);
            foreach ($leave_details as $row) {
                $userid = $row->user_id;
                $applydate = $row->applied_date;
                $startdate = $row->start_date;
                $enddate = $row->end_date;
                $no_of_days_mc = $row->no_of_days;
            }
            $messagesubject = "Leave Approval";
            $messagestring = "Your requested leaves on <strong>". $applydate ."</strong> from <strong>". $startdate ."</strong> to <strong>". $enddate ."</strong> (". $no_of_days_mc ." days) has been Approved by the Principal.";
          //  $this->Email_Model->send_basic_email($userid, $messagestring, $messagesubject);

            // Send SMS on Leave Approval
            $message = "Leave ". $applydate ." from ". $startdate ." to ". $enddate ." (". $no_of_days_mc ." days) has been Approved by the Principal.";
            $phone_number = $this->Leave_Model->get_teacher_phone($userid);
            // send_sms($phone_number, $message);

            redirect('leave/get_leave_details/'. $id . '?action=approve&status=true', 'refresh');
        } else {
            redirect('leave/get_leave_details/'. $id . '?action=approve&status=false', 'refresh');
        }
    }

    /**
     * Function to Approve Short Leave
     *
     * @param  int
     *
     * @return Results
     */
    public function approve_short_leave($id) {
        $data['navbar'] = "leave";

        $data['page_title'] = "Leave Details";
        $data['id'] = $id;

        //Get Approve Leave Status
        $data['leave_approve_status'] = $this->Leave_Model->approve_short_leave($id);

        $data['user_type'] = $this->session->userdata['user_type'];

        if ($data['leave_approve_status'] == TRUE) {
            redirect('leave/get_short_leave_details/'. $id . '?action=approve&status=true', 'refresh');
        } else {
            redirect('leave/get_short_leave_details/'. $id . '?action=approve&status=false', 'refresh');
        }
    }

    /**
     * Function to Reject Leave
     *
     * @param  int
     *
     * @return Results
     */
    public function reject_leave($id) {
        $data['navbar'] = "leave";

        $data['page_title'] = "Leave Details";
        $data['id'] = $id;

        $data['user_type'] = $this->session->userdata['user_type'];

        //Get Approve Leave Status
        $data['leave_approve_status'] = $this->Leave_Model->reject_leave($id);

        if ($data['leave_approve_status'] == TRUE) {
            // Send Email
            $leave_details = $this->Leave_Model->get_leave_details($id);
            foreach ($leave_details as $row) {
                $userid = $row->user_id;
                $applydate = $row->applied_date;
                $startdate = $row->start_date;
                $enddate = $row->end_date;
                $no_of_days_mc = $row->no_of_days;
            }
            $messagesubject = "Leave Rejection";
            $messagestring = "Your requested leaves on <strong>". $applydate ."</strong> from <strong>". $startdate ."</strong> to <strong>". $enddate ."</strong> (". $no_of_days_mc ." days) has been Rejected by the Principal.";
         //   $this->Email_Model->send_basic_email($userid, $messagestring, $messagesubject);

            // Send SMS on Leave Approval
            $message = "Leave ". $applydate ." from ". $startdate ." to ". $enddate ." (". $no_of_days_mc ." days) has been Rejected by the Principal.";
            $phone_number = $this->Leave_Model->get_teacher_phone($userid);
            // send_sms($phone_number, $message);

            redirect('leave/get_leave_details/'. $id . '?action=reject&status=true', 'refresh');
        } else {
            redirect('leave/get_leave_details/'. $id . '?action=reject&status=false', 'refresh');
        }
    }

    /**
     * Function to Reject Short Leave
     *
     * @param  int
     *
     * @return Results
     */
    public function reject_short_leave($id) {
        $data['navbar'] = "leave";

        $data['page_title'] = "Leave Details";
        $data['id'] = $id;

        $data['user_type'] = $this->session->userdata['user_type'];

        //Get Approve Leave Status
        $data['leave_approve_status'] = $this->Leave_Model->reject_short_leave($id);

        if ($data['leave_approve_status'] == TRUE) {
            redirect('leave/get_short_leave_details/'. $id . '?action=reject&status=true', 'refresh');
        } else {
            redirect('leave/get_short_leave_details/'. $id . '?action=reject&status=false', 'refresh');
        }
    }

    /**
     * Function to load All Views Page
     */
    public function get_all_leaves() {
        $data['navbar'] = "leave";

        //other
        $data['page_title'] = "All Leaves";

        $data['user_type'] = $this->session->userdata['user_type'];

        $data['teachers'] = $this->Leave_Model->get_teachers();

        $data['all_leaves'] = $this->Leave_Model->get_all_leaves();

        //Passing it to the View
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('/leave/all_leaves', $data);
        $this->load->view('/templates/footer');
    }

    /**
     * Function to load Leaves Report
     */
    public function leaves_report() {
        $data['navbar'] = "leave";

        //other
        $data['page_title'] = "Leaves Report";

        $data['user_type'] = $this->session->userdata['user_type'];

        //Values
        $startdate = $this->input->post('txt_startdate');
        $enddate = $this->input->post('txt_enddate');
        $userid = $this->input->post('cmb_status');

        $data['teachers'] = $this->Leave_Model->get_teachers();

        if (empty($startdate) || empty($enddate) || $userid == 0) {

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/leave/leaves_report', $data);
            $this->load->view('/templates/footer');
        } else {

            //Get all leaves in a period
            $data['applied_leaves'] = $this->Leave_Model->get_leaves_for_report($userid, $startdate, $enddate);

            $data['teacher_details'] = $this->Leave_Model->get_teacher_by_id($userid);

            if (empty($data['applied_leaves'])) {
                $var = TRUE;
            } else {
                //Setting Values
                $data['report_results'] = "Not Empty";
                $data['stdate'] = $startdate;
                $data['endate'] = $enddate;
                $data['uid'] = $userid;
            }

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/leave/leaves_report', $data);
            $this->load->view('/templates/footer');
        }
    }

    /**
     * Function to print Leave Reports
     */
    public function leaves_report_print() {
        $this->load->helper(array('dompdf', 'file'));

        //Get Form Data
        $startdate = $this->input->post('startdate');
        $enddate = $this->input->post('enddate');
        $userid = $this->input->post('userid');

        //echo $startdate;

        $data['applied_leaves'] = $this->Leave_Model->get_leaves_for_report($userid, $startdate, $enddate);
        $data['teacher_details'] = $this->Leave_Model->get_teacher_by_id($userid);
        $data['school_name'] = "D. S. Senanayake College";

        $filename = "Teacher_leave_report";
        $html = $this->load->view('leave/teacher_leave_pdf', $data, true);
        pdf_create($html, $filename);
    }

    /**
     * Function to view All Teachers Leave Report
     */
    public function all_teacher_leave() {
        $data['navbar'] = "leave";

        //other
        $data['page_title'] = "Apply Teacher Leave";

        $data['user_type'] = $this->session->userdata['user_type'];

        //Values
        $startdate = $this->input->post('txt_startdate');
        $enddate = $this->input->post('txt_enddate');
        $userid = $this->input->post('cmb_status');

        //Load form combo
        $data['leave_types'] = $this->Leave_Model->get_leave_types();
        //Load teachers
        $data['teachers'] = $this->Leave_Model->get_teachers();

        if (empty($startdate) || empty($enddate) || $userid == 0) {

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/leave/apply_teacher_leave', $data);
            $this->load->view('/templates/footer');
        } else {

            //Get all leaves in a period
            $data['applied_leaves'] = $this->Leave_Model->get_leaves_for_report($userid, $startdate, $enddate);

            $data['teacher_details'] = $this->Leave_Model->get_teacher_by_id($userid);

            if (empty($data['applied_leaves'])) {
                $var = TRUE;
            } else {
                //Setting Values
                $data['report_results'] = "Not Empty";
            }

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/leave/apply_teacher_leave', $data);
            $this->load->view('/templates/footer');
        }
    }

    /**
     * Function to apply for teacher leaves from admin side
     * Same as the Leave Function on apply_leave
     * If you are changing this Function make sure it tallies with apply_leave as well
     */
    public function apply_teacher_leave() {
        $data['navbar'] = "leave";

        //other
        $data['page_title'] = "Apply Teacher Leave";

        $data['user_type'] = $this->session->userdata['user_type'];

        //Load form combo
        $data['leave_types'] = $this->Leave_Model->get_leave_types();
        //Load teachers
        $data['teachers'] = $this->Leave_Model->get_teachers();


        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_reason', 'Reason', "required|xss_clean");
        $this->form_validation->set_rules('txt_startdate', 'Start Date', "required|xss_clean|callback_check_date_for_current_year");
        $this->form_validation->set_rules('txt_enddate', 'End Date', "required|xss_clean|callback_check_date_for_current_year");


        if ($this->form_validation->run() == FALSE) {
            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/leave/apply_teacher_leave', $data);
            $this->load->view('/templates/footer');
        } else {
            //Values
            $startdate = $this->input->post('txt_startdate');
            $enddate = $this->input->post('txt_enddate');
            $reason = $this->input->post('txt_reason');
            $leavetype = $this->input->post('cmb_leavetype');

            //Get teacher id
            $teacherid = $this->input->post('cmb_teacher');

            //Other essential data
            $applieddate = date("Y-m-d");
            $noofdates = date_diff(date_create($startdate), date_create($enddate));
            $sdate = $noofdates->format("%a");

            $dateold = date_diff(date_create($applieddate), date_create($startdate));
            $dateoldc = $dateold->format("%R%a");

            //checkin for combo boxes
            if ($teacherid == 0) {
                //Error Message
                $data['error_message'] = "Please Select a teacher";
            } elseif ($leavetype == 0) {
                //Error Message
                $data['error_message'] = "Please select a leave type";
            } //validation for dates
            elseif ($sdate == '0') {
                $data['error_message'] = "Start date cannot be the End date of the leaves";
            } elseif ($dateoldc < 0) {
                $data['error_message'] = "Start Date cannot be a previous date";
            } elseif ($enddate < $startdate) {
                $data['error_message'] = "End Date cannot be a previous date";
            } else {
                //get user id
                $userid = $this->Leave_Model->get_user_id($teacherid);

                //Get info from the Academic Year
                $academic_year = $this->Year_Model->get_academic_year_details();
                foreach ($academic_year as $row) {
                    $year_structure = $row->structure;

                    //Building the Array from the Database
                    $string = $year_structure;
                    $partial = explode(', ', $string);
                    $final = array();
                    array_walk($partial, function($val, $key) use(&$final) {
                        list($key, $value) = explode('=', $val);
                        $final[$key] = $value;
                    });

                    //Array customized with Year Planner
                    $dataset = array();

                    $enddate_var = $enddate;
                    $enddate_var = date('Y-m-d', strtotime('-1 day', strtotime($enddate_var)));
                    $days = date_diff(date_create($startdate), date_create($enddate_var));
                    //No of days in between Term 1 start and end
                    $t1days = $days->format("%a");
                    $newdate = $startdate;

                    //Iterating days of Start date to end date
                    for ($i = 0; $i <= $t1days; $i++) {
                        //Iterating Year Structure
                        foreach ($final as $key => $value) {
                            if ($key == $newdate) {
                                $dataset[$newdate] = $value;
                            }
                        }
                        $newdate = strtotime($newdate);
                        $newdate = strtotime("+1 day", $newdate);
                        $newdate = date('Y-m-d', $newdate);
                    }
                }

                //No of days for Medical and Casual
                $no_of_days_mc = 0;

                //Checking Leave type for Medical and Casual
                if ($leavetype == 1 || $leavetype == 2 || $leavetype == 3 || $leavetype == 4) {
                    foreach ($dataset as $key => $value) {
                        if ($value == 0 || $value == 5) {
                            $no_of_days_mc++;
                        }
                    }
                } else {
                    $noofdates = date_diff(date_create($startdate), date_create($enddate_var));
                    $sdate = $noofdates->format("%a");
                    $no_of_days_mc = $sdate;
                }
                if ($no_of_days_mc == 0) {
                    $data['error_message'] = "No of days are 0. May be you applied a leave on School Holidays. Check with Year Plan";
                } else{
                    if ($this->Leave_Model->apply_for_leave($userid, $teacherid, $leavetype, $applieddate, $startdate, $enddate,
                                                              $reason, $no_of_days_mc) == TRUE) {
                    $data['succ_message'] = "Leave Applied Successfully for " . $no_of_days_mc . " days";
                    } else {
                        $data['error_message'] = "Failed to save data to the Database";
                    }
                }
            }

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/leave/apply_teacher_leave', $data);
            $this->load->view('/templates/footer');
        }
    }

    /**
     * Function to load short leaves page
     */
    public function short_leave() {
        $data['navbar'] = "leave";

        //other
        $data['page_title'] = "Apply Teacher Leave";

        $data['user_type'] = $this->session->userdata['user_type'];
        $userid = $this->session->userdata['id'];
        //Load form combo
        $data['leave_types'] = $this->Leave_Model->get_short_leave_types();
        //Getting List of Applied Leaves
        $data['applied_leaves'] = $this->Leave_Model->get_applied_short_leaves_list($userid);
        $data['recent_applied_leaves'] = $this->Leave_Model->get_recent_applied_short_leaves_list($userid);

        //get current applied short leaves this month
        $data['short_leave_count'] = $this->Leave_Model->get_applied_short_leaves_count($userid);

        //Passing it to the View
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('/leave/short_leaves', $data);
        $this->load->view('/templates/footer');
    }

    /**
     * Function to apply short leaves and half days
     */
    public function apply_short_leave() {
        $data['navbar'] = "leave";

        //other
        $data['page_title'] = "Apply Teacher Leave";

        $data['user_type'] = $this->session->userdata['user_type'];
        $userid = $this->session->userdata['id'];
        //Load form combo
        $data['leave_types'] = $this->Leave_Model->get_short_leave_types();
        //Getting List of Applied Leaves
        $data['applied_leaves'] = $this->Leave_Model->get_applied_short_leaves_list($userid);
        $data['recent_applied_leaves'] = $this->Leave_Model->get_recent_applied_short_leaves_list($userid);

        //get current applied short leaves this month
        $data['short_leave_count'] = $this->Leave_Model->get_applied_short_leaves_count($userid);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_reason', 'Reason', "required|xss_clean");
        $this->form_validation->set_rules('txt_date', 'Date', "required|xss_clean|callback_check_date_validations");
        $this->form_validation->set_rules('cmb_leavetype', 'Leave Type', "required|xss_clean|callback_check_combo_box");

        if ($this->form_validation->run() == FALSE) {
            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/leave/short_leaves', $data);
            $this->load->view('/templates/footer');
        } else {
            //Values for DB
            $applieddate = date("Y-m-d");
            $date = $this->input->post('txt_date');
            $leavetype = $this->input->post('cmb_leavetype');
            $reason = $this->input->post('txt_reason');
            //Getting teacher id and user id
            $userid = $this->session->userdata['id'];
            $teacherid = $this->Leave_Model->get_teacher_id($userid);

            if ($leavetype == 1 && $data['short_leave_count'] >= 2) {
                //Apply a regular short leave
                $this->Leave_Model->apply_for_short_leave($userid, $teacherid, $leavetype, $applieddate, $date, $reason);
                //Apply a half day for the extra
                $reason = $reason . " | Half Day for extra short leaves";
                $this->Leave_Model->apply_for_halfday($userid, $teacherid, $applieddate, $date, $reason);

                //re call the data
                //Load form combo
                $data['leave_types'] = $this->Leave_Model->get_short_leave_types();
                //Getting List of Applied Leaves
                $data['applied_leaves'] = $this->Leave_Model->get_applied_short_leaves_list($userid);
                $data['recent_applied_leaves'] = $this->Leave_Model->get_recent_applied_short_leaves_list($userid);

                //get current applied short leaves this month
                $data['short_leave_count'] = $this->Leave_Model->get_applied_short_leaves_count($userid);

                $data['succ_message'] = "Short Leave Applied Successfully. It will mark as a Half day";
            } else {
                if ($leavetype == 2) {
                    $reason = $reason . " | Half Day";
                    if ($this->Leave_Model->apply_for_halfday($userid, $teacherid, $applieddate, $date, $reason) == TRUE) {
                        $data['succ_message'] = "Half Day Applied Successfully";

                        //Getting List of Applied Leaves
                        $data['applied_leaves'] = $this->Leave_Model->get_applied_short_leaves_list($userid);
                        $data['recent_applied_leaves'] = $this->Leave_Model->get_recent_applied_short_leaves_list($userid);
                    } else {
                        $data['error_message'] = "Failed to save data to the Database";
                    }
                } else {
                    if ($this->Leave_Model->apply_for_short_leave($userid, $teacherid, $leavetype, $applieddate, $date, $reason) == TRUE) {
                        $data['succ_message'] = "Short Leave Applied Successfully";

                        //Getting List of Applied Leaves
                        $data['applied_leaves'] = $this->Leave_Model->get_applied_short_leaves_list($userid);
                        $data['recent_applied_leaves'] = $this->Leave_Model->get_recent_applied_short_leaves_list($userid);
                    } else {
                        $data['error_message'] = "Failed to save data to the Database";
                    }
                }
            }

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/leave/short_leaves', $data);
            $this->load->view('/templates/footer');
        }
    }

    /**
     * Function to get short Leaves Details
     *
     * @param  int
     *
     * @return Results
     */
    public function get_short_leave_details($id) {
        $data['navbar'] = "leave";

        $data['page_title'] = "Short Leave Details";
        $data['id'] = $id;

        $data['user_type'] = $this->session->userdata['user_type'];

        //Get Leave Details
        $data['leave_details'] = $this->Leave_Model->get_short_leave_details($id);

        //Passing it to the View
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('/leave/view_short_leave', $data);
        $this->load->view('/templates/footer');
    }

    /**
     * Function to get short Leaves Details
     *
     * @param  date
     *
     * @return bool
     */
    function check_date_for_current_year($date) {
        $current_year = date('Y');
        $date = date_create($date);
        $year = $date->format("Y");
        if ($current_year != $year) {
            $this->form_validation->set_message('check_date_for_current_year', 'Select a Date from Current Year');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * Function to check status check
     *
     * @param  int
     *
     * @return bool
     */
    function check_combo_box($value) {
        if ($value == 0) {
            $this->form_validation->set_message('check_combo_box', 'Select a Leave Type');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * Function to validate a date
     *
     * @param  date
     *
     * @return bool
     */
    function check_date_validations($date) {
        //Other essential data
        $applieddate = date("Y-m-d");
        $dateold = date_diff(date_create($applieddate), date_create($date));
        $dateoldc = $dateold->format("%R%a");

        //Getting Year Plan Data
        //Get info from the Academic Year
        //Set conditon bool
        $aca_year_stat = FALSE;
        $academic_year = $this->Year_Model->get_academic_year_details();
        foreach ($academic_year as $row) {
            $year_structure = $row->structure;

            //Building the Array from the Database
            $string = $year_structure;
            $partial = explode(', ', $string);
            $final = array();
            array_walk($partial, function($val, $key) use(&$final) {
                list($key, $value) = explode('=', $val);
                $final[$key] = $value;
            });
        }

        if (isset($final[$date])) {
            if ($final[$date] == '0' || $final[$date] == '5') {
                $aca_year_stat = TRUE;
            }
        }

        if ($dateoldc < 0) {
            $this->form_validation->set_message('check_date_validations',
                                              'Date cannot be a previous date');
            return FALSE;
        } elseif ($aca_year_stat == FALSE) {
            $this->form_validation->set_message('check_date_validations',
                      'You cannot Apply Short Leaves on School Holidays');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function send_new_sms(){
        $this->load->helper('sms_helper');
        // var_dump(send_sms($phone_number, $message));
    }

}

/* Coded by Udara Karunarathna @P0dda */
/* Location: www.udara.info */
