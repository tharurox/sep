  <?php
/**
 * Ecole - Student Controller
 *
 * Handles Functionality of the student component(manage student)
 *
 * @author  Sampath R.P.C.
 */
class princ_approval extends CI_Controller {
    /**
     * Class Constructor
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Student_Model');
        $this->load->model('Teacher_Model');
        $this->load->model('News_Model');
        $this->load->helper('date');
        $this->load->model('user');

        //login check
         if (!$this->session->userdata('id')) {
            redirect('login', 'refresh');
        }
    }

     function index(){
        
        if($this->session->userdata('logged_in')){
            redirect('dashboard', 'refresh');
        }
    }


    public function create_student() {

        $this->load->model('class_model');
        $data['page_title'] = "Admission";
        $data['navbar'] = "student";
        $data['user_type'] = $this->session->userdata['user_type']; //getting the user type
        /*
         * checking validations
         */
        $this->load->library('form_validation');
        $this->form_validation->set_rules('admissionnumber', 'Admission Number', 'required|is_unique[students.admission_no]|min_length[4]');
        $this->form_validation->set_rules('admissiondate', 'Admission Date', 'required|callback_check_admission_date');
        $this->form_validation->set_rules('firstname', 'Firstname', 'required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        $this->form_validation->set_rules('initials', 'Name With Initials', 'required');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'required|callback_check_Birth_day');
        $this->form_validation->set_rules('nic', 'NIC No', 'exact_length[10]|is_unique[students.nic_no]|callback_check_NIC');
        $this->form_validation->set_rules('language', 'Medium', 'required|callback_check_selection_status');
        $this->form_validation->set_rules('religion', 'Religion', 'callback_check_selection');
        $this->form_validation->set_rules('houseid', 'Houser', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('contact_home', 'Contact Home', 'exact_length[10]|integer');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');


        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');


        if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
            $data['page_title'] = "Admission";

            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('student/create_student_forApproval', $data);

            $this->load->view('/templates/footer');
        } else {//validation ok

            $fname=$this->input->post('firstname');
            $lname=$this->input->post('lastname');
            $fullname = $fname . " " . $lname;
            $address = $this->input->post('address');
            $address1 = $this->input->post('address1');
            $address2 = $this->input->post('address2');
            $full_addr = $address.",".$address1.",".$address2.".";

            $student_data = array(
                // 'studentid' => $student_id,
                'admission_no' => $this->input->post('admissionnumber'),
                'admission_date' => $this->input->post('admissiondate'),
                'full_name' => $fullname,
                'name_with_initials' => $this->input->post('initials'),
                'dob' => $this->input->post('dob'),
                'gender' => 'M',
                'nic_no' => $this->input->post('nic'),
                'language' => $this->input->post('language'),
                'religion' => $this->input->post('religion'),
                'house_id' => $this->input->post('houseid'),
                'permanent_addr' => $this->input->post('address'),
                'permanent_addr1' => $this->input->post('address1'),
                'permanent_addr2' => $this->input->post('address2'),
                'contact_home' => $this->input->post('contact_home'),
                'email' => $this->input->post('email'),
                'created_at' => date('Y-m-d H:i:s'),
                'current_grade' => $this->input->post('admission_grade'),
            );

            $this->session->set_userdata('student_d', $student_data);

            $data['page_title'] = "Admission";
            $data['navbar'] = "student";
            $data['stud_data'] = $student_data;
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('student/create_guardianForApproval', $data);
            $this->load->view('/templates/footer');
        }
    }

