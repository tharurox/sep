<?php
/**
 * Ecole - Subject Controller
 *
 * Handles Functionality of the subject compodent(manage student)
 *
 * @author  K.H.M.Vidyaratna
 */

class Subject extends CI_Controller {
    /**
     * Class Constructor
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Subject_model');
        $this->load->model('Teacher_Model');
        $this->load->model('News_Model');
         if ($this->session->userdata('user_type') !== "A") {
            redirect('login');
        }

    }

    /**
     * Main function for Admin section for now. Maybe changed in future. This will just load the current user's profile.
     */

  /***
  * Function name : index
  * function description :in the index funtion will load the create_subject page.
  * Parameters : none
  * Return type: query result
  */

    function index() {


        $this->load->library('form_validation');
        $this->form_validation->set_rules('subjectname', 'subjectname', "trim|required|xss_clean|min_length[5]|alpha_dash");
        $this->form_validation->set_rules('subjectcode', 'subjectcode', "trim|required|xss_clean|is_unique[subjects.subject_code]");
        $data['user_type']=$this->session->userdata('user_type');


        if ($this->form_validation->run() == FALSE) {
            $data['page_title'] = "Create Subject";
            $data['navbar'] = 'subject';
            $data["query"] = $this->db->query("SELECT * FROM teachers");
            $data['result'] = $data['query']->result();
            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('subject/create_subject', $data);
            $this->load->view('templates/footer');
        } else {
            $subject_data = array(
                'subject_name' => $this->input->post('subjectname'),
                'subject_code' => $this->input->post('subjectcode'),
                'section_id' => $this->input->post('sectionid'),
                'subject_incharge_id' => $this->input->post('subjectinchargeid')
            );
            if ($this->Subject_model->create($subject_data)) {
                 //For news field
            $tech_id = $this->session->userdata('id');
            $tech_details = $this->Teacher_Model->user_details($tech_id);
            $this->News_Model->insert_action_details($tech_id, "Subject Added", $tech_details->profile_img, $tech_details->first_name);
            //////
                $data['page_title'] = "Create Subject ";
                $data['navbar'] = 'subject';
                $data['succ_message'] = "New subject Created Successfully";
                $data["query"] = $this->db->query("SELECT * FROM teachers");
                $data['result'] = $data['query']->result();
                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('subject/create_subject', $data);
                $this->load->view('templates/footer');
            }
        }
    }



    /***
         * Function name : manage_subjects
         * function description :Load subject to the data table .
         * Return type: query result
         */

