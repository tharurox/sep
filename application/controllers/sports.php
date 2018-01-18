<?php

/**
 * Ecole - Sports Controller
 *
 * Responsibe for handling inputs
 *
 * @author V.I.Galhena
 */

class Sports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('sports_model');
    }

    function index(){
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['page_title'] = "Sports";
        $data['navbar'] = "sports";
        $data['det'] = $this->sports_model->view_sport_category();
        $data['cap'] = $this->sports_model->view_sport_captains();
        $data['team'] = $this->sports_model->view_sport_team();
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('sports/sport_details', $data);
        $this->load->view('templates/footer');
    }

    function add_sport_category(){
        if (!$this->session->userdata('id')) {
            redirect('login', 'refresh');
        }
        $data['navbar'] = "sports";
        $data['user_type'] = $this->session->userdata['user_type'];

        //edit_teacher_profile view validations
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sport_name', 'Sport Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('agecat', 'Age Category', 'required');

        

        if (!$this->form_validation->run()) {
            $data['det'] = $this->sports_model->view_sport_category();
            $data['navbar'] = "sport";
            $data['page_title'] = "Sport Category";
            $this->load->view('/templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('sports/sport_details', $data);
            $this->load->view('/templates/footer');
        }
        else{
            $sport_cat = $this->input->post('sport_name');
            $sport_descrp = $this->input->post('description');
            $sport_age_category = $this->input->post('agecat');
            $this->sports_model->add_sport_category($sport_cat,$sport_descrp,$sport_age_category);

            $data['det'] = $this->sports_model->view_sport_category();
            $data['succ_message'] = "Succesfully inserted";
            $data['navbar'] = "sport";
            $data['page_title'] = "Sport Category";
            $this->load->view('/templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('sports/sport_details', $data);
            $this->load->view('/templates/footer');
        }


    }

    public function view_category() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];
        $id = $this->uri->segment(3);
        $data['details'] = $this->sports_model->sport_category_details($id);
        $this->load->view('sports/edit_sport_category_form', $data);
    }

     function assign_leaders(){
         if (!$this->session->userdata('id')) {
            redirect('login', 'refresh');
        }
        $data['navbar'] = "sports";
        $this->load->library('form_validation');
        $data['user_type'] = $this->session->userdata['user_type'];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('sname', 'Sport Name', 'required');
        $this->form_validation->set_rules('agecat', 'Age Category', 'required');
        $this->form_validation->set_rules('division', 'Division', 'required|greater_than[0]');
        $this->form_validation->set_rules('cap_name', 'Captain Name', 'required');
        $this->form_validation->set_rules('vice_name', 'Vice Captain Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['cap'] = $this->sports_model->view_sport_captains();
            $data['sports'] = $this->sports_model->get_all_sports();
            $data['navbar'] = "sport";
            $data['page_title'] = "Sport Category";
            $this->load->view('/templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('sports/assign_leaders_form', $data);
            $this->load->view('/templates/footer');
        }
        else{

            $data['cap'] = $this->sports_model->view_sport_captains();
            $data['sports'] = $this->sports_model->get_all_sports();

            $sport_name = $this->input->post('sname');
            $agecat = $this->input->post('agecat');
            $division = $this->input->post('division');
            $sport_captain = $this->input->post('cap_name');
            $sport_vice = $this->input->post('vice_name');
            $this->sports_model->add_sport_captains($sport_name,$agecat,$division,$sport_captain,$sport_vice);
            redirect('sports/assign_leaders');

            $data['succ_message'] = "Succesfully inserted";
            $data['navbar'] = "sport";
            $data['page_title'] = "Sport Category";
            $this->load->view('/templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('sports/assign_leaders_form', $data);
            $this->load->view('/templates/footer');
        }
    }

    function assign_students(){
        if (!$this->session->userdata('id')) {
            redirect('login', 'refresh');
        }
        $data['navbar'] = "sports";
        $data['page_title'] = "Sports";
        $data['user_type'] = $this->session->userdata['user_type'];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Student Name', 'required');
        $this->form_validation->set_rules('regno', 'Register No ', 'required');
        $this->form_validation->set_rules('sname', 'Sport Name', 'required');
        $this->form_validation->set_rules('agecat', 'Age Category', 'required');
        $this->form_validation->set_rules('devision', 'Division', 'required|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $data['navbar'] = "sports";
            $data['page_title'] = "Sports";
            $data['user_type'] = $this->session->userdata['user_type'];
            $data['det'] = $this->sports_model->view_sport_category();
            $data['sports'] = $this->sports_model->get_all_sports();
            $data['students'] = $this->sports_model->get_all_students();
            $data['team'] = $this->sports_model->view_sport_team();
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('sports/assign_students', $data);
            $this->load->view('templates/footer');
        } 
        else{

            $data['det'] = $this->sports_model->view_sport_category();
            $data['sports'] = $this->sports_model->get_all_sports();
            $data['students'] = $this->sports_model->get_all_students();
            $data['team'] = $this->sports_model->view_sport_team();

            $student_name = $this->input->post('name');
            $regno = $this->input->post('regno');
            $sport_name = $this->input->post('sname');
            $cat = $this->input->post('agecat');
            $div = $this->input->post('devision');
            $this->sports_model->add_sport_team($student_name,$regno,$sport_name,$cat,$div);
            redirect('sports/assign_students');

            $data['succ_message'] = "Succesfully inserted";
            $data['navbar'] = "sport";
            $data['page_title'] = "Sport Category";        

            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('sports/assign_students', $data);
            $this->load->view('templates/footer');
        }    
    }

    function management_details(){
        if (!$this->session->userdata('id')) {
            redirect('login', 'refresh');
        }
        $data['navbar'] = "sports";
        $data['page_title'] = "Sports";
        $data['user_type'] = $this->session->userdata['user_type'];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Sport Name', 'required');
        $this->form_validation->set_rules('tname', 'Teacher Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['navbar'] = "sports";
            $data['page_title'] = "Sports";
            $data['user_type'] = $this->session->userdata['user_type'];
            $data['det'] = $this->sports_model->view_sport_category();
            $data['sports'] = $this->sports_model->get_all_sports();
            $data['teachers'] = $this->sports_model->get_all_teachers();
            $data['incharge'] = $this->sports_model->view_sport_incharge();

            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('sports/sport_managers_form', $data);
            $this->load->view('templates/footer');
        }
        else{

            $data['navbar'] = "sports";
            $data['page_title'] = "Sports";
            $data['user_type'] = $this->session->userdata['user_type'];
            $data['det'] = $this->sports_model->view_sport_category();
            $data['sports'] = $this->sports_model->get_all_sports();
            $data['teachers'] = $this->sports_model->get_all_teachers();
            $data['incharge'] = $this->sports_model->view_sport_incharge();

            $sname = $this->input->post('name');
            $incharge = $this->input->post('tname');
            $this->sports_model->add_sport_incharge($sname,$incharge);
            redirect('sports/management_details');

            $data['succ_message'] = "Succesfully inserted";
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('sports/sport_managers_form', $data);
            $this->load->view('templates/footer');
        }    
    }

    function get_captain_name($id){
      $data['captain_name'] =  $this->sports_model->captain_name($id);
      $this->load->view('/sports/captain',$data);
    }

    function get_captain_regno(){
      $cap_name = $_SERVER['QUERY_STRING'];
      $data['captain_regno'] =  $this->sports_model->get_cap_regno($cap_name);
      $this->load->view('/sports/captain',$data);
    }

     public function delete_sport($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        //Getting user type and Authorize it to be an Admin
        $data['user_type'] = $this->session->userdata['user_type'];
        if ($data['user_type'] != 'A') {
            redirect('login', 'refresh');
        }
        $this->sports_model->delete_sport($id);
        redirect('sports/add_sport_category');
    }

    /*
    *Sport edit view
    */
    public function edit_single_sport($id) {
        $data['page_title'] = "Edit Sport";        

        $data['result'] = $this->sports_model->get_sport($id);

        $data['succ_message'] = "Succesfully inserted";
        $data['navbar'] = "sport";
        $data['page_title'] = "Sport Edit";
        $data['user_type'] = $this->session->userdata['user_type'];
        $this->load->view('/templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('sports/edit_sport', $data);
        $this->load->view('/templates/footer');
    }

    public function edit_sport() {
        $id = $this->input->post('id');
        var_dump($id);
        $shop_data  = array(
        'name'=> $this->input->post('name'),
        'des'=> $this->input->post('des'),
        );

        if($this->sports_model->update_sport($id,$shop_data)) {
            redirect('sports/add_sport_category');
        }
    }

    public function delete_captain($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        //Getting user type and Authorize it to be an Admin
        $data['user_type'] = $this->session->userdata['user_type'];
        if ($data['user_type'] != 'A') {
            redirect('login', 'refresh');
        }
        $this->sports_model->delete_captain($id);
        redirect('sports/assign_leaders');
    }

    /*
    *Sport captains edit view
    */
    public function edit_single_captain($id) {
        $data['page_title'] = "Edit Sport";        

        $data['result'] = $this->sports_model->get_captain($id);

        $data['succ_message'] = "Succesfully inserted";
        $data['navbar'] = "sport";
        $data['page_title'] = "Leader Edit";
        $data['user_type'] = $this->session->userdata['user_type'];
        $this->load->view('/templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('sports/edit_leader', $data);
        $this->load->view('/templates/footer');
    }

    public function edit_captain() {
        $id = $this->input->post('id');
        var_dump($id);
        $cap_data  = array(
            'cat'=> $this->input->post('cat'),
            'div'=> $this->input->post('div'),
            'cap'=> $this->input->post('cap'),
            'vice'=>$this->input->post('vice'),
        );

        if($this->sports_model->update_captain($id,$cap_data)) {
            redirect('sports/assign_leaders');
        }
    }

    public function delete_team($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        //Getting user type and Authorize it to be an Admin
        $data['user_type'] = $this->session->userdata['user_type'];
        if ($data['user_type'] != 'A') {
            redirect('login', 'refresh');
        }
        $this->sports_model->delete_team_member($id);
        redirect('sports/assign_students');
    }

    /*
    *Sport captains edit view
    */
    public function edit_single_student($id) {
        $data['page_title'] = "Edit Sport";        

        $data['result'] = $this->sports_model->get_student($id);

        $data['succ_message'] = "Succesfully inserted";
        $data['navbar'] = "sport";
        $data['page_title'] = "Leader Edit";
        $data['user_type'] = $this->session->userdata['user_type'];
        $this->load->view('/templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('sports/edit_student', $data);
        $this->load->view('/templates/footer');
    }

    public function edit_student() {
        $id = $this->input->post('id');
        var_dump($id);
        $std_data  = array(
            'sname'=> $this->input->post('sname'),
            'cat'=> $this->input->post('cat'),
            'div'=> $this->input->post('div'),
        );

        if($this->sports_model->update_student($id,$std_data)) {
            redirect('sports/assign_students');
        }
    }

    public function delete_incharge($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        //Getting user type and Authorize it to be an Admin
        $data['user_type'] = $this->session->userdata['user_type'];
        if ($data['user_type'] != 'A') {
            redirect('login', 'refresh');
        }
        $this->sports_model->delete_team_incharge($id);
        redirect('sports/management_details');
    }

    /*
    *Sport captains edit view
    */
    public function edit_single_teacher($id) {
        $data['page_title'] = "Edit Sport";        

        $data['result'] = $this->sports_model->get_incharge($id);

        $data['succ_message'] = "Succesfully inserted";
        $data['navbar'] = "sport";
        $data['page_title'] = "Leader Edit";
        $data['user_type'] = $this->session->userdata['user_type'];
        $this->load->view('/templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('sports/edit_incharge', $data);
        $this->load->view('/templates/footer');
    }

    public function edit_teacher() {
        $id = $this->input->post('id');
        var_dump($id);
        $incharge_data  = array(
            'sname'=> $this->input->post('sname'),
            'tname'=> $this->input->post('tname'),
        );

        if($this->sports_model->update_incharge($id,$incharge_data)) {
            redirect('sports/management_details');
        }
    }

}
