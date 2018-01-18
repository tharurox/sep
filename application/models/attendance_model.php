<?php

/*
 * Model for handling Attendances. This interacts with the database to set and get attendace information.
 * -
 */

class Attendance_Model extends CI_Model {

    function get_all_temp_records() {
        $sql = "SELECT * FROM teachers t, temp_teacher_attendance a WHERE t.signature_no = a.signature_no";
        $query = $this->db->query($sql);

        return $query->result();
    }

    function is_already_recorded($signature_no) {
        $sql = "SELECT * FROM temp_teacher_attendance WHERE signature_no = '{$signature_no}'";
        $query = $this->db->query($sql);

        if ($query->num_rows == 1) {
            return TRUE;
        }

        $date = date("Y-m-d");

        $sql = "SELECT * FROM teacher_attendance WHERE signature_no = '{$signature_no}' AND date = '{$date}'";
        $query = $this->db->query($sql);

        if ($query->num_rows == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_temp_absent_records() {
        $sql = "SELECT t1.* FROM teachers t1 LEFT JOIN temp_teacher_attendance t2 ON t2.teacher_id = t1.id WHERE t2.teacher_id IS NULL";
        $query = $this->db->query($sql);

        if (!$query) {
            return NULL;
        } else {
            return $query->result();
        }
    }

    function is_valid_signature_no($signature_no) {
        $sql = "SELECT * FROM teachers WHERE signature_no = '{$signature_no}'";
        $query = $this->db->query($sql);

        if ($query->num_rows == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function add_record($signature_no) {
        $sql = "SELECT * FROM teachers WHERE signature_no = '{$signature_no}'";
        $query = $this->db->query($sql);
        $row = $query->row();
        $teacher_id = $row->id;

        $sql = "INSERT INTO temp_teacher_attendance (teacher_id, signature_no, is_present) "
                . "VALUES ($teacher_id, $signature_no, 1)";

        $query = $this->db->query($sql);

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function delete_record($signature_no) {
        $sql = "DELETE FROM temp_teacher_attendance WHERE signature_no = {$signature_no}";
        $query = $this->db->query($sql);

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function delete_temp() {
        $sql = "DELETE FROM temp_teacher_attendance";
        $query = $this->db->query($sql);

        return TRUE;
    }

    function save_attendance() {
        $sql = "SELECT * FROM temp_teacher_attendance";
        $query = $this->db->query($sql);
        $date = date("Y-m-d");

        $result = $query->result();

        foreach ($result as $row) {
            $sql = "INSERT INTO teacher_attendance (teacher_id, signature_no, is_present, date) ";
            $sql .= "VALUES ($row->teacher_id, $row->signature_no, 1, '$date')";
            $query = $this->db->query($sql);
        }
    }

    function save_absent($absent_list) {

        $date = date("Y-m-d");
        foreach ($absent_list as $absent) {
            $sql = "INSERT INTO teacher_attendance (teacher_id, signature_no, is_present, date) ";
            $sql .= "VALUES ($absent->id, $absent->signature_no, 0, '$date')";
            $query = $this->db->query($sql);
        }
    }

    function get_absent_list($date) {

        $sql = "SELECT * FROM teachers t, teacher_attendance a WHERE t.signature_no = a.signature_no AND a.date = '{$date}' AND a.is_present = 0";
        $query = $this->db->query($sql);

        if ($query->num_rows() == 0) {
            return null;
        } else {
            return $query->result();
        }
    }

    function search_attendance($date) {
        $sql = "SELECT * FROM teachers t, teacher_attendance a WHERE t.signature_no = a.signature_no AND a.date = '{$date}' AND a.is_present=1";
        $query = $this->db->query($sql);

        if ($query->num_rows() == 0) {
            return null;
        } else {
            return $query->result();
        }
    }

    function save_attendence_students($absent, $present, $date, $user_id) {


        if (sizeof($absent) > 0) {
            foreach ($absent as $value) {
                $sql = "INSERT INTO student_attendance(student_id,marked_by, is_present, date) ";
                $sql .= "VALUES ($value, $user_id, 0, '$date')";
                if ($this->db->query($sql)) {
                    if (($key = array_search($value, $absent)) !== false) {
                        unset($absent[$key]);
                    }
                }
            }

            if (sizeof($absent) == 0) {

                foreach ($present as $value) {
                    $sql = "INSERT INTO student_attendance(student_id,marked_by, is_present, date) ";
                    $sql .= "VALUES ($value, $user_id, 1, '$date')";
                    if ($this->db->query($sql)) {
                        if (($key = array_search($value, $present)) !== false) {
                            unset($present[$key]);
                        }
                    }
                }

                $sql = "INSERT INTO student_attendance_log(date)";
                $sql .= "VALUES ('$date')";
                $this->db->query($sql);
                return TRUE;
            }
        } else {
            foreach ($present as $value) {
                $sql = "INSERT INTO student_attendance(student_id,marked_by, is_present, date) ";
                $sql .= "VALUES ($value, $user_id, 1, '$date')";
                if ($this->db->query($sql)) {
                    if (($key = array_search($value, $present)) !== false) {
                        unset($present[$key]);
                    }
                }
            }
            if (sizeof($present == 0)) {
                $sql = "INSERT INTO student_attendance_log(date)";
                $sql .= "VALUES ('$date')";
                $this->db->query($sql);
                return TRUE;
            }
        }
    }

    function check_student_attendance_log($date) {

        $sql = "SELECT * FROM student_attendance_log WHERE date = '$date'";
        $query = $this->db->query($sql);

        if ($query->num_rows == 1) {
            return TRUE;
        }
    }

    function load_student_attendance_log() {
        $sql = "SELECT * FROM student_attendance_log";
        if ($query = $this->db->query($sql)) {
            return $query;
        } else {
            return FALSE;
        }
    }

    function get_all_student_ids() {

        $sql = "SELECT id FROM students";
        if ($query = $this->db->query($sql)) {
            return $query;
        } else {
            return FALSE;
        }
    }

    function get_attendance_data($id) {
        $sql = "SELECT date FROM student_attendance_log where id = '$id'";
        $query = $this->db->query($sql);
        $date = $query->row()->date;



        $sql2 = "SELECT a.id ,a.student_id, a.date , a.is_present ,s.admission_no , s.full_name  FROM student_attendance a ,students s where s.id=a.student_id and a.date = '$date'";
        $query2 = $this->db->query($sql2);

        return $query2;
    }

    function edit_attendence_students($new_absent, $new_present, $attendance_date) {
        $p = 1;
        $a = 0;

        if (sizeof($new_present > 0)) {
            foreach ($new_present as $pvalue) {
                $sql = "UPDATE student_attendance SET is_present = '$p' WHERE date = '$attendance_date' AND student_id = '$pvalue'";
                if ($this->db->query($sql)) {
                    if (($key = array_search($pvalue, $new_present)) !== false) {
                        unset($new_present[$key]);
                    }
                }
            }

            if (sizeof($new_present == 0)) {
                if (sizeof($new_absent > 0)) {
                    foreach ($new_absent as $avalue) {
                        $sql = "UPDATE student_attendance SET is_present = '$a' WHERE date = '$attendance_date' AND student_id = '$avalue'";
                        if ($this->db->query($sql)) {
                            if (($key = array_search($avalue, $new_absent)) !== false) {
                                unset($new_present[$key]);
                            }
                        }
                    }if (sizeof($new_present == 0)) {
                        return TRUE;
                    } else {
                        return FALSE;
                    }
                }
            } else {
                return FALSE;
            }
        } else if (sizeof($new_absent > 0)) {
            return TRUE;
        }
    }

}
