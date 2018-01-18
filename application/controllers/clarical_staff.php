<?php
/**
 * Ecole - Teacher Controller
 *
 * Responsibe for handling inputs
 *
 * @author Anuradha H.S
 */
class ClarivalStaff extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('teacher_model');
        $this->load->model('News_Model');
        $this->load->model('Leave_Model');
        $this->load->helper('date');
        $this->load->model('user');
    }

    /**
     * First run this index method. The session keeps track of whether the user logged in or not. If not, user has to login to the system.
     * It riderects user to another method according to the user type.
     */
    function index() {
        if (!$this->session->userdata('id')) {
            redirect('login', 'refresh');
        }
        $data['navbar'] = "teacher";
        $data['result'] = $this->teacher_model->SearchAllTeachers();

        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        if ($data['user_type'] == 'T') {
            //Show his/her personal details
            $data['page_title'] = "View Teacher Profile";
            $data['navbar'] = 'teacher';
            $data['progress'] = 0;
            $teacher_id = $this->teacher_model->get_teacher_id($this->session->userdata['id']);
            $data['user_id'] = $this->teacher_model->get_staff_details($teacher_id);
            $data['propic'] = $this->teacher_model->get_profile_img($teacher_id);
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('teacher/check_teacher_profile', $data);
            $this->load->view('/templates/footer');
        } else {
            //Load all teachers
            $data['page_title'] = "Search Teacher";
            $this->load->view('/templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('/teacher/Search_page', $data);
            $this->load->view('/templates/footer');
            $result = $this->user->get_details($this->session->userdata('id'));
            foreach ($result as $row) {
                $data['first_name'] = $row->first_name;
                $data['last_name'] = $row->last_name;
            }
        }
    }

    function view_clStaff(){
         $data['user_type'] = $this->session->userdata['user_type'];
        $data['page_title'] = "Manage Users";
        $data['navbar'] = 'admin';

        $data['result'] = $this->user->get_all_users_list();

        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('admin/manage_users', $data);
        $this->load->view('templates/footer');
    }

    function create(){

          if (!$this->session->userdata('id')) {
            redirect('login', 'refresh');
        }
        $data['navbar'] = "teacher";
        $data['user_type'] = $this->session->userdata['user_type'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('NIC', 'NIC', 'required|exact_length[10]|is_unique[teachers.nic_no]|callback_check_NIC');
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('initial', 'Initials', '');
        $this->form_validation->set_rules('birth', 'Birth Day', 'required|callback_check_Birth_day');
        $this->form_validation->set_rules('gender', 'Gender', 'callback_check_gender');
        $this->form_validation->set_rules('Nationality', 'Nationality', 'callback_check_selection');
        $this->form_validation->set_rules('religion', 'Religion', 'callback_check_selection');
        $this->form_validation->set_rules('civilstatus', 'Civil Status', 'callback_check_selection_status');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('address1','');
        $this->form_validation->set_rules('address2', '');
        $this->form_validation->set_rules('contactMob', 'Contatct Mobile', 'exact_length[10]|integer|callback_check_Mobile');
        $this->form_validation->set_rules('contactHome', 'Contact Home', 'exact_length[10]|integer');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('widow', 'Widow No', '');

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
            $data['page_title'] = "Teacher Registration";
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('teacher/teacher_reg_form', $data);
            $this->load->view('/templates/footer');
        } else { // passed validation proceed to post success logic
            // build array for the model
            $personal_teacher_details = array(
                'nic_no' => $this->input->post('NIC'),
                'full_name' => $this->input->post('name'),
                'name_with_initials' => $this->input->post('initial'),
                'dob' => $this->input->post('birth'),
                'gender' => $this->input->post('gender'),
                'nationality_id' => $this->input->post('Nationality'),
                'religion_id' => $this->input->post('religion'),
                'civil_status' => $this->input->post('civilstatus'),
                'permanent_addr' => $this->input->post('address'),
                'permanent_addr1' => $this->input->post('address1'),
                'permanent_addr2' => $this->input->post('address2'),
                'contact_mobile' => $this->input->post('contactMob'),
                'contact_home' => $this->input->post('contactHome'),
                'email' => $this->input->post('email'),
                'wnop_no' => $this->input->post('widow')
            );
            // run insert model to write data to db

            if ($id = $this->teacher_model->insert_new_staff($personal_teacher_details)) { // the information has therefore been successfully saved in the db
                $data["user_id"] = $id;
                $data['page_title'] = "Teacher Registration";
                $data['navbar'] = "teacher";
                //For news field
                $tech_id = $this->session->userdata('id');
                $tech_details = $this->teacher_model->user_details($tech_id);
                $this->News_Model->insert_action_details($tech_id, "Insert New Teacher Record", $tech_details->profile_img, $tech_details->first_name);
                //////
                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('teacher/teacher_update_form', $data);   // or whatever logic needs to occur
                $this->load->view('/templates/footer');
            } else {
                echo 'An error occurred saving your information. Please try again later';
                // Or whatever error handling is necessary
            }
        }
    }
}
