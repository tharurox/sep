<?php

function get_grade_name($grade_id){
    return ordinal($grade_id) . " " . "Grade";
}

function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}

function get_class_teacher_name($teacher_id){
    $ci =& get_instance();
    $ci->load->model('teacher_model');
    
    $teacher = $ci->teacher_model->get_teacher_name($teacher_id);
    if(!$teacher){
        return "-- Not Assigned --";
    } else {
        return $teacher->name_with_initials;
    }
}

function get_religion($religion_id){
    switch ($religion_id){
        case 1:
            return "Buddhism";
        case 2:
            return "Hinduism";
        case 3:
            return "Islam";
        case 4:
            return "Catholicism";
        case 5:
            return "Christianity";
        default :
            return "Undefined";
    }
}

function get_number_of_students($class_id){
    $ci =& get_instance();
    $ci->load->model('class_model');
    return $ci->class_model->get_number_of_students($class_id);
}