    function manage_subjects(){
        $data['page_title'] = "Manage Subjects";
        $data['navbar'] = 'subject';
        $data['user_type']=$this->session->userdata('user_type');

        $data['result']= $this->Subject_model->get_all_subjects();

        $this->load->view('templates/header', $data);
        $this->load->view('navbar_main', $data);
        $this->load->view('navbar_sub', $data);
        $this->load->view('subject/manage_subjects', $data);
        $this->load->view('templates/footer');


    }
//    /**
//     * Search subjects
//     */
//    function search() {
//        $data['user_type']=$this->session->userdata('user_type');
//        $this->load->library('pagination');
//        $config = array();
//        $config['base_url'] = base_url() . "index.php/subject/manage_subjects";
//        $config['total_rows'] = $this->Subject_model->get_subject_total();
//        $config['per_page'] = 2;
//        $config['use_page_numbers'] = TRUE;
//        $config['num_links'] = 5;
//
//        $config['offset'] = ($this->uri->segment(3) ? $this->uri->segment(3) : null);
//
//        $keyword = $this->input->post('keyword');
//        $data['page_title'] = "Manage Administrators";
//        $data['navbar'] = 'subject';
//
//        $data['query'] = $this->Subject_model->search_subjects($keyword, $config['per_page'], $config['offset']);
//        $config['cur_tag_open'] = "&nbsp;";
//
//        $this->pagination->initialize($config);
//        $str_links = $this->pagination->create_links();
//        $data["links"] = explode('&nbsp;', $str_links);
//
//        $data['result'] = $data['query']->result();
//
//        $this->load->view('templates/header', $data);
//        $this->load->view('navbar_main', $data);
//        $this->load->view('navbar_sub', $data);
//        $this->load->view('subject/manage_subjects', $data);
//        $this->load->view('templates/footer');
//    }
   /**
    * Delete a subject given id
    *
    * @param type $id
    */
   function delete($id) {

       if ($this->session->userdata('user_type') !== "A") {
           redirect('login');
       }

       if ($this->Subject_model->delete($id)) {
           $data['user_type']=$this->session->userdata('user_type');
           $data['delete_msg'] = "Subject ID " . $id . " has been removed from the database. This cannot be reverted";
           $data['page_title'] = "Manage Subjects";
           $data['navbar'] = 'subject';

           $this->load->library('pagination');
           $config = array();
           $config['base_url'] = base_url() . "index.php/subject/manage_subjects";
           $config['total_rows'] = $this->Subject_model->get_subject_total();
           $config['per_page'] = 2;
           $config['use_page_numbers'] = TRUE;
           $config['num_links'] = 5;

           $config['cur_tag_open'] = '<a href="#">';
           $config['cur_tag_close'] = '</a>';

           $config['offset'] = ($this->uri->segment(3) ? $this->uri->segment(3) : null);

           $data['query'] = $this->Subject_model->get_subjects($config['per_page'], $config['offset']);

           $data['result'] = $data['query']->result();
           $this->pagination->initialize($config);
           $str_links = $this->pagination->create_links();
           $data["links"] = explode('&nbsp;', $str_links);

           $data['result'] = $data['query']->result();
           $this->load->view('templates/header', $data);
           $this->load->view('navbar_main', $data);
           $this->load->view('navbar_sub', $data);
           $this->load->view('subject/manage_subjects', $data);
           $this->load->view('templates/footer');
       }
   }


     /*
          * Function name : edit
          * function description :Edit subjects.
          * Parameters : sub_id
          * Return type: query result
          */


    function edit($sub_id){

        $data['user_type']=$this->session->userdata('user_type');



            $data['page_title'] = "Edit Subject";
            $data['navbar'] = 'subject';
            $data["query"] = $this->db->query("SELECT * FROM teachers");
            $data['result'] = $data['query']->result();
            $data['subject_details']=$this->Subject_model->get_subject_by_id($sub_id);

            $this->load->view('templates/header', $data);
            $this->load->view('navbar_main', $data);
            $this->load->view('navbar_sub', $data);
            $this->load->view('subject/edit_subject', $data);
            $this->load->view('templates/footer');
    }
    /**
     * Both methods are used for edit subject using ajax
     */
    function edit_subject(){
          $data['user_type']=$this->session->userdata('user_type');

            $subject_data = array(

                'subjectid' => $this->input->post('subjectid'),
                'subjectinchargeid' => $this->input->post('subjectinchargeid')
            );

            if ($this->Subject_model->edit($subject_data)) {

                 //For news field
            $tech_id = $this->session->userdata('id');
            $tech_details = $this->Teacher_Model->user_details($tech_id);
            $this->News_Model->insert_action_details($tech_id, "Subject Edited", $tech_details->profile_img, $tech_details->first_name);
            //////end news feed



                $data['page_title'] = "edit Subject ";
                $data['navbar'] = 'subject';
                $data['succ_message'] = "Subject Edited Successfully";
                $data["query"] = $this->db->query("SELECT * FROM teachers");
                $data['result'] = $data['query']->result();
                $data['subject_details']=$this->Subject_model->get_subject_by_id($this->input->post('subjectid'));
                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('subject/edit_subject', $data);
                $this->load->view('templates/footer');
            }else{
                $data['page_title'] = "edit Subject ";
                $data['navbar'] = 'subject';
                $data['err_message'] = "Error occured";
                $data["query"] = $this->db->query("SELECT * FROM teachers");
                $data['result'] = $data['query']->result();
                 $data['subject_details']=$this->Subject_model->get_subject_by_id($this->input->post('subjectid'));
                $this->load->view('templates/header', $data);
                $this->load->view('navbar_main', $data);
                $this->load->view('navbar_sub', $data);
                $this->load->view('subject/edit_subject', $data);
                $this->load->view('templates/footer');
            }
        }


}
