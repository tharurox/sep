<?php
/**
 * Ecole - User Model
 *
 * Responsibe for handling date related to user accounts in the system
 *
 * @author  Sampath R.P.C.
 */
class User extends CI_Model {

    /*
     * Class Attributes
     */
    private $table = "users";

    /**
     * Class Constructor
     */

    public function __construct() {
        parent::__construct();
    }

    /**
     * Interact with the database to authenticate user.
     *
     * @param string $username Username
     * @param string $password Password
     *
     * @return result
     */
    public function login($username, $password) {
        $auth_info = array(
            'username' => $username,
            'password' => md5($password),
            'active' => 1
        );
        $query = $this->db->get_where($this->table, $auth_info, 1);
        if ($query->num_rows() == 1) {
            $data = array(
              'lastvisit_at' => date('Y-m-d h:i:s a')
            );
            $this->db->update($this->table, $data, array('username' => $username));
            return $query->row();
        } else {
            return FALSE;
        }
    }

    /**
     * Get user details.
     *
     * @param $user_id User ID
     *
     * @return quary result(user details)
     */
    public function get_details($user_id) {
        $query = $this->db->query("SELECT * FROM users WHERE id='{$user_id}' LIMIT 1");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    /**
     * Change user password.
     *
     * @param $user_id User ID
     * @param $new_password New password
     */
    public function change_password($user_id, $new_password) {
        $hashed_password = md5($new_password);
        $query = "UPDATE users SET password='{$hashed_password}' WHERE id='{$user_id}'";
        $result = $this->db->query($query);

        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function get_password_hash($user_id) {
        $query = $this->db->query("SELECT password FROM users WHERE id='{$user_id}'");
        $row = $query->row();
        return $row->password;
    }

    public function update_info($update_data) {

        $query = "UPDATE users SET first_name='{$update_data['first_name']}', last_name='{$update_data["last_name"]}', profile_img='{$update_data['image']}' WHERE id='{$update_data['user_id']}'";
        $result = $this->db->query($query);

        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
     * Interact with the database to create user accounts.
     *
     * @param array $new_user_data User account information
     * @param string $user_type Type of the user account. "A" - Admin, "T" - Teacher, "S" - Student
     * @return int Newly created user account's id.
     */
    public function create($new_user_data, $user_type) {
        $new_user_data['created_at'] = date("Y-m-d H:i:s");
        $new_user_data['user_type'] = $user_type;

        if($user_type == 'A'){
            $new_user_data['superuser'] = 1;
        }

        $this->db->insert('users', $new_user_data);
        return $this->db->insert_id();
    }

    /**
     * Returns the user list according to request user type.
     *
     * @param string $user_type User type of the user accounts
     * @return mixed Result set
     */
    public function get_user_list($user_type) {
        $this->db->get_where($this->table, array('user_type' => $user_type));
        $query = $this->db->get_where($this->table, array('user_type' => $user_type, 'active' => 1));
        return $query;
    }

    public function get_user_total() {
        $sql = "SELECT * FROM users";
        $query = $this->db->query($sql);

        return $query->num_rows();
    }

    /**
     * Deactivate the user account by interacting with the database
     *
     * @param int $user_id
     * @return bool
     */
    public function delete($user_id) {
        $data = array(
            'active' => 0,
        );
        $this->db->update($this->table, $data, array('id' => $user_id));
        return TRUE;
    }

    public function get_profile_img($user_id) {
        $sql = "SELECT profile_img FROM users WHERE id='{$user_id}'";
        $query = $this->db->query($sql);

        return $query->row()->profile_img;
    }

    public function force_strong_password(){
        $sql = "SELECT is_strong_password FROM system_config";
        $query = $this->db->query($sql);
        $row = $query->row();

        if($row->is_strong_password == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_user($user_id = null){
        if($user_id == NULL){
            return FALSE;
        }

        $query = $this->db->get_where('users', array('id' => $user_id));
        if($query->num_rows()>0){
            return $query->row();
        }
    }


    public function get_user_for_temp($user_id){
        if($user_id == NULL){
            return FALSE;
        }

        $query = $this->db->get_where('users', array('id' => $user_id));
        if($query->num_rows()>0){
            return $query->row();
        }
    }


    /**
     * Edit user account by interacting with database.
     *
     * @param int $user_id User ID of the user account
     * @param mixed $data Information that needs to be updated
     * @return boolean
     */
    public function edit_user($user_id, $data){
        $this->db->update($this->table, $data, array('id' => $user_id));
        return true;
    }

    public function get_user_type($user_id){

         $sql = "SELECT user_type FROM users where id='$user_id'";
        $query = $this->db->query($sql);
        $row = $query->row();

        if($user_type=$query->row()->user_type) {
            return $user_type;
        } else {
            return FALSE;
        }

    }

    public function add_note($data){
         try {

            if ($this->db->query("INSERT INTO notes (`student_id`, `type` , `subject` , `note`) VALUES ('{$data['user_id']}', '{$data['type']}' , '{$data['subject']}' , '{$data['note']}')")) {

                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    /**
     * Method to get the list of user accounts
     * @return mixed Result set contains user accounts
     */
    public function get_all_users_list() {
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
