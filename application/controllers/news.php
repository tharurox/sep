<?php
/**
 * Ecole - News Controller
 *
 * Handles the News Page Functions
 *
 *  @author Anuradha H.S
 */
class News extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Teacher_Model');
        $this->load->model('News_Model');
        $this->load->helper('date');
        $this->load->model('user');
    }

    /*
     *  This is the index function which executes first in this controller
     * Only Admin is priveledged to View this page
     */
    function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        } else if ($this->session->userdata['user_type'] == 'A') {
            $data['users'] = $this->Teacher_Model->SearchAllTeachers();
            $data['page_title'] = "History";
            $data['navbar'] = 'history';
            $data['result'] = $this->News_Model->get_news_details();
            //Getting user type
            $data['user_type'] = $this->session->userdata['user_type'];
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('news/news_form', $data);
            $this->load->view('/templates/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    /*
     * In this function, admin can get the news form
     */
    function get_news() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        } else if ($this->session->userdata['user_type'] == 'A') {
            $data['page_title'] = "View All News";
            $data['navbar'] = 'news';
            $data['details'] = $this->News_Model->get_all_news_details();
            //Getting user type
            $data['user_type'] = $this->session->userdata['user_type'];
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('news/all_news', $data);
            $this->load->view('/templates/footer');
        }
    }

    /*
     * Display all the activities that user has perfomed in this system
     */
    function list_activities() {
        $tech_id = $this->input->post('tid');
        $this->News_Model->get_teacher_activities($tech_id);
    }

    /*
     * Admin can clear the history(activities)
     */
    function clear_history() {
        $clear_data_type = $this->input->post('deletetype');
        $this->News_Model->clear($clear_data_type);
    }

    /*
     * Function to edit a news
     *
     * @param  int
     *
     * @return Results
     */
    public function edit_news($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        } else if ($this->session->userdata['user_type'] == 'A') {
            //Getting user type
            $data['user_type'] = $this->session->userdata['user_type'];
            date_default_timezone_set('Asia/Kolkata');             //get the current timezone
            $this->load->library('form_validation');
            $this->form_validation->set_rules('news', 'News Title', 'required');
            $this->form_validation->set_rules('description', 'News Body', 'required');
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            // Set View data
            $userid = $this->session->userdata['id'];
            $data['page_title'] = "Publish News";
            $data['navbar'] = "admin";
            $data['details'] = $this->News_Model->get_particular_news($id);
            $data['newsid'] = $id;
            // Check for form validation
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('news/edit_news', $data);
                $this->load->view('templates/footer');
            } else {
                // Actions on form validation success
                $updatedon = date("Y-m-d");
                $news_name = $this->input->post('news');
                $description = $this->input->post('description');
                $news_data = array('name' => $news_name, 'description' => $description, 'updated_at' => $updatedon);
                if ($this->News_Model->update_news($id, $news_data)) {
                    //For news field
                    $tech_id = $this->session->userdata('id');
                    $tech_details = $this->Teacher_Model->user_details($tech_id);
                    $data['details'] = $this->News_Model->get_particular_news($id);
                    //Record on database log
                    $this->News_Model->insert_action_details($tech_id, "Published a news", $tech_details->profile_img, $tech_details->first_name);
                    //action successfull
                    $data['succ_message'] = "Successfully Published News";
                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('news/edit_news', $data);
                    $this->load->view('/templates/footer');
                } else {
                    // Error message on database error
                    $data['err_message'] = 'An error occurred saving your information. Please try again later';
                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('news/edit_news', $data);
                    $this->load->view('/templates/footer');
                }
            }
        }
    }

    /*
     * Function to view a news
     *
     * @param  int
     *
     * @return Results
     */
    public function view_news($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];
        // Call model to get a single news item
        $data['details'] = $this->News_Model->get_particular_news($id);
        $data['page_title'] = "View News";
        $data['navbar'] = 'admin';
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('news/view_news', $data);
        $this->load->view('templates/footer');
    }

    /*
     * Function to delete a news
     *
     * @param  int
     *
     * @return Results
     */
    public function delete_news($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        //Getting user type and Authorize it to be an Admin
        $data['user_type'] = $this->session->userdata['user_type'];
        if ($data['user_type'] != 'A') {
            redirect('login', 'refresh');
        }
        $this->News_Model->delete_news($id);
        // Redirect on success
        redirect('news/get_news?delete=true', 'refresh');
    }

    /**
     * This function a function to publish a news item
     * Takes Values from the Form and Send them to Model
     */
    function publish_news() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        } else if ($this->session->userdata['user_type'] == 'A') {
            //Getting user type
            $data['user_type'] = $this->session->userdata['user_type'];
            date_default_timezone_set('Asia/Kolkata');             //get the current timezone
            $this->load->library('form_validation');
            $this->form_validation->set_rules('news', 'News Title', 'required');
            $this->form_validation->set_rules('description', 'News Body', 'required');
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            $userid = $this->session->userdata['id'];
            // Check for form validation
            if (!$this->form_validation->run()) {
                $data['page_title'] = "Publish News";
                $data['navbar'] = 'admin';
                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('news/news_publish', $data);
                $this->load->view('templates/footer');
            } else {

                $data['succ_message'] = "Successfully Published News";
                $news_name = $this->input->post('news');
                $description = $this->input->post('description');
                //Insert new news item to the database
                if ($this->News_Model->create_news($news_name, $description, $userid)) {
                    //For news field
                    $tech_id = $this->session->userdata('id');
                    $tech_details = $this->Teacher_Model->user_details($tech_id);
                    // Save on database log
                    $this->News_Model->insert_action_details($tech_id, "Publish a news", $tech_details->profile_img, $tech_details->first_name);
                    //Show Success message
                    $data['page_title'] = "Publish News";
                    $data['navbar'] = "admin";
                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('news/news_publish', $data);
                    $this->load->view('/templates/footer');
                } else {
                    // Display error on database errors
                    $data['err_message'] = 'An error occurred saving your information. Please try again later';
                    $data['page_title'] = "Publish News";
                    $data['navbar'] = "admin";
                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('news/news_publish', $data);
                    $this->load->view('/templates/footer');
                }
            }
        }
    }
}
