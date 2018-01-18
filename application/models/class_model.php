<?php

class Class_Model extends CI_Model {

    private $table = "classes";
    public function __construct() {
        parent::__construct();
    }

    public function get_classes($grade = NULL, $academic_year = NULL) {
        $sql = "SELECT * FROM `classes` WHERE `academic_year`='{$academic_year}' ";
        $sql .= (!$grade ? "" : "AND grade_id='{$grade}' ");
        $sql .= "ORDER BY grade_id";

        return $this->db->query($sql)->result();
    }

//    public function get_all_classes(){
//        $sql =
//    }

    public function create_class($class) {
        $this->db->insert('classes', $class);
    }

    public function get_class($class_id) {
        return $this->db->get_where('classes', array('id' => $class_id), 1)->row();
    }

    public function get_class_id($teacher_id) {
      try {
          $query = $this->db->query("SELECT id FROM classes WHERE teacher_id='$teacher_id'");
          $row = $query->row();
          return $row->id;
      } catch (Exception $ex) {
          return FALSE;
      }
    }

    public function get_grades() {
        return $this->db->get('grades')->result();
    }

    public function get_class_students($class_id) {
        $sql = "SELECT s.* FROM students s, student_class c WHERE s.id = c.student_id ";
        $sql .= "AND c.class_id = '{$class_id}'";

        return $this->db->query($sql)->result();
    }

    public function get_students_without_class($grade_id = NULL) {
        $sql = "SELECT * FROM `students` WHERE ";
        $sql .= "current_class IS NULL ";
        if (!is_null($grade_id)) {
            $sql .= "AND current_grade='{$grade_id}' ";
        }
        return $this->db->query($sql)->result();
    }

    public function assign_students_to_class($class_id, $students_removed, $students_in) {

        /*
         * Add to class if this student is not already in a class.
         */
        foreach ($students_in as $student) {
            if (!$this->student_already_in_class($class_id, $student)) {
                $this->insert_student_class($class_id, $student);
                $this->update_student_class($class_id, $student);
            }
        }

        /*
         * Remove class from student if already in class
         */

        foreach ($students_removed as $student) {
            if ($this->student_already_in_class($class_id, $student)) {
                $this->remove_student_from_class($class_id, $student);
                $this->update_student_class(NULL, $student);
            }
        }
    }

    public function insert_student_class($class_id, $student_id) {
        $data = array(
            'student_id' => $student_id,
            'class_id' => $class_id,
            'academic_year' => $this->get_academic_year_of_class($class_id)
        );

        $this->db->insert('student_class', $data);
        return TRUE;
    }

    public function student_already_in_class($class_id, $student_id) {
        $sql = "SELECT * FROM student_class WHERE student_id = '{$student_id}' AND class_id='{$class_id}' LIMIT 1";
        $query = $this->db->query($sql);

        if ($query->num_rows() === 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function remove_student_from_class($class_id, $student_id) {
        $this->db->delete('student_class', array('student_id' => $student_id, 'class_id' => $class_id));
        return TRUE;
    }

    public function update_student_class($class_id, $student_id) {
        $data = array(
            'current_class' => $class_id
        );
        $this->db->update('students', $data, array('id' => $student_id));
    }

    public function get_academic_year_of_class($class_id) {
        $sql = "SELECT academic_year FROM classes WHERE id='{$class_id}'";
        $class = $this->db->query($sql)->row();

        return $class->academic_year;
    }

    public function teacher_assigned_to_class($teacher_id, $academic_year) {
        $sql = "SELECT * FROM classes WHERE teacher_id = '{$teacher_id}' AND academic_year = '{$academic_year}'";
        if ($this->db->query($sql)->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function class_name_already_have($class_name, $grade_id, $academic_year) {
        $class_name = trim($class_name);
        $sql = "SELECT * FROM classes WHERE name ='{$class_name}' AND academic_year = '{$academic_year}' AND grade_id = {$grade_id}";

        if ($this->db->query($sql)->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Returns the complete list of classes.
     * @return type
     */
    public function get_class_list() {
        $this->db
                ->select('*')
                ->from($this->table)
                ->order_by("grade_id", "asc")
                ->order_by("name", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function update_class($class_id, $class_data) {
        $this->db->update('classes', $class_data, array('id' => $class_id));
    }

    public function remove_class_teacher($class_id) {
        $data = array(
            'teacher_id' => NULL,
        );

        $this->db->update('classes', $data, array('id' => $class_id));
    }

    public function get_number_of_students($class_id) {
        $sql = "SELECT `id` FROM `student_class` WHERE `class_id` = '{$class_id}'";
        return $this->db->query($sql)->num_rows();
    }

//    public function get_students_without_class(){
//        $sql = "SELECT * FROM ` students` WHERE current_class IS NULL";
//        return $this->db->query($sql)->result();
//    }

    public function get_academic_years() {
        $sql = "SELECT DISTINCT `academic_year` FROM classes";
        return $this->db->query($sql)->result();
    }

//    public function grade_strength($acadmic_year){
//        $sql = "SELECT grade_id ";
//    }

    public function get_students_for_academic_year($academic_year) {
        $sql = "SELECT s.*, c.* FROM students s, student_class c ";
        $sql .= "WHERE c.student_id = s.id AND c.academic_year ='{$academic_year}'";
    }

    public function get_class_name($class_id){
        $class = $this->db->get_where('classes', array('id' => $class_id), 1)->row();
        return $class->grade_id . " " .$class->name;
    }

    public function update_grade($grade) {
      $new_garde = $grade-1;
      $sql = "SELECT `id` FROM `students` WHERE `current_grade`='{$new_garde}' ";

      if ($this->db->query($sql)->num_rows() > 0) {
          $sql = "UPDATE `students` SET `current_grade`='{$grade}' WHERE `current_grade`='{$new_garde}'";
          $this->db->query($sql);
      } else {
          return FALSE;
      }
    }

}
