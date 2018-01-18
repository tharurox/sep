<?php

class Messages_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Create's a new conversation and add the first message to the database.
     */
    public function new_conversation($sender, $receiver, $subject, $message) {
        $conversation = array(
            'sender_id' => $sender,
            'receiver_id' => $receiver,
            'subject' => $subject,
            'created_time' => date("Y-m-d H:i:s"),
            'last_updated_time' => date("Y-m-d H:i:s")
        );

        /*
         * Inserting new conversation into the database
         */
        $this->db->insert('inbox_conversations', $conversation);
        $return_data['conv_id'] = $this->db->insert_id();
        
        $message = array(
            'conversation_id' => $return_data['conv_id'],
            'created_time' => date("Y-m-d H:i:s"),
            'sender_id' => $sender,
            'receiver_id' => $receiver,
            'content' => $message,
        );
        
        /*
         * Inserting the first message related to the new conversation
         */
        $this->db->insert('inbox_messages', $message);
        $return_data['message_id'] = $this->db->insert_id();
        return $return_data;
    }
    
    /*
     * Returns messages sent by a user
     */
    public function get_sent_list($user_id){
        $sql  = "SELECT * FROM inbox_conversations WHERE sender_id = {$user_id} AND sender_deleted = 0 ";
        $sql .= "ORDER BY last_updated_time DESC";
        
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    /*
     * Returns messages received by a user
     */
    public function get_received_list($user_id){
        $sql  = "SELECT * FROM inbox_conversations WHERE receiver_id = {$user_id} AND receiver_deleted = 0 ";
        $sql .= "ORDER BY last_updated_time DESC";
        
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    /*
     * Returns messages received by a user
     */
    public function get_all_messages($user_id){
        $sql  = "SELECT * FROM inbox_conversations WHERE sender_id = {$user_id} OR receiver_id = {$user_id} ";
        $sql .= "ORDER BY last_updated_time DESC";
        
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    /*
     * Adds a reply to a conversation
     */
    
    public function add_reply($conversation, $sender, $receiver, $content){
        $message = array(
            'conversation_id' => $conversation,
            'created_time' => date("Y-m-d H:i:s"),
            'sender_id' => $sender,
            'receiver_id' => $receiver,
            'content' => $content
        );
        
        $this->db->insert('inbox_messages', $message);
    }
    
    /*
     * Returns a list of messages according to conversation id
     */
    public function get_conversation($id){
        $sql  = "SELECT * FROM inbox_messages WHERE conversation_id = {$id}";
        
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    /*
     * Returns a subject of a conversation according to conversation's id
     */
    public function get_conversation_subject($id){
        $query = $this->db->get_where('inbox_conversations', array('conversation_id' => $id));
        $row = $query->row();
        return $row->subject;
    }
    
    /*
     * Mark the message as deleted when an user wants to delete message
     */
    public function delete($conversation_id){
        $query = $this->db->get_where('inbox_conversations', array('conversation_id' => $conversation_id));
        $conversation = $query->row();
        
        if($conversation->sender_id == $this->session->userdata('id')){
            $data = array(
                'sender_deleted' => 1
            );
            $this->db->update('inbox_conversations', $data, array('conversation_id' => $conversation_id));
        } else {
            $data = array(
                'receiver_deleted' => 1
            );
            $this->db->update('inbox_conversations', $data, array('conversation_id' => $conversation_id));
        }
    }
    
    /*
     * Mark message as read when user opens a message.
     */
    
    public function mark_as_read($conv_id){
        $data = array(
            'is_read' => 1
        );
        
        $messages = $this->db->get_where('inbox_messages', array('conversation_id' => $conv_id, 'is_read' => 0))->result();
        foreach ($messages as $message) {
            if($message->receiver_id == $this->session->userdata('id')){
                $this->db->update('inbox_messages', $data, array('message_id' => $message->message_id));
            }
        }
    }

    /*
     * Returns No of Unread Messages
     */
    public function get_unread_count($user_id){
        $sql  = "SELECT count(*) as count FROM inbox_messages WHERE receiver_id = {$user_id} AND is_read = 0 ";
        
        $query = $this->db->query($sql);
        $row = $query->row();
        return $row->count;
    }

}
