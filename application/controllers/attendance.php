<?php

/**
 * Ecole - Attendance Controller
 *
 * Controller for attendance recording functions
 *
 * @author  Anuradha H.S
 */
class Attendance extends CI_Controller {

    /**
     * Class constructor
     */
    function __construct() {
        parent::__construct();
        $this->load->model('attendance_model');
        $this->load->model('student_model');
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->library('session');
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
    }

    /**
     * This loads the main interface for recording attendaces of teachers.
     */
    function index() {
        $data['page_title'] = "Attendance";
        $data['navbar'] = "attendance";
        $data['date'] = date('Y-m-d');

        $data['user_type'] = $this->session->userdata['user_type'];

        $this->form_validation->set_rules("signature_no", "Signature Number", "required|integer|callback_add_record");

        if ($this->form_validation->run() == FALSE) {
            /*
             * If the form validation goes wrong, no worries. We will display watever the values
             * recorded in the database currently. We are using a callback function to insert the data
             * into the database and it will do all the hard work.
             */
            $data['result'] = $this->attendance_model->get_all_temp_records();
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('attendance/att_record_form', $data);
            $this->load->view('/templates/footer');
        } else {
            /*
             * What if the form validation goes right? We made it simple by using the callback function.
             * If you are still unsure what the heck is happening reffer to the callback function defined below.
             */

            $data['result'] = $this->attendance_model->get_all_temp_records();
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('attendance/att_record_form', $data);
            $this->load->view('/templates/footer');
        }
    }

    /**
     * Used to add attending record. Acts as a callback form validation function
     * to the attendance record form.
     * @return boolean
     */
    function add_record() {
        /*
         * First we check the signature number already in the attendance recording database. If it's already in the
         * database, why again?
         */

        $signature_no = $this->input->post('signature_no');
        if ($this->attendance_model->is_already_recorded($signature_no)) {
            $this->form_validation->set_message('add_record', "Attendace for "
                    . "<strong>Signature No: {$signature_no}</strong> is already recorded ");

            return FALSE;
        }

        /*
         * Is the inserted signature number actually belongs to a teacher?
         */

        if (!$this->attendance_model->is_valid_signature_no($signature_no)) {
            $this->form_validation->set_message('add_record', "There's no teacher with "
                    . "<strong>Signature No: {$signature_no}</strong>");

            return FALSE;
        }

        /*
         * Enough validations. Let's do the work!
         */
        if ($this->attendance_model->add_record($signature_no)) {
            return TRUE;
        }
    }

    /**
     * This function is created to delete a record already added to the temp table that contains attendace details.
     * @param int $signature_no Signature number of the added attendance record
     */
    function delete_record($signature_no) {
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['page_title'] = "Attendance";
        $data['navbar'] = "attendance";

        if ($this->attendance_model->delete_record($signature_no)) {
            $data['result'] = $this->attendance_model->get_all_temp_records();
            $data['del_msg'] = "Record removed for {$signature_no}";
            $data['date'] = date('Y-m-d');
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('attendance/att_record_form', $data);
            $this->load->view('/templates/footer');
        }
    }

    /**
     * Responsible for generating the confirmation view of the current date's
     * temporary attendance records.
     */
    function generate_report() {
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['date'] = date('Y-m-d');
        $data['navbar'] = "attendance";
        $data['page_title'] = 'Attendance Report For: ' . $data['date'];


        $data['result'] = $this->attendance_model->get_all_temp_records();
        $data['absent_list'] = $this->attendance_model->get_temp_absent_records();

        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('attendance/report', $data);
        $this->load->view('/templates/footer');
    }

    /*
     * Responsible for generating the report PDF.
     */

    function report_pdf() {
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $this->load->helper(array('dompdf', 'file'));
        $date_string = "%Y-%m-%d";
        $time = time();
        $data['date'] = mdate($date_string, $time);

        /**
         * REMINDER!
         * School name is hardcoded here. Change it to get the value from database so it can be extended
         * to different schools.
         */
        $data['school_name'] = "D. S. Senanayake College";


        $data['result'] = $this->attendance_model->get_all_temp_records();
        $filename = "attendance_report_" . $data['date'];
        // page info here, db calls, etc.
        $html = $this->load->view('attendance/report_pdf', $data, true);
        pdf_create($html, $filename);
        //or
        //$data = pdf_create($html, '', false);
        //write_file('name', $data);
        $this->attendance_model->save_attendance();
        $this->attendance_model->delete_temp();
    }

    function confirm() {
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['date'] = date('Y-m-d');
        $data['navbar'] = "attendance";
        $data['page_title'] = 'Attendance Report For: ' . $data['date'];


        $this->attendance_model->save_attendance();
        $absent_list = $this->attendance_model->get_temp_absent_records();
        $this->attendance_model->save_absent($absent_list);
        $this->attendance_model->delete_temp();

        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('attendance/confirmation', $data);
        $this->load->view('/templates/footer');
    }

    function present_pdf($date = "") {
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['report_type'] = "AT";
        $data['date'] = "";

        if ($date == ""):
            $data['date'] = date('Y-m-d');
        else :
            $data['date'] = $date;
        endif;

        $data['page_title'] = "Attendance Report For: {$data['date']}";

        $data['result'] = $this->attendance_model->search_attendance($data['date']);
        $this->load->view('attendance/report_pdf', $data);
    }

