CREATE TABLE activity_feed (
    id int(11) NOT NULL AUTO_INCREMENT,
    initiator_id int(11) NOT NULL,
    activity_type int(11) NOT NULL,
    activity_time timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE users(
    id int(11) NOT NULL AUTO_INCREMENT,
    username varchar(20) NOT NULL,
    password varchar(128) NOT NULL,
    first_name varchar(255) DEFAULT NULL,
    last_name varchar(255) DEFAULT NULL,
    user_type char(1) NOT NULL, -- A=ADMIN, T=TEACHER, S=STUDENT, L=TOPLEVEL
    created_at datetime DEFAULT NULL,
    lastvisit_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    superuser int(1) NOT NULL DEFAULT '0',
    PRIMARY KEY(id),
    UNIQUE (username)
)
    

CREATE TABLE activity_type (
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(120) NOT NULL,
    color_code varchar(120) NOT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE apply_leaves (
    id int(11) NOT NULL AUTO_INCREMENT,
    user_id int(11) DEFAULT NULL,
    teacher_id int(11) DEFAULT NULL,
    leave_type_id int(11) DEFAULT NULL,
    is_half_day tinyint(1) DEFAULT NULL,
    start_date date DEFAULT NULL,
    end_date date DEFAULT NULL,
    reason varchar(255) DEFAULT NULL,
    approved tinyint(1) DEFAULT '0',
    viewed_by_toplevel tinyint(1) DEFAULT '0',
    is_pending tinyint(1) DEFAULT '0',
    remarks varchar(255) DEFAULT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE archived_teachers (
    id int(11) NOT NULL AUTO_INCREMENT,
    signature_no varchar(10) DEFAULT NULL,
    email varchar(255) DEFAULT NULL,
    serial_no varchar(10) DEFAULT NULL,
    personal_file_no varchar(20) DEFAULT NULL,
    full_name varchar(255) DEFAULT NULL,
    name_with_initials varchar(255) DEFAULT NULL,
    gender char(1) DEFAULT NULL, -- M=MALE, F=FEMALE
    section int(11) DEFAULT NULL,
    teacher_register_no varchar(30) DEFAULT NULL,
    nic_no varchar(10) DEFAULT NULL,
    permanent_addr varchar(512) DEFAULT NULL,
    wnop_no varchar(20) DEFAULT NULL,
    service int(11) DEFAULT NULL,
    grade int(11) DEFAULT NULL,
    nature_of_appointment varchar(40) DEFAULT NULL,
    main_subject_id int(11) DEFAULT NULL,
    medium char(1) DEFAULT NULL, -- S=SINHALA, T=TAMIL, E=ENGLISH
    first_appointment_date date DEFAULT NULL,
    contact_mobile varchar(15) DEFAULT NULL,
    contact_home varchar(15) DEFAULT NULL,
    dob date DEFAULT NULL, -- dob=DATE OF BIRTH
    remarks varchar(255) DEFAULT NULL,
    civil_status char(1) DEFAULT NULL, -- M=MARRIED, S=SINGLE, D=DIVORCED, W=WIDOWED
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    photo_file_name varchar(255) DEFAULT NULL,
    photo_content_type varchar(255) DEFAULT NULL,
    photo_data mediumblob,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE teachers(
    id int(11) NOT NULL AUTO_INCREMENT,
    user_id int(11) NOT NULL AUTO_INCREMENT,
    signature_no varchar(10) DEFAULT NULL,
    email varchar(255) DEFAULT NULL,
    serial_no varchar(10) DEFAULT NULL,
    personal_file_no varchar(20) DEFAULT NULL,
    full_name varchar(255) DEFAULT NULL,
    name_with_initials varchar(255) DEFAULT NULL,
    gender char(1) DEFAULT NULL, -- M=MALE, F=FEMALE
    section int(11) DEFAULT NULL,
    teacher_register_no varchar(30) DEFAULT NULL,
    nic_no varchar(10) DEFAULT NULL,
    permanent_addr varchar(512) DEFAULT NULL,
    wnop_no varchar(20) DEFAULT NULL,
    service int(11) DEFAULT NULL,
    grade int(11) DEFAULT NULL,
    nature_of_appointment varchar(40) DEFAULT NULL,
    main_subject_id int(11) DEFAULT NULL,
    medium char(1) DEFAULT NULL, -- S=SINHALA, T=TAMIL, E=ENGLISH
    first_appointment_date date DEFAULT NULL,
    contact_mobile varchar(15) DEFAULT NULL,
    contact_home varchar(15) DEFAULT NULL,
    dob date DEFAULT NULL, -- dob=DATE OF BIRTH
    remarks varchar(255) DEFAULT NULL,
    civil_status char(1) DEFAULT NULL, -- M=MARRIED, S=SINGLE, D=DIVORCED, W=WIDOWED
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    photo_file_name varchar(255) DEFAULT NULL,
    photo_content_type varchar(255) DEFAULT NULL,
    photo_data mediumblob,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;
    

CREATE TABLE archived_students(
    id int(11) NOT NULL AUTO_INCREMENT,
    user_id int(11) DEFAULT NULL,
    admission_no varchar(255) DEFAULT NULL,
    admission_date date DEFAULT NULL,
    full_name varchar(255) DEFAULT NULL,
    name_with_initials varchar(255) DEFAULT NULL,
    dob date DEFAULT NULL,
    gender char(1) DEFAULT NULL, -- M=MALE, F=FEMALE
    nic_no varchar(10) DEFAULT NULL,
    language varchar(1) DEFAULT NULL, -- S=SINHALA, T=TAMIL
    religion varchar(3) DEFAULT NULL, -- BUD, MUS, HIN, NRC, RCH
    permanent_addr varchar(512) DEFAULT NULL,
    contact_home varchar(15) DEFAULT NULL,
    email varchar(255) DEFAULT NULL,
    house_id int(11) DEFAULT NULL,
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    photo_file_name varchar(255) DEFAULT NULL,
    photo_content_type varchar(255) DEFAULT NULL,
    photo_data mediumblob,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE students(
    id int(11) NOT NULL AUTO_INCREMENT,
    user_id int(11) DEFAULT NULL,
    admission_no varchar(255) DEFAULT NULL,
    admission_date date DEFAULT NULL,
    full_name varchar(255) DEFAULT NULL,
    name_with_initials varchar(255) DEFAULT NULL,
    dob date DEFAULT NULL,
    gender char(1) DEFAULT NULL, -- M=MALE, F=FEMALE
    nic_no varchar(10) DEFAULT NULL,
    language varchar(1) DEFAULT NULL, -- S=SINHALA, T=TAMIL
    religion varchar(3) DEFAULT NULL, -- BUD, MUS, HIN, NRC, RCH
    permanent_addr varchar(512) DEFAULT NULL,
    contact_home varchar(15) DEFAULT NULL,
    email varchar(255) DEFAULT NULL,
    house_id int(11) DEFAULT NULL,
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    photo_file_name varchar(255) DEFAULT NULL,
    photo_content_type varchar(255) DEFAULT NULL,
    photo_data mediumblob,
    PRIMARY KEY(id)    
) CHARSET=utf8;

CREATE TABLE grades(
    id int(11) NOT NULL AUTO_INCREMENT,
    section_id int(11) DEFAULT NULL,
    head_user_id int(11) DEFAULT NULL,
    name varchar(120) DEFAULT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE classes(
    id int(11) NOT NULL AUTO_INCREMENT,
    grade_id int(11) DEFAULT NULL,
    name varchar(120) DEFAULT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE sections(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(120) DEFAULT NULL,
    head_user_id int(11) DEFAULT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE student_class(
    student_id int(11) NOT NULL,
    class_id int(11) NOT NULL,
    year char(4) NOT NULL,
    PRIMARY KEY(student_id, class_id, year)
) DEFAULT CHARSET=utf8;

CREATE TABLE subjects(
    id int(11) NOT NULL AUTO_INCREMENT,
    subject_name varchar(120) DEFAULT NULL,
    subject_code varchar(120) DEFAULT NULL,
    section_id int(11) DEFAULT NULL,
    subject_incharge_id int(11) DEFAULT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE leave_types(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) DEFAULT NULL,
    max_leave_count int(11) DEFAULT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;


CREATE TABLE events(
    id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(1000) DEFAULT NULL,
    desc text DEFAULT NULL,
    start_time datetime DEFAULT NULL,
    end_time datetime DEFAULT NULL,
    in_charge_id int(11) DEFAULT NULL,
    is_sport_event tinyint(1) DEFAULT NULL,
    society_or_sport_id int(11) DEFAULT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8; 

CREATE TABLE exams(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) DEFAULT NULL,
    grade_id int(11) DEFAULT NULL,
    year char(4) DEFAULT NULL,
    start_date datetime DEFAULT NULL,
    end_date datetime DEFAULT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE exam_subjects(
    exam_id int(11) NOT NULL,
    subject_id int(11) NOT NULL,
    PRIMARY KEY(exam_id, subject_id)
) DEFAULT CHARSET=utf8;

CREATE TABLE exam_marks(
    exam_id int(11) NOT NULL,
    student_id int(11) NOT NULL,
    subject_id int(11) NOT NULL,
    marks double DEFAULT NULL,
    PRIMARY KEY(exam_id, student_id, subject_id)
) DEFAULT CHARSET=utf8;

CREATE TABLE government_exams(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) DEFAULT NULL,
    year char(4) DEFAULT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE government_exam_marks(
    government_exam_id int(11) NOT NULL,
    student_id int(11) NOT NULL,
    subject_id int(11) NOT NULL,
    grade char(2) DEFAULT NULL
) DEFAULT CHARSET=utf8;

CREATE TABLE government_exam_admission_nos(
    government_exam_id int(11) NOT NULL,
    student_id int(11) NOT NULL,
    admission_no varchar(15) NOT NULL
    PRIMARY KEY(government_exam_id, student_id, admission_no)
) DEFAULT CHARSET=utf8;

CREATE TABLE guardians(
    id int(11) NOT NULL AUTO_INCREMENT,
    student_id int(11) DEFAULT NULL,
    fullname varchar(255) DEFAULT NULL,
    name_with_initials varchar(255) DEFAULT NULL,
    relation varchar(255) DEFAULT NULL,
    contact_mobile varchar(15) DEFAULT NULL,
    contact_home varchar(15) DEFAULT NULL,
    addr varchar(400) DEFAULT NULL,
    dob date DEFAULT NULL,
    occupation varchar(255) DEFAULT NULL,
    gender char(1) DEFAULT NULL,
    is_pastpupil tinyint(1) DEFAULT '0';
    house_id int(11) DEFAULT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;

CREATE TABLE houses(
    id int(11) NOT NULL AUTO_INCREMENT,
    house_name varchar(255) DEFAULT NULL,
    PRIMARY KEY(id),
) DEFAULT CHARSET=utf8;

CREATE TABLE news(
    id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(255) DEFAULT NULL,
    content text DEFAULT NULL,
    author_id int(11) DEFAULT NULL,
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARSET=utf8;
    