    /**
     * function for adding a new guardian
     */
    public function create_guardian() {

        $data['page_title'] = "Admission";
        $data['navbar'] = "student";
        $data['user_type'] = $this->session->userdata['user_type']; //getting the user type
        $userType = $data['user_type'];
        /*
         * checking validations
         */
        $this->load->library('form_validation');    
        $this->form_validation->set_rules('gfirstname', 'first name', 'required');
        $this->form_validation->set_rules('glastname', 'last name', 'required');
        $this->form_validation->set_rules('initial', 'initial', 'required');
        $this->form_validation->set_rules('relation', 'relation', 'required');
        $this->form_validation->set_rules('dobg', 'dob', 'required|callback_check_guardian_Birth_day');
        $this->form_validation->set_rules('occupation', 'occupation', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('contact_homeg', 'contact_home', 'required|exact_length[10]|integer');
        $this->form_validation->set_rules('contact_mobile', 'contact_mobile', 'exact_length[10]|integer');
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');


                 if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
            $data['page_title'] = "Admission";
            $data['row'] = $this->Student_Model->get_last_row();
            $data['stud_data'] = $this->session->userdata('student_d');
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('student/create_guardianForApproval', $data);
            $this->load->view('/templates/footer');
        } else {

            if (isset($_POST['pastpupil'])) {
                $pastpupil = 1; // get the value of checked checkbox.
            } else {
                $pastpupil = 0; 
                ;
            }

            $last_row = $this->Student_Model->get_last_row(); //getting last student user_id
            $student_id = $last_row->id;
            $studentd = array();
            $studentd = $this->session->userdata('student_d');



               if ($id = $this->Student_Model->insert_new_Temp_student($studentd)) {

                /*
                 * creating and inserting login credentials for the student
                 */
                $data['row'] = $this->Student_Model->get_last_temp_inserted_student($id);
                $ID = $data['row']->id;
                $UID= $data['row']->user_id;
                $username = $data['row']->admission_no;
                $password =  $username;

                $create = date('Y-m-d H:i:s');
                $name = $studentd['full_name'];
                $names = explode(" ", $name);
                $lname = $names[1];
                $fname = $names[0];
                if ($id = $this->Student_Model->insert_new_student_userdata($username, $password, $create, $fname, $lname)) {


                    $this->Student_Model->set_user_id_InTemp($ID, $id);
                   
                    var_dump($ID);
                    var_dump($id);
                    $firstname=$this->input->post('gfirstname');
                    $lastname=$this->input->post('glastname');

                    $fullname=$firstname." ".$lastname;
                    $row = $this->Student_Model->get_temp_last_row();
                    $student_id = $row->user_id;
                   
                    $guardian_data = array(
                        'student_id' => $student_id,
                        'fullname' => $fullname,
                        'relation' => $this->input->post('relation'),
                        'name_with_initials' => $this->input->post('initial'),
                        'dob' => $this->input->post('dobg'),
                        'gender' => $this->input->post('gender'),
                        'occupation' => $this->input->post('occupation'),
                        'is_pastpupil' => $pastpupil,
                        'addr' => $this->input->post('address'),
                        'addr1'=> $this->input->post('address1'),
                        'addr2'=> $this->input->post('address2'),
                        'contact_home' => $this->input->post('contact_homeg'),
                        'contact_mobile' => $this->input->post('contact_mobile')
                    );

                     // var_dump('dsadsadads');

                    if ($id = $this->Student_Model->insert_new_Temp_Guardian($guardian_data)) { // the information has therefore been successfully saved in the db
                          $this->Student_Model->set_user_id_InTempG($ID, $id);
                        // var_dump($id);
                        $this->session->unset_userdata('student_d');
                        $this->session->set_flashdata('succ_message', 'Submitted for acceptance');
                        redirect('princ_approval/create_student');
                    } else {
                        $err = 'An error occurred saving your information. Please try again later';
                        $this->session->set_flashdata('err_message', $err);
                        redirect('princ_approval/create_student');
                    }
                } else {
                    $err = 'An error occurred creating your user account. Please try again later';
                    $this->session->set_flashdata('err_message', $err);
                    redirect('princ_approval/create_student');
                }
            } else {
                $err = 'An error occurred saving your information. Please try again later';
                $this->session->set_flashdata('err_message', $err);
                redirect('princ_approval/create_student');
                }
            }
        }


        function edit_student() {

        $data['navbar'] = "student";
        $data['user_type'] = $this->session->userdata['user_type'];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname', 'fullname', 'required');
        $this->form_validation->set_rules('initials', 'initial', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('contact_home', 'contact_home', 'required|exact_length[10]|integer');

        if ($this->form_validation->run() == FALSE) {

            $myid = $this->input->post('studentid');
            $this->load_student($myid);
        } else {

            $myid = $this->input->post('studentid');
            $student = array(
                'name' => $this->input->post('fullname'),
                'nameWithInitials' => $this->input->post('initials'),
                'address' => $this->input->post('address'),
                'contact_home' => $this->input->post('contact_home'),
                'email' => $this->input->post('email')
            );

            if ($this->Student_Model->update_temp_student($student, $myid)) {

                $data['page_title'] = "Student Profile";
                $data['succ_message'] = "Student details updated successfully";
                $data['result'] = $this->Student_Model->get_Temp_student_only($myid);
                $data['page_title'] = "Student Profile";

                $this->load->view('/templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('/student/edit_student_temp', $data);
                $this->load->view('/templates/footer');
            } else {

                $data['err_message'] = "Student details update error";
                $data['page_title'] = "Student Profile";
                $this->load->view('/templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('/student/edit_student_temp', $data);
                $this->load->view('/templates/footer');
            }
        }
    }

public function edit_temp_guardian() {


        $data['user_type'] = $this->session->userdata['user_type'];
        $data['navbar'] = "student";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname', 'fullname', 'required');
        $this->form_validation->set_rules('initials', 'initial', 'required');
        $this->form_validation->set_rules('dob', 'dob', 'required|callback_check_guardian_Birth_day');
        $this->form_validation->set_rules('occupation', 'occupation', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('contact_home', 'contact_home', 'required|exact_length[10]|integer');
        $this->form_validation->set_rules('contact_mobile', 'contact_mobile', 'exact_length[10]|integer');

        if ($this->form_validation->run() == FALSE) {

            $myid = $this->input->post('studentid'); //if validations are fualse load form with same details
            $this->load_guardian($myid);
        } else {
            //validations passed
            $myid = $this->input->post('studentid');
            $guardian = array(
                'name' => $this->input->post('fullname'),
                'nameWithInitials' => $this->input->post('initials'),
                'birthday' => $this->input->post('dob'),
                'occupation' => $this->input->post('occupation'),
                'address' => $this->input->post('address'),
                'contact_home' => $this->input->post('contact_home'),
                'contact_mobile' => $this->input->post('contact_mobile')
            );  

            if ($this->Student_Model->update_temp_guardian($guardian, $myid)) {

                $data['page_title'] = "Guardian Profile";
                $data['succ_message'] = "Guardian details updated successfully";
                $data['result'] = $this->Student_Model->get_temp_guardian_only($myid);
                $data['page_title'] = "Edit Guardian";
                $this->load->view('/templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('/student/edit_guardian_temp', $data);
                $this->load->view('/templates/footer');
            } else {

                $data['err_message'] = "Guardian details update error";
                $data['page_title'] = "Guardian Profile";
                $this->load->view('/templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('/student/edit_guardian_temp', $data);
                $this->load->view('/templates/footer');
            }
        }
    }





}