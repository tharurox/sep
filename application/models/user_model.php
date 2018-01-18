<?php

//class User_model extends CI_Model {
//    
//    
//    public function create($new_user_data, $user_type) {
//        $new_user_data['created_at'] = date("Y-m-d H:i:s");
//        $new_user_data['user_type'] = $user_type;
//        
//        if($user_type == 'A'){
//            $new_user_data['superuser'] = 1;
//        }
//        
//        $this->db->insert('users', $new_user_data);
//        return true;
//    }
//}