<?php


/**
 * Ecole - Profile Controller
 * 
 *  This controlled used for managing the current user's profile / account. 
 * view profile(s) /Edit Profile and Edit Account Settings (like password change) was previously in admin controller.
 *  Seperated for better usage of admin controller. So we can use admin controller for system administration only.
 * 
 * 
 * @authors  Sudaraka K.S , Thomas A.P. 
 * @copyright (c) 2015, Ecole. (http://projectecole.com)
 * @link http://projectecole.com
 */

class Profile extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('student_model');
        $this->load->model('Teacher_Model');
        $this->load->model('Year_Model');
    }

    /*
     * Main (index) function. This will load current user's profile to edit general information
     * 
     */

function index() {

        if ((empty($_GET)) || ($_GET['key'] == '')) {


            $user_id = $this->session->userdata('id');
            $user_type = $this->session->userdata['user_type'];
            if ($user_type == 'S') {
                $data['page_title'] = "Profile";
                $data['navbar'] = 'student';
                $data['edit'] = true;
                $data['user_type'] = $this->session->userdata['user_type'];
                $data['prof_navbar'] = 'profile_s';
                $data['personal'] = $this->student_model->get_student_only($user_id);
                $data['guardian'] = $this->student_model->get_guardian_only($user_id);
                $data['user_d'] = $this->user->get_user($user_id);
                $data['year'] = $this->Year_Model->get_academic_year_details();


                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('profile/student_profile', $data);
                $this->load->view('/templates/footer');
            }
            if ($user_type == 'T') {
                $data['page_title'] = "Profile";
                $data['navbar'] = 'teacher';
                $data['edit'] = true;
                $data['user_type'] = $this->session->userdata['user_type'];

                $teacher_id = $this->Teacher_Model->get_teacher_id($user_id);
                $data['details'] = $this->Teacher_Model->get_staff_details($teacher_id);
                $data['propic'] = $this->Teacher_Model->get_profile_img($teacher_id);
                $data['user_d'] = $this->user->get_user($user_id);
                $data['year'] = $this->Year_Model->get_academic_year_details();


                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('profile/teacher_profile', $data);
                $this->load->view('/templates/footer');
            }
            if ($user_type == 'A') {
                $data['page_title'] = "Profile";
                $data['navbar'] = 'admin';
                $data['edit'] = true;
                $data['user_type'] = $this->session->userdata['user_type'];
                //$data['prof_navbar'] = 'profile_s';

                $data['user_d'] = $this->user->get_user($user_id);
                $data['year'] = $this->Year_Model->get_academic_year_details();


                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('profile/admin_profile', $data);
                $this->load->view('/templates/footer');
            }
        } else {
            $user_id = $_GET['key'];

            if ($user_type = $this->user->get_user_type($user_id)) {

                if ($user_type == 'S') {
                    $data['page_title'] = "Profile";
                    $data['navbar'] = 'student';
                    $data['edit'] = false;
                    $data['user_type'] = $this->session->userdata['user_type'];
                    $data['prof_navbar'] = 'profile_s';
                    $data['personal'] = $this->student_model->get_student_only($user_id);
                    $data['guardian'] = $this->student_model->get_guardian_only($user_id);
                    $data['user_d'] = $this->user->get_user($user_id);

                    if ($this->session->userdata('user_type') == 'T') {
                        $data['complain'] = true;
                    }


                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('profile/student_profile', $data);
                    $this->load->view('/templates/footer');
                }
                if ($user_type == 'T') {
                    $data['page_title'] = "Profile";
                    $data['navbar'] = 'teacher';
                    $data['edit'] = false;
                    $data['user_type'] = $this->session->userdata['user_type'];
                    $data['user_d'] = $this->user->get_user($user_id);

                    $teacher_id = $this->Teacher_Model->get_teacher_id($user_id);
                    $data['details'] = $this->Teacher_Model->get_staff_details($teacher_id);
                    $data['propic'] = $this->Teacher_Model->get_profile_img($teacher_id);
                    $data['user_d'] = $this->user->get_user($user_id);

                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('profile/teacher_profile', $data);
                    $this->load->view('/templates/footer');
                }
                if ($user_type == 'A') {
                    $data['page_title'] = "Profile";
                    $data['navbar'] = 'admin';
                    $data['edit'] = false;
                    $data['user_type'] = $this->session->userdata['user_type'];
                    //$data['prof_navbar'] = 'profile_s';

                    $data['user_d'] = $this->user->get_user($user_id);


                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('profile/admin_profile', $data);
                    $this->load->view('/templates/footer');
                }
            } else {
                redirect(dashboard);
            }
        }
    }


    //load data on temporary table 


    function loadProfile_temp(){

            $user_id = $_GET['key'];

            if ($user_type = $this->user->get_user_type($user_id)) {

                if ($user_type == 'S') {
                    $data['page_title'] = "Profile";
                    $data['navbar'] = 'student';
                    $data['edit'] = false;
                    $data['user_type'] = $this->session->userdata['user_type'];
                    $data['prof_navbar'] = 'profile_s';
                    $data['personal'] = $this->student_model->get_Temp_student_only($user_id);
                    $data['guardian'] = $this->student_model->get_temp_guardian_only($user_id);
                    $data['user_d'] = $this->user->get_user($user_id);

                    if ($this->session->userdata('user_type') == 'T') {
                        $data['complain'] = true;
                    }


                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('profile/student_profile', $data);
                    $this->load->view('/templates/footer');
                }
           
                if ($user_type == 'A') {
                    $data['page_title'] = "Profile";
                    $data['navbar'] = 'admin';
                    $data['edit'] = false;
                    $data['user_type'] = $this->session->userdata['user_type'];
                    //$data['prof_navbar'] = 'profile_s';

                    $data['user_d'] = $this->user->get_user($user_id);


                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('profile/admin_profile', $data);
                    $this->load->view('/templates/footer');
                }
            }
        


    }


    function loadProfile_temp_teacher(){

                     $user_id = $_GET['key'];
                
                    $userIDfromTemp=$this->Teacher_Model->resolveUserID($user_id);
                  //  $USER_ID = $userIDfromTemp->user_id;
                   // var_dump($userIDfromTemp);
                    $data['page_title'] = "Profile";
                    $data['navbar'] = 'teacher';
                    $data['edit'] = false;
                    $data['user_type'] = $this->session->userdata['user_type']; 
                    $data['user_d'] = $this->user->get_user($userIDfromTemp);

                 //   $teacher_id = $this->Teacher_Model->get_temp_teacher_id($user_id);
                    $data['details'] = $this->Teacher_Model->get_staff_details_temp($user_id);
                  //  $data['propic'] = $this->Teacher_Model->get_profile_temp_img($userIDfromTemp);
                    $data['user_d'] = $this->user->get_user($userIDfromTemp);

                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('profile/teacher_profile', $data);
                    $this->load->view('/templates/footer');

    }
        
    /**
     * Load account settings.then we can change account settings
     * 
     */

    function account_settings() {
        //getting the user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $result = $this->user->get_details($this->session->userdata('id'));
        foreach ($result as $row) {
            $data['first_name'] = $row->first_name;
            $data['last_name'] = $row->last_name;
        }

        $data['page_title'] = "Account Settings";
        $data['navbar'] = 'admin';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('profile/account_settings', $data);
        $this->load->view('templates/footer');
    }

    /**
     * This performs password change. 
     */
    function change_password() {
        //getting the user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_password', 'Old Password', "required|xss_clean|callback_check_old_password");

        if ($this->user->force_strong_password()) {
            $this->form_validation->set_rules('new_password', 'New Password', "required|min_length[5]|xss_clean|matches[conf_password]|callback_is_strong_password");
        } else {
            $this->form_validation->set_rules('new_password', 'New Password', "required|min_length[5]|xss_clean|matches[conf_password]");
        }

        $this->form_validation->set_rules('conf_password', 'Confirm Password', "required|xss_clean|matches[new_password]");

        if ($this->form_validation->run() == FALSE) {
            $data['page_title'] = "Account Settings";
            $data['navbar'] = 'admin';
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('profile/account_settings', $data);
            $this->load->view('templates/footer');
        } else {

            $user_id = $this->session->userdata('id');
            $new_password = $this->input->post('new_password');
            if ($this->user->change_password($user_id, $new_password)) {
                $data['page_title'] = "Account Seings";
                $data['navbar'] = 'admin';
                $data['succ_message'] = "Password Changed Successfully";
                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('profile/account_settings', $data);
                $this->load->view('templates/footer');
            }
        }
    }

    /**
     * chech whether the password is stongtype
     * 
     * @return boolean
     */
    function is_strong_password() {
        $password = $this->input->post('new_password');
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        if (!$uppercase) {
            $this->form_validation->set_message('is_strong_password', "Your new password does not contain atleast 1 uppercase letter");
            return FALSE;
        } else if (!$lowercase) {
            $this->form_validation->set_message('is_strong_password', "Your new password does not contain atleast 1 lowecase letter");
            return FALSE;
        } else if (!$number) {
            $this->form_validation->set_message('is_strong_password', "Your new password does not contain atleast 1 number");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * This performs update profile
     */
    function update_profile() {
        //getting the user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'first name', "required|xss_clean|alpha");
        $this->form_validation->set_rules('last_name', 'last name', "required|xss_clean|alpha");

        if ($this->form_validation->run() == FALSE) {
            $user_id = $this->session->userdata('id');
            $data['page_title'] = "Profile Settings";
            $data['navbar'] = 'admin';
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['profile_image'] = $this->user->get_profile_img($user_id);

            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('profile/profile_settings', $data);
            $this->load->view('templates/footer');
        } else {
            $user_id = $this->session->userdata('id');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';

            $this->load->library('upload', $config);

            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');

            $image = $this->user->get_profile_img($user_id);

            if ($this->upload->do_upload('profile_img')) {
                $image_data = $this->upload->data();
                $image = base_url() . "uploads/" . $image_data['file_name'];
            }

            $update_data = array(
                'user_id' => $user_id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'image' => $image
            );

            if ($this->user->update_info($update_data)) {
                $result = $this->user->get_details($this->session->userdata('id'));
                foreach ($result as $row) {
                    $data['first_name'] = $row->first_name;
                    $data['last_name'] = $row->last_name;
                    $data['profile_image'] = $row->profile_img;
                }
                $data['page_title'] = "Profile Settings";
                $data['navbar'] = 'admin';
                $data['succ_message'] = "Profile Settings Changed Successfully";
                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('profile/profile_settings', $data);
                $this->load->view('templates/footer');
            }
        }
    }

    /**
     * we can check wheter the entered old password is correct
     * 
     * @return boolean
     */
    function check_old_password() {
        $user_id = $this->session->userdata('id');
        $password_hash = $this->user->get_password_hash($user_id);

        $inserted_old_password_hash = md5($this->input->post('old_password'));
        if ($password_hash === $inserted_old_password_hash) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_old_password', "Your old password is incorrect");
            return FALSE;
        }
    }

    /**
     * we load the profile view and all the relevent details
     */
    function load_profile() {

        $data['user_type'] = $this->session->userdata['user_type'];

        $result = $this->user->get_details($this->session->userdata('id'));
        foreach ($result as $row) {
            $data['first_name'] = $row->first_name;
            $data['last_name'] = $row->last_name;
        }

        $data['page_title'] = "Account Settings";
        $data['navbar'] = 'admin';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('profile/user_profile', $data);
        $this->load->view('templates/footer');
    }

    /**
     * to load the profile settings view
     */
    function profile_settings() {
        //getting the user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $result = $this->user->get_details($this->session->userdata('id'));
        foreach ($result as $row) {
            $data['first_name'] = $row->first_name;
            $data['last_name'] = $row->last_name;
            $data['profile_image'] = $row->profile_img;
        }

        $data['navbar'] = 'admin';

        $data['page_title'] = "Profile Settings";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('profile/profile_settings', $data);
        $this->load->view('templates/footer');
    }

    /**
     * to load the calander in the profile
     * 
     * @param type $id
     */
    public function view_year($id) {
        $data['navbar'] = "admin";

        $data['page_title'] = "profile";
        $data['first_name'] = $this->session->userdata('first_name');
        $userid = $this->session->userdata['id'];

        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        //Get Year Details 
        $data['year'] = $this->Year_Model->get_academic_year_by_id($id);

        //Passing it to the View
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);

        //View Year Planer
        $this->load->view('year/view_year', $data);

        $this->load->view('/templates/footer');
    }

    /**
     * performs the note adding functionality of the profile
     */
    function add_note() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject', 'Subject', "required|xss_clean");
        $this->form_validation->set_rules('note', 'Note', "required|xss_clean");

        if ($this->form_validation->run() == FALSE) {
             $message = array('msg' => validation_errors(), 'status' => false);
                    echo json_encode($message);
        } else {

            if ($user_id = $this->student_model->get_id_by_index($this->input->post('addm'))) {

                $note_data = array(
                    'type' => $this->input->post('type'),
                    'user_id' => $user_id,
                    'subject' => $this->input->post('subject'),
                    'note' => $this->input->post('note')
                );


                if ($this->user->add_note($note_data)) {
                    //$succ_message = 'Note Successfully Added';
                    $message = array('msg' => 'Note Successfully Added', 'status' => true);
                    echo json_encode($message);
                } else {
                    $message = array('msg' => 'Error occured', 'status' => true);

                    echo json_encode($message);
                }
            } else {

                $message = array('msg' => 'Error occured', 'status' => true);

                echo json_encode($message);
            }
        }
    }

}

