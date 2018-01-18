<?php
/**
 * Ecole - Timetable Controller
 *
 * Controller to create and manage timetables
 *
 * @author  H.S Anuradha
 */

class Timetable extends CI_Controller {

    /**
     * Class constructor
     */
    function __construct() {
        parent::__construct();
        $this->load->model('class_model');
        $this->load->model('timetable_model');
        $this->load->model('teacher_model');
        $this->load->model('news_model');
        $this->load->library('form_validation');
    }

    /**<input type="text" name="username" id="username" class="form-control" value="" >
     * Main interface for timetable management
     */
    function index() {
        $data['page_title'] = "Timetable Management";
        $data['navbar'] = "timetable";
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['timetable_list'] = $this->timetable_model->get_timetable_list();


        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('timetable/index', $data);
        $this->load->view('/templates/footer');
        $this->load->library('calendar');
    }

    /**
     * Interface to create timetable
     */
    function create() {
        $data['page_title'] = "Create Timetable";
        $data['navbar'] = "timetable";
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['class_list'] = $this->class_model->get_class_list();
        $this->form_validation->set_rules("year", " Year", "required|integer|callback_check_year");
        $this->form_validation->set_rules("class", " Class", "required|callback_class_selected");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('timetable/create_timetable_form', $data);
            $this->load->view('/templates/footer');
        } else {
            $data['class_id'] = $this->input->post('class');
            $data['year'] = $this->input->post('year');
            $data['class_name'] = $this->class_model->get_class_name($data['class_id']);
            $data['timetable_id'] = $this->timetable_model->create_class_timetable($data['class_id'], $data['year']);
            //For news field
            $tech_id = $this->session->userdata('id');
            $tech_details = $this->teacher_model->user_details($tech_id);
            $this->news_model->insert_action_details($tech_id, "Create new time table", $tech_details->profile_img, $tech_details->first_name);

            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('timetable/timetable', $data);
            $this->load->view('/templates/footer');
        }
    }

 public function teacher_create_timetable(){
         $data['page_title'] = "Create Timetable";
        $data['navbar'] = "timetable";
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['class_list'] = $this->class_model->get_class_list();
        $this->form_validation->set_rules("year", " Year", "required|integer|callback_check_year");
        $this->form_validation->set_rules("class", " Class", "required|callback_class_selected");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('timetable/create_timetable_teacher', $data);
            $this->load->view('/templates/footer');
        } else {
            $data['class_id'] = $this->input->post('class');
            $data['year'] = $this->input->post('year');
            $data['class_name'] = $this->class_model->get_class_name($data['class_id']);
            $data['timetable_id'] = $this->timetable_model->create_class_timetable($data['class_id'], $data['year']);
            //For news field
            $tech_id = $this->session->userdata('id');
            $tech_details = $this->teacher_model->user_details($tech_id);
            $this->news_model->insert_action_details($tech_id, "Create new time table", $tech_details->profile_img, $tech_details->first_name);

            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('timetable/timetable', $data);
            $this->load->view('/templates/footer');
        }
 }

    /*
     * Interface to filter timetable list by year
     */
    function search_by_year() {

        $data['page_title'] = "Timetable Management";
        $data['navbar'] = 'timetable';
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $keyword = $this->input->post('year');
        $data['timetable_list'] = $this->timetable_model->search_by_year($keyword);

        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('timetable/index', $data);
        $this->load->view('/templates/footer');
    }

     /**
     * Interface to filter timetable list by class
     */
    function search_by_class() {
        $data['page_title'] = "Timetable Management";
        $data['navbar'] = 'timetable';
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $keyword = $this->input->post('class');
        $class_id = $this->class_model->get_class_id($keyword);

        $data['timetable_list'] = $this->timetable_model->search_by_class($class_id);

        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('timetable/index', $data);
        $this->load->view('/templates/footer');
    }

    /**
     * Interface to view a particular timetable
     * @param int $timetable_id ID of the timetable
     */
    function open($timetable_id) {
        $data['page_title'] = "Timetable: $timetable_id";
        $data['navbar'] = "timetable";
        $data['timetable_id'] = $timetable_id;
        $data['user_type'] = $this->session->userdata['user_type'];

        $timetable = $this->timetable_model->get_class_timetable($timetable_id);

        $data['year'] = $timetable->year;
        $data['class_name'] = $this->class_model->get_class_name($timetable->class_id);

        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('timetable/timetable', $data);
        $this->load->view('/templates/footer');
    }

    /**
     * Acts as a validation method to timetable creation to check the year is in
     * valid range and check there's no timetable already for the given year given class
     * @return bool
     */
    function check_year() {
        $year = $this->input->post('year');
        $class_id = $this->input->post('class');
        if ($year < 1990 OR $year > 2099) {
            $this->form_validation->set_message('check_year', "year must be greater than 1990 and less that 2099");
            return FALSE;
        } else if ($this->timetable_model->timetable_already_have($class_id, $year)) {
            $class_name = $this->class_model->get_class_name($class_id);
            $this->form_validation->set_message('check_year', "there's timetable created for the class: <strong>$class_name</strong>");
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Acts as a validation method to timetable creation.
     * Will check if the class is selected.
     * @return bool
     */
    function class_selected() {
        $class = $this->input->post('class');
        if ($class == 0) {
            $this->form_validation->set_message('class_selected', "Please select a class");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * Acts as a validation method to timetable creation.
     * Will check if the teacher is selected.
     * @return bool
     */
    function teacher_selected() {
        $teacher = $this->input->post('teacher');
        if ($teacher == 0) {
            $this->form_validation->set_message('teacher_selected', "Please select a teacher");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * Acts as a validation method to timetable creation.
     * Will check if the subject is selected.
     * @return bool
     */
    function subject_selected() {
        $subject = $this->input->post('subject');
        if ($subject == 0) {
            $this->form_validation->set_message('subject_selected', "Please select a subject");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * Interface to delete a particular timetable
     * @param type $timetable_id
     */
    function delete($timetable_id) {

        $data['page_title'] = "Test Timetable";
        $data['navbar'] = "timetable";
        $data['user_type'] = $this->session->userdata['user_type'];

        if ($this->timetable_model->delete($timetable_id)) {
            $data['delete_msg'] = "Timetable ID: {$timetable_id} is successfully deleted.";
            $data['timetable_list'] = $this->timetable_model->get_timetable_list();

            $this->timetable_model->delete_slots($timetable_id);
            //For news field
            $tech_id = $this->session->userdata('id');
            $tech_details = $this->teacher_model->user_details($tech_id);
            $this->news_model->insert_action_details($tech_id, "Delete the time table", $tech_details->profile_img, $tech_details->first_name);
            //////
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('timetable/index', $data);
            $this->load->view('/templates/footer');
        }
    }

    /**
     * Test Method for Dev Purposes
     */
    function test() {

        $data['page_title'] = "Test Timetable";
        $data['navbar'] = "timetable";
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('timetable/timetable', $data);
        $this->load->view('/templates/footer');
    }

    /**
     * Method used to add timetable slot
     *
     * @param int $timetable_id
     * @param string $slot_id
     */
    function add_slot($timetable_id, $slot_id) {
        $data['page_title'] = "Test Timetable";
        $data['navbar'] = "timetable";
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['timetable'] = $this->timetable_model->get_class_timetable($timetable_id);
        $data['slot_id'] = $slot_id;
        $data['teacher_list'] = $this->timetable_model->get_teacher_list();
        $data['subject_list'] = $this->timetable_model->get_subject_list();


        $this->form_validation->set_rules("teacher", "Teacher", "required|integer|callback_teacher_selected|callback_teacher_already_have_slot");
        $this->form_validation->set_rules("subject", "Subject", "required|callback_subject_selected");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('timetable/add_slot_form', $data);
            $this->load->view('/templates/footer');
        } else {
            $slot['timetable_id'] = $timetable_id;
            $slot['slot_id'] = $slot_id;
            $slot['teacher_id'] = $this->input->post('teacher');
            $slot['subject_id'] = $this->input->post('subject');
            $slot['class_id'] = $this->timetable_model->get_class_id($timetable_id);
            $slot['year'] = $this->timetable_model->get_timetable_year($timetable_id);

            $this->timetable_model->add_slot($slot);
            $this->open($timetable_id);
        }
    }

    /**
     * Interface to delete a particular slot in a timetable
     * @param int $timetable_id
     * @param string $slot_id
     */
    function delete_slot($timetable_id, $slot_id) {
        $this->timetable_model->delete_slot($timetable_id, $slot_id);
        $this->open($timetable_id);
    }

    /**
     * Acts as a validation method to timetable creation.
     * Checks if the teacher already have a slot in another timetable at the
     * same time.
     *
     * @return boolean
     */
    function teacher_already_have_slot() {

        $timetable_id = $this->input->post('timetable_id');
        $slot_id = $this->input->post('slot');
        $teacher_id = $this->input->post('teacher');
        $year = $this->timetable_model->get_timetable_year($timetable_id);

        if ($in_timetable = $this->timetable_model->already_have_slot($teacher_id, $slot_id, $year)) {
            $this->form_validation->set_message('teacher_already_have_slot', "The teacher you have selected already have a slot in timetable <strong># {$in_timetable}</strong> ");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
      *Displaying the teacher's timetable
    */

    function view_teacher_timetable() {
        $id = $this->session->userdata['id'];
        $teacher_id = $this->teacher_model->get_teacher_id($id);
        $data['slots']  = $this->timetable_model->get_time_slot($teacher_id);


      $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "teacher";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('timetable/teacher_timetable', $data);
        $this->load->view('/templates/footer', $data);
    }

    /**
      *Displaying the teacher's timetable
    */

    function display_teacher_timetable() {
      $id = $this->session->userdata['id'];

      $data['slot']  = $this->timetable_model->get_time_slot($id);

      var_dump(  $data['slot']);
    }

}
