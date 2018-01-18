<?php
/**
 * Ecole - Inbox Controller
 * 
 * Controller for internal messaging system.
 * 
 * @author  Sudaraka K. S.
 * @copyright (c) 2015, Ecole. (http://projectecole.com)
 * @link http://projectecole.com
 */
class Inbox extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('messages_model');
        $this->load->helper('messages_helper');
        $this->load->helper('users_helper');
    }
    
    /*
     * Loads the main interface of messages inbox
     */
    public function index() {
        $data['navbar'] = 'inbox';
        $data['user_type'] = $this->session->userdata('user_type');
        $data['page_title'] = "Inbox";
        $data['inbox_type'] = "inbox";
        $data['conversations'] = $this->messages_model->get_all_messages($this->session->userdata('id'));
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('inbox/list', $data);
        $this->load->view('templates/footer');
    }

    /*
     * Loads the page to compose a new messages.
     */
    public function compose() {
        $data['page_title'] = "Compose a new message";
        $data['user_type'] = $this->session->userdata('user_type');
        $data['navbar'] = 'inbox';
        $data['user_type'] = $this->session->userdata('user_type');

        $this->form_validation->set_rules('to_user', 'User', 'required|callback_user_select_check');
        $this->form_validation->set_rules('subject', 'Subject', 'required|xss_clean');
        $this->form_validation->set_rules('content', 'Message', 'required|xss_clean');

        $data['to_user'] = $this->input->post('to_user');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('inbox/compose', $data);
            $this->load->view('templates/footer');
        } else {
            $this->messages_model->new_conversation(
                    $this->session->userdata('id'), $this->input->post('to_user'), $this->input->post('subject'), $this->input->post('content')
            );
            redirect('inbox');
        }
    }

    /*
     * Input validation function where it checks user is selected to send 
     * a message
     */
    public function user_select_check() {
        $selected_user = $this->input->post('to_user');

        if ($selected_user == 0) {
            $this->form_validation->set_message('user_select_check', 'Please select a user to send message');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    /*
     * Open the conversation
     */

    public function read($conv_id) {
        $data['conversation'] = $this->messages_model->get_conversation($conv_id);
        $data['conversation_id'] = $conv_id;
        $data['conversation_subject'] = $this->messages_model->get_conversation_subject($conv_id);
        $data['user_type'] = $this->session->userdata('user_type');
        $data['page_title'] = $data['conversation_subject'];
        $data['navbar'] = 'inbox';
        $data['user_type'] = $this->session->userdata('user_type');

        $this->form_validation->set_rules('reply', 'Reply', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('inbox/conversation', $data);
            $this->load->view('templates/footer');
            
            $this->messages_model->mark_as_read($conv_id);
        } else {
            
            $this->messages_model->add_reply(
                    $conv_id, 
                    $this->session->userdata('id'),
                    get_other_user($conv_id, $this->session->userdata('id')), 
                    $this->input->post('reply')
            );
            $data['conversation'] = $this->messages_model->get_conversation($conv_id);
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('inbox/conversation', $data);
            $this->load->view('templates/footer');
        }
    }

    /*
     * Open sent messages
     */
    public function sent() {
        $data['page_title'] = "Sent Messages";
        $data['conversations'] = $this->messages_model->get_sent_list($this->session->userdata("id"));
        $data['user_type'] = $this->session->userdata('user_type');
        $data['navbar'] = 'inbox';
        $data['inbox_type'] = "sent";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('inbox/list', $data);
        $this->load->view('templates/footer');
    }

    public function received() {
        $data['page_title'] = "Received Messages";
        $data['conversations'] = $this->messages_model->get_received_list($this->session->userdata("id"));
        $data['user_type'] = $this->session->userdata('user_type');
        $data['navbar'] = 'inbox';
        $data['inbox_type'] = "inbox_r";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('inbox/list', $data);
        $this->load->view('templates/footer');
    }
    
    public function delete($conversation_id = null){
        if($conversation_id == null){
            show_404();
        }
        $this->messages_model->delete($conversation_id);
        redirect('inbox');
    }

}
