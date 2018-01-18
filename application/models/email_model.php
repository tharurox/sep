<?php
class Email_Model extends CI_Model {
	//loading database on class creationorderMainAddress
	public function __construct() {
			$this->load->database();
	}

    // This function sends a basic email to a when you pass user id, message, and subject
    public function send_basic_email($userid, $messagestring, $messagesubject){
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'chanarusampath@gmail.com',
				'smtp_pass' => '19930305-sampath',
				'mailtype'  => 'html',
				'charset'   => 'iso-8859-1'
			);

        // Get useremail by ID
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $userid);
        $this->db->limit(1);

        $query = $this->db->get();
        $row = $query->row();
        $email = $row->email;

        // Fail if user email is null
        if($email != null){
            $this->load->library('email', $config);
						$this->email->set_newline("\r\n");
            $this->email->initialize($config);
            $this->email->from('chanarusampath@gmail.com', 'Ecole Admin');
            $this->email->to($email);
            $this->email->subject($messagesubject);

            // Passing to View
            $data['user'] = array('message' => $messagestring, 'subject' => $messagesubject);
            $message = $this->load->view('email/leave',$data,true);
            $this->email->message($message);


						         //Send mail
						         if($this->email->send())
												echo '<script type="text/javascript">alert("Email sent succesfully");</script>';
						         else
						          echo ($this->email->print_debugger());

            return true;
        }else{
            return false;
        }
    }
}
?>
