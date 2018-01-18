<?php
/**
 * Created by PhpStorm.
 * User: Pc Technologies
 * Date: 7/5/2016
 * Time: 6:59 PM
 */

class marks extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('marks_model');
        $this->load->helper('date');

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }
    
  /**
   * Load enter marks page
   */
  function index()
  {
      $data['page_title'] = " Student Grading Management";
      $data['user_type'] = $this->session->userdata['user_type'];
      $data['navbar'] = "admin";
      $data['ids'] = $this->marks_model->get_all_grades();
      //var_dump($data['ids']);

      $this->load->view('templates/header', $data);
      $this->load->view('navbar_main', $data);
      $this->load->view('navbar_sub', $data);
      $this->load->view('Marks/exam_details', $data);
      $this->load->view('templates/footer');

  }
  /**
  * enter exam marks
  */
  function exam_marks(){
      $data['page_title'] = " Student Grading Management";
      $data['user_type'] = $this->session->userdata['user_type'];
      $data['navbar'] = "admin";
      $data['ids'] = $this->marks_model->get_all_grades();

     $this->load->library('form_validation');

      $this->form_validation->set_rules('examname','examname','required|min_length[6]');
      $this->form_validation->set_rules('year','year','required');
      $this->form_validation->set_rules('grade', 'grade', 'required|callback_grade_selected');
      $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

      if ($this->form_validation->run() == FALSE) {
          $this->load->view('templates/header', $data);
          $this->load->view('navbar_main', $data);
          $this->load->view('navbar_sub', $data);
          $this->load->view('Marks/exam_details', $data);
          $this->load->view('templates/footer');
      }
      else{
          $examname = $this->input->post('examname');
          $grade = $this->input->post('grade');
          $year = $this->input->post('year');
          $start_date = $this->input->post('start_date');
          $end_date = $this->input->post('end_date');

          $this->marks_model->enter_marks1($examname,$year,$grade,$start_date,$end_date);

          $data['succ_message'] = "Succesfully inserted";
          $this->load->view('templates/header', $data);
          $this->load->view('navbar_main', $data);
          $this->load->view('navbar_sub', $data);
          $this->load->view('Marks/exam_details', $data);
          $this->load->view('templates/footer');
      }

       //$data['exams'] = $this->marks_model->enter_marks();
  }
  /**
  * marks lists can be viewed.
  */
  function view_marks() {
      $data['page_title'] = " Student Grading Management";
      $data['user_type'] = $this->session->userdata['user_type'];
      $data['navbar'] = "admin";

      $data['subjects'] = $this->marks_model->get_all_subjects();
      $data['names'] = $this->marks_model->get_examination_names();

      $this->load->library('form_validation');

      $this->form_validation->set_rules('name','name','required|min_length[6]');
      $this->form_validation->set_rules('student_id','student_id','required');
      $this->form_validation->set_rules('subject_id','subject_id','required');
      $this->form_validation->set_rules('marks', 'marks', 'required');
      $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

      if ($this->form_validation->run() == FALSE) {
          $this->load->view('templates/header', $data);
          $this->load->view('navbar_main', $data);
          $this->load->view('navbar_sub', $data);
          $this->load->view('Marks/view_marks', $data);
          $this->load->view('templates/footer');
      }
      else{
          $name = $this->input->post('name');
          $student_id = $this->input->post('student_id');
          $subject_id = $this->input->post('subject_id');
          $marks = $this->input->post('marks');

          $this->marks_model->enter_grade($name,$student_id,$subject_id,$marks);

          $data['succ_message'] = "Succesfully inserted";

          $this->load->view('templates/header', $data);
          $this->load->view('navbar_main', $data);
          $this->load->view('navbar_sub', $data);
          $this->load->view('Marks/view_marks', $data);
          $this->load->view('templates/footer');

      }

  }

    function mark_marks() {
        $data['page_title'] = " Student Grading Management";
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "admin";

        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('Marks/exam_marks', $data);
        $this->load->view('templates/footer');
    }
  /**
  * Generate reports of marks
  */
  function genarate_reports() {
    $data['page_title'] = " Student Grading Management";
    $data['user_type'] = $this->session->userdata['user_type'];
    $data['navbar'] = "admin";

    $this->load->view('templates/header', $data);
    $this->load->view('navbar_main', $data);
    $this->load->view('navbar_sub', $data);
    $this->load->view('Marks/genarate_reports', $data);
    $this->load->view('templates/footer');
  }

    function grade_selected() {
        $grade = $this->input->post('grade');
        if ($grade == 'select_grade') {
            $this->form_validation->set_message('grade_selected', 'Please select a grade');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
