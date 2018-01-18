<?php
/**
 * Ecole - Event Controller
 *
 * Responsibe for handling inputs
 *
 * @author V.I.Galhena
 */
class Event extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('teacher_model');
        $this->load->model('news_model');
        $this->load->model('user');
        $this->load->helper('date');
    }

    /***
    * Function name - index
    * Description - First run this index method. The session keeps track of whether the user logged in or not. If not, user has to login to the system.
    *               It riderects user to another method according to the user type.
    */
    function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $user_t = $this->session->userdata['user_type']; //get the user type from session
        $data['details'] = $this->event_model->get_event_details(); //get pending events from database
        $data['result'] = $this->event_model->get_event_type_details();
        $data['navbar'] = "event";
        if ($user_t == 'A') {
            $this->check_event_details(); //if user type is 'A', it will call this function
        } else {
            $this->create_event();
        }
    }

    /***
    * Function name - create_event
    * Description - This method is used to create a new event
    */

    function create_event() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $log_id = $this->session->userdata['id'];
        $data['nic'] = $this->event_model->get_logged_user_nic($log_id);
        date_default_timezone_set('Asia/Kolkata');
        $data['navbar'] = "event";
        $data['result'] = $this->event_model->get_event_type_details();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('event_name', 'event name', 'required'); //Validate fields
        $this->form_validation->set_rules('event_type', 'event type', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('start_date', 'start date', 'required|callback_check_event_start_date');
        $this->form_validation->set_rules('start_time', 'start time', 'required');
        $this->form_validation->set_rules('end_date', 'end date', 'required|callback_check_event_end_date');
        $this->form_validation->set_rules('end_time', 'end time', 'required');
        $this->form_validation->set_rules('in_charge', 'in charge', 'required|callback_check_incharge_id');
        $this->form_validation->set_rules('budget', 'budget', 'required|integer|greater_than[0]');
        $this->form_validation->set_rules('location', 'location', 'required');
        $this->form_validation->set_rules('guest', 'guest', '');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['details'] = $this->event_model->get_event_details();
            $data['page_title'] = "New Event";
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('event/create_sport_event', $data);
            $this->load->view('/templates/footer');
        } else {

            $data['succ_message'] = "Successfully created the event";

            $insert_event = array(
                'title' => $this->input->post('event_name'),
                'event_type' => $this->input->post('event_type'),
                'description' => $this->input->post('description'),
                'start_date' => $this->input->post('start_date'),
                'start_time' => $this->input->post('start_time'),
                'end_date' => $this->input->post('end_date'),
                'end_time' => $this->input->post('end_time'),
                'in_charge_id' => $this->input->post('in_charge'),
                'budget' => $this->input->post('budget'),
                'location' => $this->input->post('location'),
                'guest' => $this->input->post('guest'),
                'status' => 'pending'
            );

            if ($this->event_model->insert_sport_event($insert_event)) { // the information has therefore been successfully saved in the db
                //For news field
                $tech_id = $this->session->userdata('id');
                $tech_details = $this->teacher_model->user_details($tech_id);
                $this->news_model->insert_action_details($tech_id, "Create new event", $tech_details->profile_img, $tech_details->first_name);
                //////
                $data['details'] = $this->event_model->get_event_details();
                $data['page_title'] = "Create Sports Event";
                $data['navbar'] = "event";
                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('event/create_sport_event', $data);
                $this->load->view('/templates/footer');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        }
    }

    /***
    * Function name - update_event
    * Description - This method is used to update the data which is approved by the principle.
    */
    function update_event() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "event";
        date_default_timezone_set('Asia/Kolkata');

        $this->form_validation->set_rules('event_name', 'event name', 'required'); //Validate fields
        $this->form_validation->set_rules('event_type', 'event type', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('start_date', 'start date', 'required');
        $this->form_validation->set_rules('start_time', 'start time', 'required');
        $this->form_validation->set_rules('end_date', 'end date', 'required|callback_check_event_end_date');
        $this->form_validation->set_rules('end_time', 'end time', 'required');
        $this->form_validation->set_rules('budget', 'budget', 'required|integer|greater_than[0]');
        $this->form_validation->set_rules('location', 'location', 'required');
        $this->form_validation->set_rules('guest', 'guest', '');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        $event_id = $this->input->post('eid');
        if ($this->form_validation->run() == FALSE) {
            $data['result'] = $this->event_model->get_event_type_details();
            $data['details'] = $this->event_model->get_approved_event_details($event_id); //Get approved event details
            $data['page_title'] = "Update Event";
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('event/create_approved_sport_event', $data);
            $this->load->view('/templates/footer');
        } else {

            $update_event = array(
                'title' => $this->input->post('event_name'),
                'event_type' => $this->input->post('event_type'),
                'description' => $this->input->post('description'),
                'start_date' => $this->input->post('start_date'),
                'start_time' => $this->input->post('start_time'),
                'end_date' => $this->input->post('end_date'),
                'end_time' => $this->input->post('end_time'),
                'in_charge_id' => $this->input->post('in_charge'),
                'budget' => $this->input->post('budget'),
                'location' => $this->input->post('location'),
                'guest' => $this->input->post('guest')
            );

            if ($this->event_model->update_event($event_id, $update_event)) {

                //For news field
                $tech_id = $this->session->userdata('id');
                $tech_details = $this->teacher_model->user_details($tech_id);
                $this->news_model->insert_action_details($tech_id, "Published approved event", $tech_details->profile_img, $tech_details->first_name);
                //////
                $data['details'] = $this->event_model->get_all_events();
                $data['succ_message'] = "Successfully Updated!";
                $data['page_title'] = "Create Sports Event";
                $data['navbar'] = "event";
                $data['result'] = $this->event_model->get_event_type_details();
                $data['details'] = $this->event_model->get_approved_event_details($event_id);
                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('event/create_approved_sport_event', $data);
                $this->load->view('/templates/footer');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        }
    }

    /***
    * Function name - view_event_details
    * Description - View selected event details
    * @param - int $event_id
    */
    function view_event_details($event_id){
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        date_default_timezone_set('Asia/Kolkata');
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['valid_nic'] = $this->teacher_model->teacher_nic_from_user_id($this->session->userdata['id']);
        $data['details'] = $this->event_model->get_approved_event_details($event_id); //Get approved event details from the database
        $data['page_title'] = "Publish Event";
        $data['navbar'] = "event";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('event/view_event_details', $data);
        $this->load->view('/templates/footer');
    }

    /***
    * Function name - edit_approved_event
    * Description - This method is used to view the approved event details
    * @param - int $event_id
    */
    function edit_approved_event($event_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        date_default_timezone_set('Asia/Kolkata');
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['result'] = $this->event_model->get_event_type_details();
        $data['details'] = $this->event_model->get_approved_event_details($event_id); //Get approved event details from the database
        $data['page_title'] = "Publish Event";
        $data['navbar'] = "event";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('event/create_approved_sport_event', $data);
        $this->load->view('/templates/footer');
    }

    /***
    * Function name - create_event_type
    * Description - This method is used to create new event type
    */
    function create_event_type() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "event";
        date_default_timezone_set('Asia/Kolkata');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('event_type', 'event type', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['details'] = $this->event_model->get_event_type_details();
            $data['page_title'] = "Event Type";
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('event/add_new_event_type', $data);
            $this->load->view('/templates/footer');
        } else {

            $inert_event_type = array(
                'event_type' => $this->input->post('event_type'),
                'description' => $this->input->post('description')
            );

            if ($this->event_model->insert_new_event_type($inert_event_type)) {
                //For news field
                $tech_id = $this->session->userdata('id');
                $tech_details = $this->teacher_model->user_details($tech_id);
                $this->news_model->insert_action_details($tech_id, "Create new event type", $tech_details->profile_img, $tech_details->first_name);
                //////
                $data['details'] = $this->event_model->get_event_type_details();
                $data['succ_message'] = "Successfully created the event type";
                $data['page_title'] = "Event Type";
                $data['navbar'] = "event";
                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('event/add_new_event_type', $data);
                $this->load->view('/templates/footer');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        }
    }

    /***
    * Function name - view_event_type_details
    * Description - This method is used to view a particular event type details
    * @param - int $id
    */
    function view_event_type_details($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['details'] = $this->event_model->get_event_type_to_update($id);
        $data['page_title'] = "Event Type";
        $data['navbar'] = "event";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('event/update_event_type', $data);
        $this->load->view('/templates/footer');
    }

    /***
    * Function name - update_event_type
    * Description - This methos is used to update the event type
    * @param - int $id
    */
    function update_event_type($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "event";
        date_default_timezone_set('Asia/Kolkata');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('event_type', 'event type', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['details'] = $this->event_model->get_event_type_to_update($id);
            $data['page_title'] = "Event Type";
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('event/update_event_type', $data);
            $this->load->view('/templates/footer');
        } else {

            $update_event_type = array(
                'event_type' => $this->input->post('event_type'),
                'description' => $this->input->post('description')
            );

            if ($this->event_model->update_event_type($id, $update_event_type)) {
                //For news field
                $tech_id = $this->session->userdata('id');
                $tech_details = $this->teacher_model->user_details($tech_id);
                $this->news_model->insert_action_details($tech_id, "Update event type", $tech_details->profile_img, $tech_details->first_name);
                //////
                $data['details'] = $this->event_model->get_event_type_details();
                $data['succ_message'] = "Successfully created the event type";
                $data['page_title'] = "Create Event Type";
                $data['navbar'] = "event";
                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('event/add_new_event_type', $data);
                $this->load->view('/templates/footer');
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        }
    }

    /***
    * Function name - delete_event_type
    * Description - This method is used to delete a particular event type
    * @param - int $id
    */
    function delete_event_type($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        //For news field
        $tech_id = $this->session->userdata('id');
        $tech_details = $this->teacher_model->user_details($tech_id);
        $this->news_model->insert_action_details($tech_id, "Delete event type", $tech_details->profile_img, $tech_details->first_name);
        //////
        $this->event_model->delete_event_type($id);
        $err = 'Succesfully deleted';
        $this->session->set_flashdata('succ',$err);
        redirect('event/create_event_type');
    }

    /***
    * Function name - view_all_events
    * Description - This method is used to view all the events that are created by admin panel
    */
    function view_all_events() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['type'] = 1;
        $data['details'] = $this->event_model->get_all_events();
        $data['page_title'] = "All events";
        $data['navbar'] = "event";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('event/up_comming_events', $data);
        $this->load->view('/templates/footer');
    }

    /***
    * Function name - view_upcoming_events
    * Description - This method is used to view only the up comming events
    */
    function view_upcoming_events() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $today = date('Y-m-d');
        $data['type'] = 2;
        $data['details'] = $this->event_model->get_upcoming_events($today);
        $data['page_title'] = "Up coming events";
        $data['navbar'] = "event";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('event/up_comming_events', $data);
        $this->load->view('/templates/footer');
    }

    /***
    * Function name - view_monthly_events
    * Description - This method is used to view the monthly events
    */
    function view_monthly_events() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $month = date('m-Y');
        $data['type'] = 3;
        $data['details'] = $this->event_model->get_monthly_events($month);
        $data['page_title'] = "Monthly events";
        $data['navbar'] = "event";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('event/up_comming_events', $data);
        $this->load->view('/templates/footer');
    }

    /***
    * Function name - view_completed_events
    * Description - This method is used to view all the completed events
    */
    function view_completed_events() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $today = date('Y-m-d');
        $data['type'] = 4;
        $data['details'] = $this->event_model->get_completed_events($today);
        $data['page_title'] = "Complted events";
        $data['navbar'] = "event";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('event/up_comming_events', $data);
        $this->load->view('/templates/footer');
    }

    /***
    * Function name - view_completed_events
    * Description - This method is used to view details of the particular event
    * @param int $id
    */
    function view_upcoming_event_details($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['details'] = $this->event_model->get_upcoming_event_single_details($id);
        $data['page_title'] = "Up comming Details";
        $data['navbar'] = "event";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('event/view_events', $data);
        $this->load->view('/templates/footer');
    }

    /***
    * Function name - cancel_event
    * Description - This method is used to cancel an event by admin panel
    * @param int $id
    */
    function cancel_event($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        //For news field
        $tech_id = $this->session->userdata('id');
        $tech_details = $this->teacher_model->user_details($tech_id);
        $this->news_model->insert_action_details($tech_id, "Cancelled the event", $tech_details->profile_img, $tech_details->first_name);
        //////
        $data['user_type'] = $this->session->userdata['user_type'];
        $this->event_model->cancel_event($id);
        $data['details'] = $this->event_model->get_all_events();
        $data['page_title'] = "Up comming events";
        $data['navbar'] = "event";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('event/up_comming_events', $data);
        $this->load->view('/templates/footer');
    }

    /***
    * Function name - check_event_details
    * Description - This method is used to check the events to be approved or rejected and view cancelled events
    */
    function check_event_details() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['details'] = $this->event_model->get_pending_events_to_approve();
        $data['cancel'] = $this->event_model->get_canceled_events();
        $data['page_title'] = "Check Events";
        $data['navbar'] = "event";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('event/check_event_details', $data);
        $this->load->view('/templates/footer');
    }

    /***
    * Function name - load_selected_pending_event
    * Description - This method is used to view the details of the particular pennding event
    * @param int $id
    */
    function load_selected_pending_event($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['details'] = $this->event_model->load_pending_events($id);
        $data['page_title'] = "Pending event";
        $data['navbar'] = "event";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('event/select_event_action', $data);
        $this->load->view('/templates/footer');
    }

    /***
    * Function name - approve_event
    * Description - This method is used to approve the event
    * @param int $id
    */
    function approve_event($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        //For news field
        $tech_id = $this->session->userdata('id');
        $tech_details = $this->teacher_model->user_details($tech_id);
        $this->news_model->insert_action_details($tech_id, "Approved the event", $tech_details->profile_img, $tech_details->first_name);
        //////
        $data['succ_message'] = "Successfully completed";
        $data['user_type'] = $this->session->userdata['user_type'];
        $this->event_model->approve_event($id);
        $this->session->set_flashdata('succ' , 'Successfully approved the event');
        redirect('event/check_event_details');
    }

    /***
    * Function name - reject_event
    * Description - This method is used to reject the event
    */
    function reject_event($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        //For news field
        $tech_id = $this->session->userdata('id');
        $tech_details = $this->teacher_model->user_details($tech_id);
        $this->news_model->insert_action_details($tech_id, "Reject the event", $tech_details->profile_img, $tech_details->first_name);
        //////
        $data['user_type'] = $this->session->userdata['user_type'];
        $this->event_model->reject_event($id);
        $this->session->set_flashdata('succ' , 'Successfully rejected the event');
        redirect('event/check_event_details');
    }

    /***
    * Function name - event_calendar
    * Description - View the event calendar
    */
    function event_calendar(){
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $data['details'] = $this->event_model->get_running_events();
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['page_title'] = "Event Calendar";
        $data['navbar'] = "event";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('event/event_calendar', $data);
        $this->load->view('/templates/footer');
    }

    /***
    * Function name - teacher_event_details
    * Description - View given teacher's all event details
    */
    function teacher_event_details(){
        $nic = $this->uri->segment(3);
        $data['details'] = $this->event_model->get_pro_image($nic);
        $data['events'] = $this->event_model->get_user_all_events($nic) ;
        $this->load->view('event/teacher_event_details',$data);
    }

    /***
    * Function name - check_event_start_date
    * Description - This method is a validation method which validate event start date
    * @param date $field
    * @return boolean
    */
    function check_event_start_date($field) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $datestring = "%Y-%m-%d";
        $time = time();
        $today = mdate($datestring, $time);
        if ($today > $field) {
            $this->form_validation->set_message('check_event_start_date', 'Please Enter Valid Date!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /***
    * Function name - check_event_end_date
    * Description - This method is a validation method which validate event start date
    * @param date $field
    * @return boolean
    */
    function check_event_end_date($field) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $start_date = $this->input->post('start_date');
        if ($start_date > $field) {
            $this->form_validation->set_message('check_event_end_date', 'Please Enter Valid Date!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /***
    * Function name - check_incharge_id
    * Description - Check whether the given in charge id is a valid id or not
    * @param date $field
    * @return boolean
    */
    function check_incharge_id($field) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $val = $this->event_model->validate_teacher_id($field);
        if ($val == NULL) {
            $this->form_validation->set_message('check_incharge_id', 'Please Enter Valid ID!');
            return FALSE;
        } else {
            $this->form_validation->set_message('check_incharge_id', 'Your ID!' . " " . $field);
            return TRUE;
        }
    }

}
