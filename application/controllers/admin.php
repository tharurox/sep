<?php

/**
 * Ecole - Admin Controller
 *
 * Main controller for Admin related functionalties.
 *
 * @author  Sampath R.P.C.
 */
class Admin extends CI_Controller {

    /**
     * Class contructor
     */
    function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('teacher_model');
        $this->load->model('news_model');
        $userType = $this->session->userdata('user_type');
        if ($userType !== "A" && $userType !== "V") {
            redirect('login');
        }
    }

    /**
     * Main administrator interface.
     */
    function index() {
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['page_title'] = "System Administration";
        $data['navbar'] = "admin";

        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    /**
     * System settings interface.
     * Responsible for managing global system wide settings.
     */
    function system_settings() {
        //getting the user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['page_title'] = "Account Settings";
        $data['navbar'] = 'admin';

        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('admin/system_settings', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Create admin accounts.
     */

    function createClUser(){

        //getting the user type
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['page_title'] = "Create Clarical Staff Account";
        $data['navbar'] = 'admin';

        $this->form_validation->set_rules('username', 'username', "trim|required|xss_clean|min_length[5]|alpha_dash|is_unique[users.username]");
        $this->form_validation->set_rules('email', 'email', "trim|required|xss_clean|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules('first_name', 'first name', "trim|required|xss_clean|alpha");
        $this->form_validation->set_rules('last_name', 'last name', "trim|required|xss_clean|alpha");
        $this->form_validation->set_rules('password', 'Password', "required|min_length[5]|xss_clean|matches[conf_password]");
        $this->form_validation->set_rules('conf_password', 'confirm password', "required|xss_clean|matches[password]");


        if ($this->form_validation->run()) {
            $data['to_user'] = $this->input->post('to_user');

            $user = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'password' => md5($this->input->post('password'))
            );

            $this->user->create($user, "C");
            $user_details = $this->user->get_user($this->session->userdata('id'));
            $this->news_model->insert_action_details($this->session->userdata('id'), "Create new user account", $user_details->profile_img, $user_details->first_name . "" . $user_details->last_name);
            $this->session->set_flashdata('succ_message', 'New User Created Successfully');
            redirect('admin/create', 'refresh');
        }

        $data['succ_message'] = $this->session->flashdata('succ_message');
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('admin/create_clUser', $data);
        $this->load->view('templates/footer');


    }

    function create() {
        //getting the user type
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['page_title'] = "Create Admin Account";
        $data['navbar'] = 'admin';

        $this->form_validation->set_rules('username', 'username', "trim|required|xss_clean|min_length[5]|alpha_dash|is_unique[users.username]");
        $this->form_validation->set_rules('email', 'email', "trim|required|xss_clean|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules('first_name', 'first name', "trim|required|xss_clean|alpha");
        $this->form_validation->set_rules('last_name', 'last name', "trim|required|xss_clean|alpha");
        $this->form_validation->set_rules('password', 'Password', "required|min_length[5]|xss_clean|matches[conf_password]");
        $this->form_validation->set_rules('conf_password', 'confirm password', "required|xss_clean|matches[password]");


        if ($this->form_validation->run()) {
            $data['to_user'] = $this->input->post('to_user');

            $user = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'password' => md5($this->input->post('password'))
            );

            $this->user->create($user, "V");
            $user_details = $this->user->get_user($this->session->userdata('id'));
            $this->news_model->insert_action_details($this->session->userdata('id'), "Create new admin account", $user_details->profile_img, $user_details->first_name . "" . $user_details->last_name);
            $this->session->set_flashdata('succ_message', 'New Admin Created Successfully');
            redirect('admin/create', 'refresh');
        }

        $data['succ_message'] = $this->session->flashdata('succ_message');
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('admin/create_admin', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Interface to manage administrator accounts.
     */
    function manage_admins() {
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['page_title'] = "Manage Administrators";
        $data['navbar'] = 'admin';

        $data['query'] = $this->user->get_user_list('A');
        $data['result'] = $data['query']->result();

        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('admin/manage_admins', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Search administrator accounts.
     */
    function search() {
        //getting the user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . "index.php/admin/manage_admins";
        $config['total_rows'] = $this->user->get_user_total();
        $config['per_page'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;

        $config['offset'] = ($this->uri->segment(3) ? $this->uri->segment(3) : null);

        $keyword = $this->input->post('keyword');
        $data['page_title'] = "Manage Administrators";
        $data['navbar'] = 'admin';

        $data['query'] = $this->user->get_user_list($keyword, 'A', $config['per_page'], $config['offset']);
        $config['cur_tag_open'] = "&nbsp;";

        $this->pagination->initialize($config);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);

        $data['result'] = $data['query']->result();

        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('admin/manage_admins', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Delete administrator account for a given user account
     * @param type $user_id
     */
    function delete($user_id) {
        $data['user_type'] = $this->session->userdata['user_type'];

        if ($this->session->userdata('user_type') !== "A") {
            show_404();
        }

        $this->user->delete($user_id);
        redirect('admin/manage_admins');
    }

    /*
     * Interface to edit administrator account
     */

    function edit($user_id = null) {

        $data['user_type'] = $this->session->userdata['user_type'];
        $data['page_title'] = "Edit User";
        $data['navbar'] = "admin";

        if ($this->session->userdata('user_type') !== "A") {
            redirect('login');
        }

        $data['user'] = $this->user->get_user($user_id);
        $this->form_validation->set_rules('email', 'Email', "trim|required|xss_clean|valid_email");
        $this->form_validation->set_rules('password', 'Password', "required|xss_clean");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('admin/edit_admin', $data);
            $this->load->view('templates/footer');
        } else {
            $edited_user = array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password'))
            );
            $this->user->edit_user($user_id, $edited_user);
            $data['user'] = $this->user->get_user($user_id);
            $data['succ_message'] = "User edited successfully.";
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('admin/edit_admin', $data);
            $this->load->view('templates/footer');
        }
    }

    /**
     * Interface to manage user accounts
     */
    function manage_users() {
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

}
