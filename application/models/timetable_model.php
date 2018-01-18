<?php
/**
 * Ecole - Timetable Model
 *
 * Model to interact with db to timetable controller related activities
 *
 * @author  K.H.M. Vidyaratna
 */
class Timetable_Model extends CI_Model {

    private $table = "class_timetable";

    /**
     * Class constructor
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Create timetable for a class, for a given academic year
     *
     * @param int $class_id ID of the class
     * @param string $year Academic Year
     * @return int Created Timetable ID
     */
    function create_class_timetable($class_id, $year) {
        $timetable = array(
            'class_id' => $class_id,
            'year' => $year
        );
        $this->db->insert($this->table, $timetable);
        return $this->db->insert_id();
    }

    /**
     * Returns a particular timetable for a given timetable id.
     *
     * @param int $timetable_id
     * @return mixed Timetable object
     */
    function get_class_timetable($timetable_id) {
        $sql = "SELECT * FROM class_timetable WHERE id='{$timetable_id}'";
        $query = $this->db->query($sql);

        return $query->row();
    }

    /**
     * Returns complete list of timetables from the database
     *
     * @return mixed result set
     */
    function get_timetable_list() {
        return $this->db->get($this->table)->result();
    }


    function search_by_year($keyword) {
        $sql = "SELECT * FROM class_timetable WHERE year LIKE '%{$keyword}%' ";
        $query = $this->db->query($sql);

        return $query->result();
    }

    function search_by_class($keyword) {
        if ($keyword == null) {
            $sql = "SELECT * FROM class_timetable WHERE class_id =0";
            $query = $this->db->query($sql);

            return $query->result();
            return FALSE;
        } else {
            $sql = "SELECT * FROM class_timetable WHERE class_id ={$keyword}";
            $query = $this->db->query($sql);

            return $query->result();
        }
    }

    function delete($timetable_id) {

        $sql = "DELETE FROM class_timetable WHERE id='{$timetable_id}'";
        $query = $this->db->query($sql);

        return TRUE;
    }

    function get_timetable_slot($timetable_id, $slot_id) {
        $sql = "SELECT * FROM timetable_slot WHERE timetable_id='{$timetable_id}' AND slot_id='{$slot_id}'";
        $query = $this->db->query($sql);

        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            $timetable = $query->row();
            $slot['timetable_id'] = $timetable->timetable_id;
            $slot['slot_id'] = $timetable->slot_id;
            $slot['teacher_id'] = $timetable->teacher_id;
            $slot['subject_id'] = $timetable->subject_id;

            return $slot;
        }
    }

  

    function get_teacher_list() {
        $sql = "SELECT * FROM teachers";
        $query = $this->db->query($sql);

        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function get_subject_list() {
        $sql = "SELECT * FROM subjects";
        $query = $this->db->query($sql);

        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function get_subject_name($subject_id) {
        $sql = "SELECT * FROM subjects WHERE id = {$subject_id}";
        $query = $this->db->query($sql);
        $subject = $query->row();

        return $subject->subject_name;
    }

    function get_teacher_name($teacher_id) {
        $sql = "SELECT * FROM teachers WHERE id = {$teacher_id}";
        $query = $this->db->query($sql);

        $teacher = $query->row();
        return $teacher->name_with_initials;
    }

    function get_timetable_year($timetable_id) {
        $sql = "SELECT * FROM class_timetable WHERE id = {$timetable_id}";
        $query = $this->db->query($sql);
        $timetable = $query->row();

        return $timetable->year;
    }

    function already_have_slot($teacher_id, $slot_id, $year) {
        $sql = "SELECT * FROM timetable_slot WHERE teacher_id=$teacher_id AND slot_id='$slot_id' AND year='$year'";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->timetable_id;
        } else {
            return FALSE;
        }
    }

    function delete_slots($timetable_id) {
        $sql = "DELETE FROM timetable_slot WHERE timetable_id=$timetable_id";
        $query = $this->db->query($sql);

        return TRUE;
    }

    function delete_slot($timetable_id, $slot_id) {
        $sql = "DELETE FROM timetable_slot WHERE timetable_id=$timetable_id AND slot_id='$slot_id'";
        $query = $this->db->query($sql);

        return TRUE;
    }

    function timetable_already_have($class_id, $year) {
        $sql = "SELECT * FROM class_timetable WHERE class_id=$class_id AND year='$year'";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function add_slot($slot) {
        $timetable_id = $slot['timetable_id'];
        $slot_id = $slot['slot_id'];
        $teacher_id = $slot['teacher_id'];
        $subject_id = $slot['subject_id'];
        $year = $slot['year'];
        $class_id = $slot['class_id'];
        $sql = "INSERT INTO timetable_slot (timetable_id, slot_id, teacher_id, subject_id, year,class_id) VALUES($timetable_id, '$slot_id', $teacher_id, $subject_id, '$year',$class_id)";

        if ($this->db->query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
      * get time slots of a teacher
    **/

    function get_time_slot($teacher_id) {

      try {

        $query = $this->db->query("SELECT c.grade_id,c.name,s.subject_name,t.slot_id
                                    FROM timetable_slot t,classes c,subjects s, class_timetable ct
                                    WHERE t.teacher_id = $teacher_id and ct.class_id=t.class_id and ct.class_id=c.id and s.id=t.subject_id");
        return $query->result();

      } catch (Exception $e) {
        return FALSE;
      }

    }

    function get_class_id($timetable_id) {
      try {

        $query = $this->db->query("SELECT class_id  FROM class_timetable WHERE id = $timetable_id ");
        $row = $query->row();
        return $row->class_id;

      } catch (Exception $e) {
        return FALSE;
      }

    }



}
