<?php
/**
 * Ecole - CLASS Controller
 *
 * Handles the Class Methods
 *
 * @author  K.H.M Vidyaratna
 */
class Classes extends CI_Controller {

    function __construct() {
        parent::__construct();


        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }

        $this->load->model('class_model');
        $this->load->helper('class');
        $this->load->model('teacher_model');
    }

    /*
     * Main function that loads classes
     */
    function index() {
        $data['page_title'] = "Class Management";
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "admin";

        $grade = $this->input->get('grade');
        $academic_year = $this->input->get('ay');

        if (!$academic_year) {
            $academic_year = date('Y');
        }

        $data['result'] = $this->class_model->get_classes($grade, $academic_year);
        $data['students_without_class'] = $this->class_model->get_students_without_class();
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('classes/index', $data);
        $this->load->view('/templates/footer');
    }

    /*
     * Interface that loads create class
     *
     */

    //this will create the page

    function create() {
        $data['page_title'] = "Class Management";
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "admin";
        $data['grades'] = $this->class_model->get_grades();


        $data['teachers'] = $this->teacher_model->get_teacher_list();

        // if this is a redirect from successful form submission, get the success message.
        $data['succ_message'] = $this->session->flashdata('succ_message');

        $this->form_validation->set_rules('grade', 'Grade', 'required|callback_grade_selected');
        $this->form_validation->set_rules('class_name', 'Class Name', 'required|callback_validate_class_name');
        if ($this->input->post('class_teacher')) {
            $this->form_validation->set_rules('class_teacher', 'Class Teacher', 'callback_validate_teacher_class');
        }

        if (!$this->form_validation->run()) {
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('classes/create_class', $data);
            $this->load->view('/templates/footer', $data);
        } else {
            $class = array(
                'grade_id' => $this->input->post('grade'),
                'name' => $this->input->post('class_name'),
                'academic_year' => date('Y'),
            );

            if ($this->input->post('class_teacher') != 'select_teacher') {
                $class['teacher_id'] = $this->input->post('class_teacher');
            }
            $this->class_model->create_class($class);
            $this->session->set_flashdata('succ_message', "Class Created");
            redirect('classes/create');
        }
    }

    function view_class($class_id) {
        $data['class'] = $this->class_model->get_class($class_id);
        $data['class_students'] = $this->class_model->get_class_students($class_id);
        $data['page_title'] = "{$data['class']->name} : Class Management";
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "admin";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('classes/view_class', $data);
        $this->load->view('/templates/footer', $data);
    }

    function view_class_teacher() {
        $id = $this->session->userdata['id'];
        $teacher_id = $this->teacher_model->get_teacher_id($id);
        $class_id = $this->class_model->get_class_id($teacher_id);
        $data['class'] = $this->class_model->get_class($class_id);
        $data['class_students'] = $this->class_model->get_class_students($class_id);
        $data['page_title'] = "{$data['class']->name} : Class Management";
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "teacher";
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('classes/view_class', $data);
        $this->load->view('/templates/footer', $data);
    }

    function assign_to_class($class_id) {
        $data['class'] = $this->class_model->get_class($class_id);
        $data['class_students'] = $this->class_model->get_class_students($class_id);
        $data['page_title'] = "Assign Students to {$data['class']->name} : Class Management";
        $data['students_eligible'] = $this->class_model->get_students_without_class($data['class']->grade_id);
        $data['students_in'] = $this->class_model->get_class_students($class_id);
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "admin";

//        var_dump($data['class']);
//        var_dump($data['class_students']);
//
//        var_dump($data['students_eligible']);

        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('classes/assign_students_to_class', $data);
        $this->load->view('/templates/footer', $data);
    }

    function process_student_class_assignment($class_id) {
        $students_eligible = $this->input->post('students-eligible');
        $students_in = $this->input->post('students-in');
        $this->class_model->assign_students_to_class($class_id, $students_eligible, $students_in);
        redirect("classes/view_class/{$class_id}");
    }

    /*
     * If this class teacher already assigned to class, return FALSE
     * else return TRUE
     */

    function validate_teacher_class() {
        $teacher_id = $this->input->post('class_teacher');
        if ($this->class_model->teacher_assigned_to_class($teacher_id, date('Y'))) {
            $this->form_validation->set_message('validate_teacher_class', 'Selected Teacher Already Assigned to a Class');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*
     * Returns false if we already have a class name for given class name in academic year.
     */

    function validate_class_name() {
        $class_name = $this->input->post('class_name');
        $grade_id = $this->input->post('grade');
        if ($this->class_model->class_name_already_have($class_name, $grade_id, date('Y'))) {
            $this->form_validation->set_message('validate_class_name', "Class name already have");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function edit_class($class_id) {

        $data['page_title'] = "Class Management";
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "admin";
        $data['teachers'] = $this->teacher_model->get_teacher_list();
        $data['class'] = $this->class_model->get_class($class_id);


        $this->form_validation->set_rules('class_teacher', 'Class Teacher', 'callback_validate_teacher_class');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('classes/edit_class', $data);
            $this->load->view('/templates/footer', $data);
        } else {
            $update_data = array(
                'teacher_id' => $this->input->post('class_teacher'),
            );
            $data['succ_message'] = "Class Successfully Edited";
            $this->class_model->update_class($class_id, $update_data);
            $data['class'] = $this->class_model->get_class($class_id);
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('classes/edit_class', $data);
            $this->load->view('/templates/footer', $data);
        }
    }

    function remove_class_teacher($class_id) {
        $this->class_model->remove_class_teacher($class_id);
        redirect("classes/edit_class/{$class_id}");
    }

    function students_without_class() {
        $data['page_title'] = "Class Management";
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "admin";

        $grade = (!$this->input->get('grade') ? NULL : $this->input->get('grade'));
        $academic_year = $this->input->get('ay');

        if (!$academic_year) {
            $academic_year = date('Y');
        }

        $data['students_without_class'] = $this->class_model->get_students_without_class($grade);
        //var_dump($data['students_without_class']);
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('classes/students_without_class', $data);
        $this->load->view('/templates/footer');
    }

    function reports() {

        $data['page_title'] = "Class Management";
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "admin";
        $data['academic_year_list'] = $this->class_model->get_academic_years();
        $data['grade_list'] = $this->class_model->get_grades();
        $this->form_validation->set_rules('report_type', 'Report Type', 'callback_report_option_selected');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('classes/reports', $data);
            $this->load->view('/templates/footer');
        } else {

            $data['page_title'] = "Class Management";

            $report_option = (int) $this->input->post('report_type');
            $data['academic_year'] = $this->input->post('academic_year');
            if ((int) $this->input->post('grade') === 0) {
                $data['grade'] = NULL;
            } else {
                $data['grade'] = $this->input->post('grade');
            }

//        var_dump($data['academic_year']);
//        var_dump($data['grade']);
            switch ($report_option) {
                case '1':
                    $data['classes'] = $this->class_model->get_classes($data['grade'], $data['academic_year']);
                    $this->load->view('templates/header', $data);
                    $this->load->view('classes/report_student_class', $data);
                    $this->load->view('/templates/footer');
                    break;
                default:
                    show_404();
            }
        }
    }

    function report_generate() {
        $data['page_title'] = "Class Management";

        $report_option = (int) $this->input->post('report_type');
        $data['academic_year'] = $this->input->post('academic_year');
        if ((int) $this->input->post('grade') === 0) {
            $data['grade'] = NULL;
        } else {
            $data['grade'] = $this->input->post('grade');
        }

//        var_dump($data['academic_year']);
//        var_dump($data['grade']);
        switch ($report_option) {
            case '1':
                $data['classes'] = $this->class_model->get_classes($data['grade'], $data['academic_year']);
                $this->load->view('templates/header', $data);
                $this->load->view('classes/report_student_class', $data);
                $this->load->view('/templates/footer');
                break;
            default:
                show_404();
        }
    }

    function report_option_selected(){
        $report_option = (int)$this->input->post('report_type');
        if($report_option === 0){
            $this->form_validation->set_message('report_option_selected', 'Please select a report type');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function update_grade() {
      $data['user_type']=$this->session->userdata('user_type');
      $data['page_title'] = "Classes";
      $data['navbar'] = 'admin';

      $data['succ_message'] = $this->session->flashdata('succ_message');

      $this->form_validation->set_rules('grade', 'Grade', 'required|callback_grade_selected');

      if ($this->form_validation->run()) {
        $grade = $this->input->post('grade');
        $this->class_model->update_grade($grade);
        $this->session->set_flashdata('succ_message', "Grade Updated");
        redirect('classes/update_grade');
      }
      else {
        $this->load->view('templates/header',$data);
        $this->load->view('navbar_main',$data);
        $this->load->view('navbar_sub',$data);
        $this->load->view('classes/update_grade_next_year');
        $this->load->view('templates/footer',$data);
      }

    }

}
