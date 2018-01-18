<?php
/**
 * Ecole - Dashboard Controller
 *
 * Handles the Dashboard Methods
 *
 */
class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        //Load Models
        $this->load->model('Leave_Model');
        $this->load->model('event_model');
        $this->load->model('news_model');
        $this->load->model('messages_model');
        $this->load->model('class_model');
    }

    /*
     * Main function that loads classes
     */
    function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $today = date('Y-m-d');
        $data['count'] = $this->event_model->get_upcoming_events($today);
        $data['news'] = $this->news_model->get_all_news_details();
        $data['activity'] = $this->news_model->get_news_details();
        $data['events'] = $this->event_model->get_count_upcoming_events($today);
        $data['navbar'] = "dashboard";

        //Stats on Dashboard
        // $data['leaves'] = $this->Leave_Model->get_count_of_pending_leaves();
        $today = date('Y-m-d');
        //$data['events'] = $this->event_model->get_count_upcoming_events($today);
        $data['eventslist'] = $this->event_model->get_upcoming_events($today);
        // Messages Count
        $data['messagecount'] = $this->messages_model->get_unread_count($this->session->userdata['id']);
        // Leaves Count
        $data['leavescount'] = $this->Leave_Model->get_count_of_pending_leaves();
        // Students Without Class
        $data['students_without_class'] = $this->class_model->get_students_without_class();

        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['page_title'] = 'Dashboard';
        $data['first_name'] = $this->session->userdata('first_name');
        $data['details'] = $this->event_model->get_running_events();
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        if($this->session->userdata['user_type'] == 'A'){
            $this->load->view('dashboard_admin');
        }
        elseif($this->session->userdata['user_type'] == 'V'){
            $this->load->view('dashboard_admin');
        }
        elseif($this->session->userdata['user_type'] == 'T'){
            $this->load->view('dashboard_teacher');
        }
        elseif($this->session->userdata['user_type'] == 'C'){
            $this->load->view('dashboard_clstaff');
        }else{
            $this->load->view('dashboard_student');
        }
        $this->load->view('templates/footer');
    }

    /*
     * Logout Function
     */
    function logout() {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

    /*
     * Get News Function
     */
    function get_news(){
        $data['news'] = $this->news_model->get_all_news_details();
        $this->load->view('dashboard_news_form',$data);
}

}
