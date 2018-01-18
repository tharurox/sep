<?php

/**
 * Ecole - User Authentication Controller
 *
 * Handles the user login to the system.
 *
 * @author  Sampath R.P.C.
 */
class User_Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user', '', TRUE);
    }

    /*
     * Main Authentication Handler.
     * Provide the interface for user login and calls the neccessary functions
     * to authenticate the user.
     */

    function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_authenticate');

        if ($this->form_validation->run() == FALSE) {
            $data['page_title'] = "Login";
            $this->load->view('/templates/header', $data);
            $this->load->view('login_form');
            $this->load->view('/templates/footer');
        } else {
            redirect('dashboard', 'refresh');
        }
    }

    /**
     * Authentication Validation
     * @return bool
     */
    function authenticate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->user->login($username, $password);
        if ($user) {
            $sess_array = array();
            $sess_array = array(
                'logged_in' => TRUE,
                'id' => $user->id,
                'username' => $user->username,
                'password' => $user->password,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'user_type' => $user->user_type
            );
            $this->session->set_userdata($sess_array);
            return TRUE;
        } else {
            $this->form_validation->set_message('authenticate', "Invalid Username or Password.");
            return FALSE;
        }
    }
}
