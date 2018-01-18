<?php

function last_message($conversation_id) {
    $ci = & get_instance();
    $sql = "SELECT * FROM inbox_messages WHERE conversation_id = {$conversation_id} ";
    $sql .= "ORDER BY created_time DESC LIMIT 1";
    $query = $ci->db->query($sql);
    $row = $query->row();
    $message = "";
    if ($row->is_read == 0) {
        $message = "<strong>" . $row->content . "</strong>";
    } else {
        $message = $row->content;
    }

    return $message;
}

function get_other_user($conversation_id, $user_id) {
    $ci = & get_instance();
    $query = $ci->db->get_where('inbox_conversations', array('conversation_id' => $conversation_id));
    $row = $query->row();

    if ($user_id == $row->sender_id) {
        return $row->receiver_id;
    } else {
        return $row->sender_id;
    }
}

function last_message_user_name($conversation_id) {
    $ci = & get_instance();
    $sql = "SELECT * FROM inbox_messages WHERE conversation_id = {$conversation_id} ";
    $sql .= "ORDER BY created_time DESC LIMIT 1";
    $query = $ci->db->query($sql);
    $row = $query->row();

    $query = $ci->db->get_where('users', array('id' => $row->sender_id));
    $user = $query->row();

    return $user->first_name . " " . $user->last_name;
}

function get_other_user_name($conversation_id, $user_id) {
    $ci = & get_instance();
    $query = $ci->db->get_where('inbox_conversations', array('conversation_id' => $conversation_id));
    $row = $query->row();

    if ($user_id === $row->sender_id) {

        $query = $ci->db->get_where('users', array('id' => $row->receiver_id));
        $user = $query->row();

        return $user->first_name . " " . $user->last_name;
    } else {

        $query = $ci->db->get_where('users', array('id' => $row->sender_id));
        $user = $query->row();

        return $user->first_name . " " . $user->last_name;
    }
}