    function absent_pdf($date = "") {
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['report_type'] = "AB";
        $data['date'] = "";

        if ($date == ""):
            $data['date'] = date('Y-m-d');
        else :
            $data['date'] = $date;
        endif;

        $data['page_title'] = "Absent Report For: {$data['date']}";
        $data['result'] = $this->attendance_model->get_absent_list($data['date']);
        $this->load->view('attendance/report_pdf', $data);
    }

    function search_report_pdf($date) {
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];


        $this->load->helper(array('dompdf', 'file'));

        /*
         * REMINDER!
         * School name is hardcoded here. Change it to get the value from database so it can be extended
         * to different schools.
         */
        $data['date'] = $date;
        $data['school_name'] = "D. S. Senanayake College";
        $data['result'] = $this->attendance_model->search_attendance($date);
        $filename = "attendance_report_" . $date;
        $html = $this->load->view('attendance/report_pdf', $data, true);
        pdf_create($html, $filename);
    }

    /**
     * Interface to generate attendance reports
     */
    function reports() {
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['page_title'] = "Attendance Reports";
        $data['navbar'] = "attendance";

        $this->form_validation->set_rules("date", "Date", "required|callback_have_reports_for");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('attendance/report_search', $data);
            $this->load->view('/templates/footer');
        } else {
            $data['date'] = $this->input->post('date');
            $data['result'] = $this->attendance_model->search_attendance($data['date']);
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('attendance/search_results', $data);
            $this->load->view('/templates/footer');
        }
    }

    /**
     * This function is used to check whether there are teacher attendence reports for a given
     * date. If not available, we can display that there are no reports.
     * @return bool
     */
    function have_reports_for() {
        $date = $this->input->post('date');
        if (!$this->attendance_model->search_attendance($date)) {
            $this->form_validation->set_message('have_reports_for', "Attendance for date <strong>{$date}</strong> is not yet recorded.");
            return FALSE;
        } else {
            return TRUE;
        }
    }


    #################### FOR STUDENT #####################

    /**
     * This is for retrieving attendance recodes of students
     */
    public function load_students() {
        if (!$this->session->userdata('id')) {
            redirect('login', 'refresh');
        }

        $data['query2'] = $this->attendance_model->load_student_attendance_log();
        $data['result2'] = $data['query2']->result();
        $data["query"] = $this->student_model->get_all_students_2();
        $data['result'] = $data['query']->result();
        $data['page_title'] = "Student attendance";
        $data['navbar'] = 'attendance';
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['page_title'] = "Manage Student";
        $this->load->view('/templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('/attendance/student_attendance', $data);
        $this->load->view('/templates/footer');
    }

    /**
     * This is for the student attendance marking..we get the absent students (checked rows)
     *  and put them to db ..
     */
    public function get_selected_students() {

        $attendance_date = $this->input->post('attendancedate');
        $user_id = $this->session->userdata('id');
        $absent_students = $this->input->post('checkboxs');

        $today = date('Y-m-d');
        if ($attendance_date <= $today) {
            if (!$absent_students) {
                $absent_students = array();
            }

            $students = $this->attendance_model->get_all_student_ids()->result();
            $all_students = array();
            foreach ($students as $value) {
                array_push($all_students, $value->id);
            }


            $present_students = array_diff($all_students, $absent_students);

            if ($this->attendance_model->check_student_attendance_log($attendance_date)) {

                $this->session->set_flashdata('err_message', 'Student Attendance Already Marked for <b>' . $attendance_date . '</b>');
                redirect('attendance/load_students', 'refresh');
            } else {

                if ($this->attendance_model->save_attendence_students($absent_students, $present_students, $attendance_date, $user_id)) {

                    $this->session->set_flashdata('succ_message', 'Class Attendance Marked Successfully for <b>' . $attendance_date . '</b>');
                    redirect('attendance/load_students', 'refresh');
                } else {
                    $this->session->set_flashdata('err_message', 'Error Occured');
                    redirect('attendance/load_students', 'refresh');
                }
            }
        } else {
            $this->session->set_flashdata('err_message', 'Cannot mark attendance for a future date');
            redirect('attendance/load_students', 'refresh');
        }
    }

    /*
     * getting the student attendence recodes for a speific student attendance log detail
     */

    public function view_one_attendance() {
        $id = $this->uri->segment(3);
        $data['query'] = $this->attendance_model->get_attendance_data($id);
        $data['result'] = $data['query']->result();

        $this->load->view('attendance/edit_student_attendance_pop', $data);
    }

    /*
     * edit  student attendence recodes for a speific student attendance log detail
     */

    public function edit_one_attendance() {

        $data = json_decode($this->input->post('data'));
        $attendance_date = json_decode($this->input->post('date'));


        $new_absent = array();
        foreach ($data as $d) {
            array_push($new_absent, $d);
        }

        $students = $this->attendance_model->get_all_student_ids()->result();
        $all_students = array();
        foreach ($students as $value) {
            array_push($all_students, $value->id);
        }

        $new_present = array_diff($all_students, $new_absent);

        if ($this->attendance_model->edit_attendence_students($new_absent, $new_present, $attendance_date)) {

            echo "Recode updated sucessfully";
        } else {
            echo "Error occured";
        }
    }

}
