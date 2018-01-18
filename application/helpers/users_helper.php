<?php

function get_users_list(){
    $ci =& get_instance();
    $query = $ci->db->get('users');
    
    return $query->result();
}

function user_img_url($user_id){
    $ci =& get_instance();
    $query = $ci->db->get_where('users', array('id' => $user_id));
    $user = $query->row();
    
    return $user->profile_img;
}

function full_name($user_id){
    $ci =& get_instance();
    $query = $ci->db->get_where('users', array('id' => $user_id));
    $user = $query->row();
    
    return $user->first_name . " " . $user->last_name;
}