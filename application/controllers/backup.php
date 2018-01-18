<?php
/**
 * Ecole - Backups Controller
 *
 * Handles Functionality of the backups compodent(manage backups)
 *
 * @author  Sampath R.P.C.
 */

class Backup extends CI_Controller {
  /**
   * Class contructor
   */
  function __construct() {
    parent::__construct();

    if ($this->session->userdata('user_type') !== "A") {
        redirect('login');
    }
  }

  /**
   * Create backups from the database
   */
  function create() {
    $this->load->dbutil();

    //checks if the db is present
    if ($this->dbutil->database_exists('sep_db'))
    {
      //check if the type exists in the query string
      if (isset($_GET['type'])) {

        $prefs = array(
            'tables'      => array($_GET['type']),  // Array of tables to backup.
            'ignore'      => array(),           // List of tables to omit from the backup
            'format'      => 'gzip',             // gzip, zip, txt
            'filename'    => 'mybackup.sql',    // File name - NEEDED ONLY WITH ZIP FILES
            'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
            'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
            'newline'     => "\n"               // Newline character used in backup file
        );
        //Backups full database
        if ($_GET['type'] == "fulldb") {
          // Backup your entire database and assign it to a variable
          $backup =& $this->dbutil->backup();

          // Load the file helper and write the file to your server
          $this->load->helper('file');
          write_file('/path/to/mybackup.gz', $backup);

          // Load the download helper and send the file to your desktop
          $this->load->helper('download');
          force_download('fulldb.gz', $backup);
        }
        //Backups only users table.
        else if ($_GET['type'] == "users") {
          // Backup your entire database and assign it to a variable
          $backup =& $this->dbutil->backup($prefs);

          // Load the file helper and write the file to your server
          $this->load->helper('file');
          write_file('/path/to/mybackup.gz', $backup);

          // Load the download helper and send the file to your desktop
          $this->load->helper('download');
          force_download('users.gz', $backup);
        }
        //Backups only students table.
        else if ($_GET['type'] == "students") {
          // Backup your entire database and assign it to a variable
          $backup =& $this->dbutil->backup($prefs);

          // Load the file helper and write the file to your server
          $this->load->helper('file');
          write_file('/path/to/mybackup.gz', $backup);

          // Load the download helper and send the file to your desktop
          $this->load->helper('download');
          force_download('students.gz', $backup);
        }
        //Backups only teachers table.
        else if ($_GET['type'] == "teachers") {
          // Backup your entire database and assign it to a variable
          $backup =& $this->dbutil->backup($prefs);

          // Load the file helper and write the file to your server
          $this->load->helper('file');
          write_file('/path/to/mybackup.gz', $backup);

          // Load the download helper and send the file to your desktop
          $this->load->helper('download');
          force_download('teachers.gz', $backup);
        }
      }
    }
    else
    {
      alerts("Select a catogory!");
    }

    $data['user_type']=$this->session->userdata('user_type');
    $data['page_title'] = "Backups";
    $data['navbar'] = 'subject';

    $this->load->view('templates/header',$data);
    $this->load->view('navbar_main',$data);
    $this->load->view('navbar_sub',$data);
    $this->load->view('backups/get_backups',$data);
    $this->load->view('templates/footer',$data);
  }

  /**
   * Restore backups to the database
   */
  function restore() {
    $data['user_type']=$this->session->userdata('user_type');
    $data['page_title'] = "Backups";
    $data['navbar'] = 'subject';

    $this->load->view('templates/header',$data);
    $this->load->view('navbar_main',$data);
    $this->load->view('navbar_sub',$data);
    $this->load->view('backups/restore_backups');
    $this->load->view('templates/footer',$data);
  }

}
