<?php
/**
 * Ecole - Subject Model
 *
 * Handles DB Functionalities of the subject component
 *
 * @author  K.H.M. Vidyaratna
 */

class Subject_model extends CI_Model {

     /**
 * Function name : get_details
 * function description:  To get subject details  by the given id
 * @param type $Subject_id
 * @return boolean or query result
 */

    public function get_details($Subject_id) {
        $query = $this->db->query("SELECT * FROM subject WHERE id='{$Subject_id}' LIMIT 1");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

     /**
      * Function name : search_subjects
      * function description:to search subjects by given keyword
      * @param type $keyword
      * @param type $limit
      * @param type $offset
      * @return type
      */


   public function search_subjects($keyword, $limit = 1, $offset = null) {
        $sql = "SELECT * FROM subjects WHERE subject_name LIKE '%{$keyword}%' OR subject_code LIKE '%{$keyword}%' LIMIT {$limit} ";

        if (isset($offset)) {
            $sql .= " OFFSET {$offset}";
        }
        $query = $this->db->query($sql);
        return $query;
    }

    /**
     * Add new subject into database
     *
     * @param type $subject_data
     * @return boolean
     */
    public function create($subject_data) {

        $result = $this->db->insert('subjects',$subject_data);

        if (!$result) {
            return FALSE;
        } else {
            return $this->db->insert_id();
        }
    }

    /**
     * get all the subject resuls from subjects table
     *
     * @param type $limit
     * @param type $offset
     * @return type Query result
     */
   public function get_subjects( $limit = 1, $offset = null) {
       $sql = "SELECT * FROM subjects  LIMIT {$limit}";
       //if ofset is not null
       if (isset($offset)) {
           $sql .= " OFFSET {$offset}";
       }
       $query = $this->db->query($sql);
       return $query;
   }

    /**
     * Get total row count of the subjects table .. this is needed for pagination
     *
     * @return type Query result
     */
    public function get_subject_total() {
        $query = $this->db->get('subjects');
        return $query->num_rows();
    }
/*
 *
 */
    /**
     * delete subject
     *
     * @param type $id
     * @return boolean
     */
    public function delete($id) {
        $sql = "DELETE FROM subjects WHERE id='{$id}'";
        $query = $this->db->query($sql);

        if ($query) {
            return TRUE;
        }
    }


    /**
     * get all the subject resuls from subjects table
     *
     * @return type Query result
     */
    public function get_all_subjects() {
        $sql = "SELECT s.*,t.full_name FROM subjects s inner join teachers t on s.subject_incharge_id=t.id";
        //if ofset is not null

        $query = $this->db->query($sql);
        return $query->result();
    }


    /**
     * get all the subject resuls from subjects table
     *
     * @param type $sub_id
     * @return type query result
     */
    public function get_subject_by_id($sub_id) {
        $sql = "SELECT *FROM subjects where id=$sub_id";
        //if ofset is not null

        $query = $this->db->get_where('subjects',array('id'=>$sub_id),1);
        return $query->row();
    }

    /*
 *
 */
    /**
     * Add new subject into database
     *
     * @param type $subject_data
     * @return boolean
     */
    public function edit($subject_data) {


        $subjectid = $subject_data['subjectid'];
        $subjectinchargeid = $subject_data['subjectinchargeid'];

        //$sql = "INSERT INTO subjects (subject_name, subject_code, section_id, subject_incharge_id) VALUES ('{$subjectname}', '{$subjectcode}', '{$sectionid}', '{$subjectinchargeid}')";

        $sql="UPDATE subjects SET subject_incharge_id=$subjectinchargeid where id= $subjectid";




        $result = $this->db->query($sql);


        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }




}
