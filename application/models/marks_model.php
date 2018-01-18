<?php

/**
 * Created by PhpStorm.
 * User: Pc Technologies
 * Date: 10/25/2016
 * Time: 6:59 PM
 */
class marks_model extends CI_Model
{

        public function __construct()
        {
           parent::__construct();
        }

    //inserting in table(exams) of Database(sep_db)
    public function enter_marks($data){
        $this->db->insert('exams',$data);
    }

    public function enter_marks1($name,$year,$ids,$start_date,$end_date){
        $this->db->query("insert into exams(name,grade_id,year,start_date,end_date) values('$name','$year','$ids','$start_date','$end_date')");
        return TRUE;
    }

    public function enter_grade($name,$student_id,$subject_id,$marks){
        $this->db->query("insert into exam_marks(exam_id,student_id,subject_id,marks) values('$name','$student_id','$subject_id','$marks')");
        return TRUE;
    }

    /*
    public function enter_marks($name,$grade,$year,$sdate,$edate) {
        $data=array(
            'name'=>$name,
            'grade_id'=>$grade,
            'year'=>$year,
            'start_date'=>$sdate,
            'end_date'=>$edate

        );
       // $this->db->insert('exams',$data);
        try {
            if($this->db->insert('exams', $data)){
                $id = $this->db->insert_id();
                return $id;
            } else {
                return NULL;
            }
        } catch (Exception $ex) {
            return FALSE;
        }

    }*/

    public function get_all_grades() {
        $data = $this->db->query("SELECT name, id  FROM grades");
        return $data->result();
    }
    public function get_all_subjects() {
        $data = $this->db->query("SELECT subject_name, id  FROM subjects");
        return $data->result();
    }

    public function get_examination_names() {
        $data = $this->db->query("SELECT name, id  FROM exams");
        return $data->result();
    }

    public function get_grade_id_name($name) {
        $data = $this->db->query("select id from grades where grade='$name'");
        return $data->result();
    }

    public function view_marks() {
        $data = $this->db->query("select * from exam_marks");
        return $data->result();
    }

    function get_subject_names() {
        $query = $this->db->query("SELECT subject_name FROM subject");
        return $this->db->query($query)->result();
    }

    public function get_marks() {

        $sql = "SELECT s.* FROM students s, student_class c WHERE s.id = c.student_id ";
        return $this->db->query($sql)->result();
    }



}