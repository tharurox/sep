<?php
/**
 * Ecole - Year Controller
 *
 * Handles the Year Planner Methods
 *
 * @author  V.I.Galhena
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Year extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Year_Model');
        $this->load->model('Teacher_Model');
        $this->load->model('News_Model');
    }

    /***
     * Main Index Method for Year Controller
     * Display related Options for different Users
     * Admin can add/ edit academic years
     * Students and teachers can view the current academic year
     */
    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $data['navbar'] = "admin";

        $data['page_title'] = "Year Planer";
        $data['first_name'] = $this->session->userdata('first_name');
        $userid = $this->session->userdata['id'];


        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];


        //Getting Current Academic Year Details
        $data['current_year'] = $this->Year_Model->get_academic_year_details();

        //Get All Academic Years
        $data['all_years'] = $this->Year_Model->get_all_academic_years();

        //For Admin Views
        if ($data['user_type'] == 'A') {

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);

            //View Year Planer Admin
            $this->load->view('year/year');

            $this->load->view('/templates/footer');
        } elseif ($data['user_type'] == 'T') {

            // //Get info from the Academic Year
            // $yearid;
            // $academic_year = $this->Year_Model->get_academic_year_details();
            // foreach ($academic_year as $row) {
            //     $yearid = $row->id;
            // }

            // //Get Year Details
            // $data['year'] = $this->Year_Model->get_academic_year_by_id($yearid);


            // //Passing it to the View
            // $this->load->view('templates/header', $data);
            // $this->load->view('navbar_main', $data);
            // $this->load->view('navbar_sub', $data);

            // //View Year Planer  Teacher
            // $this->load->view('year/view_year_teacher');

            // $this->load->view('/templates/footer');


            // Redirect Teachers to Calendar View
            redirect('year/current_adademic_year', 'refresh');
        } else {
            redirect('year/current_adademic_year', 'refresh');
        }
    }

    /**
     *   Add Academic Year Function
     *  This Function will help you to add new Academic Years to the System
     */

    public function current_adademic_year() {
        $data['navbar'] = "admin";

        $data['page_title'] = "Year Planer";
        $data['first_name'] = $this->session->userdata('first_name');
        $userid = $this->session->userdata['id'];

        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];
        $data['details'] = $this->Year_Model->get_academic_year_details();

        $details = $this->Year_Model->get_academic_year_details();

        foreach ($details as $row) {
            $string = $row->structure;
            $partial = explode(', ', $string);
            $final = array();
            array_walk($partial, function($val,$key) use(&$final){
                list($key, $value) = explode('=', $val);
                $final[$key] = $value;
            });
        }
        $data['final'] = $final;

        //Passing it to the View
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);

        //View Year Planer
        $this->load->view('year/current_adademic_year');

        $this->load->view('/templates/footer');
    }

    /*
     * Function to add new Academic years to the system
     */
    public function add_academic_year() {
        $data['navbar'] = "admin";

        $data['page_title'] = "Year Planer";
        $data['first_name'] = $this->session->userdata('first_name');
        $userid = $this->session->userdata['id'];

        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        //Passing it to the View
        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);

        //View Year Planer
        $this->load->view('year/add_year');

        $this->load->view('/templates/footer');
    }

    /*
     * Add Academic year to the database
     * Takes new Values from the POST Data and Feed them to the Database
     */

    public function add_year() {
        $data['navbar'] = "admin";

        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['page_title'] = "Year Planer";
        $data['first_name'] = $this->session->userdata('first_name');
        $userid = $this->session->userdata['id'];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_name', 'Name', "required|xss_clean");
        $this->form_validation->set_rules('txt_startdate', 'Start Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_enddate', 'End Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_t1_startdate', 'Term 01 Start Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_t1_enddate', 'Term 01 End Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_t2_startdate', 'Term 02 Start Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_t2_enddate', 'Term 02 End Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_t3_startdate', 'Term 03 Start Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_t3_enddate', 'Term 03 End Date', "required|xss_clean");


        if ($this->form_validation->run() == FALSE) {

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('year/add_year', $data);
            $this->load->view('/templates/footer');
        } else {

            // Save Form Data
            $name = $this->input->post('txt_name');
            $start_date = $this->input->post('txt_startdate');
            $end_date = $this->input->post('txt_enddate');
            $status = $this->input->post('cmb_status');
            $t1_start_date = $this->input->post('txt_t1_startdate');
            $t1_end_date = $this->input->post('txt_t1_enddate');
            $t2_start_date = $this->input->post('txt_t2_startdate');
            $t2_end_date = $this->input->post('txt_t2_enddate');
            $t3_start_date = $this->input->post('txt_t3_startdate');
            $t3_end_date = $this->input->post('txt_t3_enddate');


            $noofdates = date_diff(date_create($start_date), date_create($end_date));
            //No of days in the Year
            $sdate = $noofdates->format("%a");

            $dateold = date_diff(date_create($start_date), date_create($end_date));
            $dateoldc = $dateold->format("%R%a");

            //Date Validation
            if ($sdate == '0') {
                $data['error_message'] = "Start date cannot be the End date of Academic Year";
            } elseif ($end_date < $start_date) {
                $data['error_message'] = "Start Date cannot be greater than End date";
            }
            //Date Validations for Terms
            elseif ($start_date > $t1_start_date) {
                $data['error_message'] = "Term 01 Start date cannot be less than the Year Start date";
            } elseif ($t1_start_date > $t2_start_date) {
                $data['error_message'] = "Term 02 Start date cannot be less than the Term 1 Start date";
            } else {

                //Initiating the Array
                $dataset = array();
                $newdate = $start_date;

                //Running a forloop till the end of end date with value 1
                for ($x = 0; $x <= $sdate; $x++) {
                    $dataset[$newdate] = "1";
                    $newdate = strtotime($newdate);
                    $newdate = strtotime("+1 day", $newdate);
                    $newdate = date('Y-m-d', $newdate);
                }

                $noofdates = date_diff(date_create($t1_start_date), date_create($t1_end_date));

                //No of days in between Term 1 start and end
                $t1days = $noofdates->format("%a");
                $newdate = $t1_start_date;
                //Overiding the values on term 01
                for ($i = 0; $i <= $t1days; $i++) {
                    $dataset[$newdate] = "0";
                    $newdate = strtotime($newdate);
                    $newdate = strtotime("+1 day", $newdate);
                    $newdate = date('Y-m-d', $newdate);
                }

                $noofdates = date_diff(date_create($t2_start_date), date_create($t2_end_date));
                //No of days in between Term 2 start and end
                $t1days = $noofdates->format("%a");
                $newdate = $t2_start_date;
                //Overiding the values on term 02
                for ($i = 0; $i <= $t1days; $i++) {
                    $dataset[$newdate] = "0";
                    $newdate = strtotime($newdate);
                    $newdate = strtotime("+1 day", $newdate);
                    $newdate = date('Y-m-d', $newdate);
                }

                $noofdates = date_diff(date_create($t3_start_date), date_create($t3_end_date));
                //No of days in between Term 3 start and end
                $t1days = $noofdates->format("%a");
                $newdate = $t3_start_date;
                //Overiding the values on term 02
                for ($i = 0; $i <= $t1days; $i++) {
                    $dataset[$newdate] = "0";
                    $newdate = strtotime($newdate);
                    $newdate = strtotime("+1 day", $newdate);
                    $newdate = date('Y-m-d', $newdate);
                }

                $newdate = $start_date;

                //Add 1 to Saturdays and Sundays again
                for ($x = 0; $x <= $sdate; $x++) {
                    if (date('w', strtotime($newdate)) == 6 || date('w', strtotime($newdate)) == 0) {
                        $dataset[$newdate] = "1";
                    }
                    $newdate = strtotime($newdate);
                    $newdate = strtotime("+1 day", $newdate);
                    $newdate = date('Y-m-d', $newdate);
                }

                //Data Passing
                $data['daysof'] = $sdate;
                $data['dataarr'] = $dataset;

                $stucture = http_build_query($dataset, '', ', ');


                if ($this->Year_Model->add_new_academic_year($name, $start_date, $end_date, $status, $t1_start_date, $t1_end_date, $t2_start_date, $t2_end_date, $t3_start_date, $t3_end_date, $stucture) == TRUE) {
                    $data['succ_message'] = "Academic Year Added Sucessfully";
                    //For news field
                    $tech_id = $this->session->userdata('id');
                    $tech_details = $this->Teacher_Model->user_details($tech_id);
                    $this->News_Model->insert_action_details($tech_id, "Acedamic year has been created", $tech_details->profile_img, $tech_details->first_name);
                    //////
                    //Passing it to the View
                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('year/add_year', $data);
                    $this->load->view('/templates/footer');
                } else {
                    $data['error_message'] = "Failed to Add";

                    //Passing it to the View with errors
                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('year/add_year', $data);
                    $this->load->view('/templates/footer');
                }
            }
        }
    }

    /*
     * Function to View Acadamic Year
     *
     * @param  int
     *
     * @return Results
     */
    public function view_year($id) {
        $data['navbar'] = "admin";

        $data['page_title'] = "Year Planer";
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

     /*
     * Function to View Edit Acadamic Year Page
     *
     * @param  int
     *
     * @return bool
     */
    public function edit_year($id) {
        $data['navbar'] = "admin";

        $data['page_title'] = "Year Planer";
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
        $this->load->view('year/edit_year', $data);

        $this->load->view('/templates/footer');
    }

     /*
     * Function to Edit Acadamic Year
     *
     * @param  int
     *
     * @return Results
     */
    public function edit_academic_year($id) {
        $data['navbar'] = "admin";

        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['page_title'] = "Year Planer";
        $data['first_name'] = $this->session->userdata('first_name');
        $userid = $this->session->userdata['id'];

        //Year ID
        $data['year'] = $this->Year_Model->get_academic_year_by_id($id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_name', 'Name', "required|xss_clean");
        $this->form_validation->set_rules('txt_startdate', 'Start Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_enddate', 'End Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_t1_startdate', 'Term 01 Start Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_t1_enddate', 'Term 01 End Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_t2_startdate', 'Term 02 Start Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_t2_enddate', 'Term 02 End Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_t3_startdate', 'Term 03 Start Date', "required|xss_clean");
        $this->form_validation->set_rules('txt_t3_enddate', 'Term 03 End Date', "required|xss_clean");



        if ($this->form_validation->run() == FALSE) {

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('year/edit_year', $data);
            $this->load->view('/templates/footer');
        } else {

            $name = $this->input->post('txt_name');
            $start_date = $this->input->post('txt_startdate');
            $end_date = $this->input->post('txt_enddate');
            $status = $this->input->post('cmb_status');
            $t1_start_date = $this->input->post('txt_t1_startdate');
            $t1_end_date = $this->input->post('txt_t1_enddate');
            $t2_start_date = $this->input->post('txt_t2_startdate');
            $t2_end_date = $this->input->post('txt_t2_enddate');
            $t3_start_date = $this->input->post('txt_t3_startdate');
            $t3_end_date = $this->input->post('txt_t3_enddate');


            $noofdates = date_diff(date_create($start_date), date_create($end_date));
            //No of days in the Year
            $sdate = $noofdates->format("%a");

            $dateold = date_diff(date_create($start_date), date_create($end_date));
            $dateoldc = $dateold->format("%R%a");

            //Date Validation
            if ($sdate == '0') {
                $data['error_message'] = "Start date cannot be the End date of Academic Year";
            } elseif ($end_date < $start_date) {
                $data['error_message'] = "Start Date cannot be greater than End date";
            }
            //Date Validations for Terms
            elseif ($start_date > $t1_start_date) {
                $data['error_message'] = "Term 01 Start date cannot be less than the Year Start date";
            } elseif ($t1_start_date > $t2_start_date) {
                $data['error_message'] = "Term 02 Start date cannot be less than the Term 1 Start date";
            } else {

                //Initiating the Array
                $dataset = array();
                $newdate = $start_date;

                //Running a forloop till the end of end date with value 0
                for ($x = 0; $x <= $sdate; $x++) {
                    $dataset[$newdate] = "1";
                    $newdate = strtotime($newdate);
                    $newdate = strtotime("+1 day", $newdate);
                    $newdate = date('Y-m-d', $newdate);
                }

                $noofdates = date_diff(date_create($t1_start_date), date_create($t1_end_date));
                //No of days in between Term 1 start and end
                $t1days = $noofdates->format("%a");
                $newdate = $t1_start_date;
                //Overiding the values on term 01
                for ($i = 0; $i <= $t1days; $i++) {
                    $dataset[$newdate] = "0";
                    $newdate = strtotime($newdate);
                    $newdate = strtotime("+1 day", $newdate);
                    $newdate = date('Y-m-d', $newdate);
                }

                $noofdates = date_diff(date_create($t2_start_date), date_create($t2_end_date));
                //No of days in between Term 1 start and end
                $t1days = $noofdates->format("%a");
                $newdate = $t2_start_date;
                //Overiding the values on term 01
                for ($i = 0; $i <= $t1days; $i++) {
                    $dataset[$newdate] = "0";
                    $newdate = strtotime($newdate);
                    $newdate = strtotime("+1 day", $newdate);
                    $newdate = date('Y-m-d', $newdate);
                }

                $noofdates = date_diff(date_create($t3_start_date), date_create($t3_end_date));
                //No of days in between Term 1 start and end
                $t1days = $noofdates->format("%a");
                $newdate = $t3_start_date;
                //Overiding the values on term 01
                for ($i = 0; $i <= $t1days; $i++) {
                    $dataset[$newdate] = "0";
                    $newdate = strtotime($newdate);
                    $newdate = strtotime("+1 day", $newdate);
                    $newdate = date('Y-m-d', $newdate);
                }

                //Add 1 to Saturdays and Sundays again
                $newdate = $start_date;

                //Add 1 to Saturdays and Sundays again
                for ($x = 0; $x <= $sdate; $x++) {
                    if (date('w', strtotime($newdate)) == 6 || date('w', strtotime($newdate)) == 0) {
                        $dataset[$newdate] = "1";
                    }
                    $newdate = strtotime($newdate);
                    $newdate = strtotime("+1 day", $newdate);
                    $newdate = date('Y-m-d', $newdate);
                }


                //Data Passing
                $data['daysof'] = $sdate;
                $data['dataarr'] = $dataset;

                $stucture = http_build_query($dataset, '', ', ');

                if ($this->Year_Model->update_academic_year($id, $name, $start_date, $end_date, $status, $t1_start_date, $t1_end_date, $t2_start_date, $t2_end_date, $t3_start_date, $t3_end_date, $stucture) == TRUE) {
                    $data['succ_message'] = "Academic Year Edited Sucessfully";

                    //Year ID
                    $data['year'] = $this->Year_Model->get_academic_year_by_id($id);

                    //Passing it to the View
                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('year/edit_year', $data);
                    $this->load->view('/templates/footer');
                } else {
                    $data['error_message'] = "Failed to Edit";

                    //Year ID
                    $data['year'] = $this->Year_Model->get_academic_year_by_id($id);
                    //For news field
                    $tech_id = $this->session->userdata('id');
                    $tech_details = $this->Teacher_Model->user_details($tech_id);
                    $this->News_Model->insert_action_details($tech_id, "Update year plan", $tech_details->profile_img, $tech_details->first_name);
                    //////
                    //Passing it to the View with errors
                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('year/edit_year', $data);
                    $this->load->view('/templates/footer');
                }
            }
        }
    }

     /*
     * Function to Add Holiday to an Acadamic Year
     *
     * @param  int
     *
     * @return Results
     */
    public function add_holiday($id) {
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['navbar'] = "admin";

        $data['page_title'] = "Year Planer";
        $data['first_name'] = $this->session->userdata('first_name');
        $userid = $this->session->userdata['id'];

        //Year Details by ID
        $data['year'] = $this->Year_Model->get_academic_year_by_id($id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_date', 'Date', "required|xss_clean");


        if ($this->form_validation->run() == FALSE) {

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('year/edit_year', $data);
            $this->load->view('/templates/footer');
        } else {
            //Getting Form Data
            $holiday = $this->input->post('txt_date');
            $holiday_type = $this->input->post('cmb_status');

            //Date compare with the current year
            $year_start_date;
            $year_end_date;
            $year_details = $this->Year_Model->get_academic_year_by_id($id);
            foreach ($year_details as $list) {
                $year_start_date = $list->start_date;
                $year_end_date = $list->end_date;
            }
            if ($year_start_date < $holiday and $holiday > $year_end_date) {
                $data['error_message'] = "Holiday picked is not inside Currenct Acadamic Year";

                //Year Again
                $data['year'] = $this->Year_Model->get_academic_year_by_id($id);

                //Passing it to the View
                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('year/edit_year', $data);
                $this->load->view('/templates/footer');
            } else {

                //Year Details by ID
                $year_structure = $this->Year_Model->year_structure($id);

                //Building the Array from the Database
                $string = $year_structure;
                $partial = explode(', ', $string);
                $final = array();
                array_walk($partial, function($val, $key) use(&$final) {
                    list($key, $value) = explode('=', $val);
                    $final[$key] = $value;
                });


                // Updating the Array Value
                foreach ($final as $key => $value) {
                    if ($key == $holiday) {
                        //updating the temp_year_date
                        $this->Year_Model->add_temp_dates($id, $holiday, $value);
                        //Adding new values
                        $final[$key] = $holiday_type;
                    }
                }

                $stucture = http_build_query($final, '', ', ');

                if ($this->Year_Model->update_holiday($id, $stucture) == TRUE) {
                    $data['succ_message'] = "Holiday Added Sucessfully";

                    //Year Again
                    $data['year'] = $this->Year_Model->get_academic_year_by_id($id);

                    //Passing it to the View
                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('year/edit_year', $data);
                    $this->load->view('/templates/footer');
                } else {
                    $data['error_message'] = "Failed to Update";

                    //Year Again
                    $data['year'] = $this->Year_Model->get_academic_year_by_id($id);

                    //Passing it to the View
                    $this->load->view('templates/header', $data);
                    $this->load->view('navbar_main', $data);
                    $this->load->view('navbar_sub', $data);
                    $this->load->view('year/edit_year', $data);
                    $this->load->view('/templates/footer');
                }
            }
        }
    }

    /*
     * Function to Remove Holiday to an Acadamic Year
     *
     * @param  int
     * @param  date
     *
     * @return Results
     */
    public function remove_holiday($id, $date) {
        //Getting user type
        $data['user_type'] = $this->session->userdata['user_type'];

        $data['navbar'] = "admin";

        $data['page_title'] = "Year Planer";
        $data['first_name'] = $this->session->userdata('first_name');
        $userid = $this->session->userdata['id'];

        //Year Details by ID
        $data['year'] = $this->Year_Model->get_academic_year_by_id($id);

        //Get previous value from the Model
        $previous_status = $this->Year_Model->get_temp_dates($id, $date);
        $previous_id = $this->Year_Model->get_temp_dates_id($id, $date);


        // $data['error_message'] = $id ." ". $date ." ". $previous_status. "E";
        //Year Again
        $data['year'] = $this->Year_Model->get_academic_year_by_id($id);

        //Year Details by ID
        $year_structure = $this->Year_Model->year_structure($id);

        //Building the Array from the Database
        $string = $year_structure;
        $partial = explode(', ', $string);
        $final = array();
        array_walk($partial, function($val, $key) use(&$final) {
            list($key, $value) = explode('=', $val);
            $final[$key] = $value;
        });


        // Updating the Array Value
        foreach ($final as $key => $value) {
            if ($key == $date) {
                //Delete from database
                $this->Year_Model->delete_temp_date($previous_id);
                //Adding new values
                $final[$key] = $previous_status;
            }
        }

        $stucture = http_build_query($final, '', ', ');

        if ($this->Year_Model->update_holiday($id, $stucture) == TRUE) {
            $data['succ_message'] = "Holiday Deleted Sucessfully";

            //Year Again
            $data['year'] = $this->Year_Model->get_academic_year_by_id($id);

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('year/edit_year', $data);
            $this->load->view('/templates/footer');
        } else {
            $data['error_message'] = "Failed to Delete";

            //Year Again
            $data['year'] = $this->Year_Model->get_academic_year_by_id($id);

            //Passing it to the View
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('year/edit_year', $data);
            $this->load->view('/templates/footer');
        }
    }

}
