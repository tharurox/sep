<?php
/**
 * Ecole - Certificate Controller
 *
 * Handles Functionality of the Certificate compodent(manage certificate)
 *
 * @author  Sampath R.P.C.
 */

class Certificate extends CI_Controller {
  /**
   * Class contructor
   */
  function __construct() {
    parent::__construct();
    $this->load->model('Student_Model');
    $this->load->model('user');
    $this->load->model('certificate_model');

    if ($this->session->userdata('user_type') !== "A") {
        redirect('login');
    }
  }

/*
*Index function
*Load the main view
*/
function index() {
      $data['user_type'] = $this->session->userdata['user_type'];
      $data['page_title'] = "Certificate";
      $data['navbar'] = "admin";



      $this->load->view('templates/header', $data);
      $this->load->view('navbar_main', $data);
      $this->load->view('navbar_sub', $data);
      $this->load->view('certificate/index', $data);
      $this->load->view('templates/footer');
  }

  /*
  *Load leaving certificate view
  */
  function create_leaving_certificate() {
    $data['user_type'] = $this->session->userdata['user_type'];
    $data['page_title'] = "Certificate";
    $data['navbar'] = "admin";

    $this->load->view('templates/header', $data);
    $this->load->view('navbar_main', $data);
    $this->load->view('navbar_sub', $data);
    $this->load->view('certificate/leaving_certificate', $data);
    $this->load->view('templates/footer');
  }

  /*
  *Load character certificate view
  */
  function create_character_certificate() {
    $data['user_type'] = $this->session->userdata['user_type'];
    $data['page_title'] = "Certificate";
    $data['navbar'] = "admin";

    $this->load->view('templates/header', $data);
    $this->load->view('navbar_main', $data);
    $this->load->view('navbar_sub', $data);
    $this->load->view('certificate/character_certificate', $data);
    $this->load->view('templates/footer');
  }

  function genarate_leaving_certificate() {
    $this->load->view('development');
  }

  function genarate_character_certificate() {
    $this->load->view('development');
  }

  /*
  *Search a student
  */
  function search_students() {
    $std_id = $this->input->post('student_id');
    $std_name = $this->input->post('std_name');

    $data['name'] = $this->Student_Model->get_student_only($std_id);
    var_dump($data['name']);
  }

  /**
     * generate the leaving certificate
     */
    function generate_leaving() {
        $id = $this->input->post('tpe');
        $this->certificate_model->generate_leaving($id);
    }

    /**
     * generate the leaving certificate
     */
    function generate_character() {
        $id = $this->input->post('tpe');
        $this->certificate_model->generate_character($id);
    }

     /**
     * This function is used to download the html page. use dompdf library for that
     *
     * @param int $l
     */
    function report_pdf_leaving() {
        if (!$this->session->userdata('id')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $this->load->helper(array('dompdf', 'file'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('student_id', 'student_id', '');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        date_default_timezone_set('Asia/Kolkata'); //get the timezone
        if ($this->form_validation->run() == FALSE) {
            $data['page_title'] = "Leaving Certificate";
            $data['navbar'] = 'admin';
            $data['value'] = 0;
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('certificate/character_certificate', $data);
            $this->load->view('/templates/footer');
        } else {
            $student_id = $this->input->post('student_id');
                $data['school_name'] = "D. S. Senanayake College";
                $data['result'] = $this->Student_Model->student_certificate($student_id);
                // var_dump($student_id);
                // var_dump($data['result']);
                $filename = "Leaving Certificate";
                $html = $this->load->view('certificate/leaving_pdf', $data, true);
                pdf_create($html, $filename);
                //For news field
                // $tech_id = $this->session->userdata('id');
                // $tech_details = $this->teacher_model->user_details($tech_id);
                // $this->News_Model->insert_action_details($tech_id, "Generate teacher report", $tech_details->profile_img, $tech_details->first_name);
                //////
            
        }
    }

    /**
     * This function is used to download the html page. use dompdf library for that
     *
     * @param int $l
     */
    function report_pdf_character() {
        if (!$this->session->userdata('id')) {
            redirect('login', 'refresh');
        }
        $data['user_type'] = $this->session->userdata['user_type'];
        $this->load->helper(array('dompdf', 'file'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('student_id', 'student_id', '');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
        date_default_timezone_set('Asia/Kolkata'); //get the timezone
        if ($this->form_validation->run() == FALSE) {
            $data['page_title'] = "Character Certificate";
            $data['navbar'] = 'admin';
            $data['value'] = 0;
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('certificate/character_certificate', $data);
            $this->load->view('/templates/footer');
        } else {
            $student_id = $this->input->post('student_id');
            $data['description'] = $this->input->post('description');
                $data['school_name'] = "D. S. Senanayake College";
                $data['result'] = $this->Student_Model->student_certificate($student_id);
                // var_dump($student_id);
                // var_dump($data['result']);
                $filename = "Character Certificate";
                $html = $this->load->view('certificate/character_pdf', $data, true);
                pdf_create($html, $filename);
                //For news field
                // $tech_id = $this->session->userdata('id');
                // $tech_details = $this->teacher_model->user_details($tech_id);
                // $this->News_Model->insert_action_details($tech_id, "Generate teacher report", $tech_details->profile_img, $tech_details->first_name);
                //////
            
        }
    }

}
