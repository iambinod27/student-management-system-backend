<?php 

require_once "database.php";

// Query Function
function createDbQuery($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "error in the query: " . mysqli_error($conn);
    }
}

$user = "CREATE TABLE IF NOT EXISTS users (
    id INT(10) PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30),
    middle_name VARCHAR(30),
    last_name VARCHAR(30),
    email VARCHAR(50) NOT NULL UNIQUE ,
    password VARCHAR(512) NOT NULL,
    gender ENUM('Male', 'Female', 'Others'),
    address VARCHAR(255),
    phone INT(10),
    profile_pic VARCHAR(255),
    dob DATE,
    access_level INT DEFAULT 2,
    created_at TIMESTAMP
);";

$teacher = "CREATE TABLE IF NOT EXISTS teachers (
    id INT(10) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(10)
);";

$subject = "CREATE TABLE IF NOT EXISTS subjects (
    id INT(10) PRIMARY KEY AUTO_INCREMENT,
    subject_name VARCHAR(30)
);";

$class = "CREATE TABLE IF NOT EXISTS classes (
    id INT(10) PRIMARY KEY AUTO_INCREMENT,
    grade_name VARCHAR(30),
    teacher_id INT(10),
    CONSTRAINT fk_class_teacher FOREIGN KEY (teacher_id) REFERENCES teachers(id)
);";

$section = "CREATE TABLE IF NOT EXISTS sections (
    id INT(10) PRIMARY KEY AUTO_INCREMENT,
    class_id INT(10),
    section_name VARCHAR(50),
    CONSTRAINT fk_section_class FOREIGN KEY (class_id) REFERENCES  classes(id)
);";

$student = "CREATE TABLE IF NOT EXISTS students (
    id INT(10) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(10),
    class_id INT(10),
    CONSTRAINT fk_student_user FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_student_class FOREIGN KEY (class_id) REFERENCES classes(id)
);";

$attendance = "CREATE TABLE IF NOT EXISTS attendance (
    id INT(10) PRIMARY KEY AUTO_INCREMENT,
    student_id INT(10),
    status ENUM('Present', 'Absent', 'Late'),
    teacher_id INT(10),
    date DATE,
    class_id INT(10),
    CONSTRAINT fk_attendance_student FOREIGN KEY (student_id) REFERENCES students(id),
    CONSTRAINT fk_attendance_teacher FOREIGN KEY (teacher_id) REFERENCES teachers(id),
    CONSTRAINT fk_attendance_class FOREIGN KEY (class_id) REFERENCES classes(id)
);";

$classStudent = "CREATE TABLE IF NOT EXISTS classStudents (
    class_id INT(10),
    student_id INT(10),
    years DATE,
    PRIMARY KEY (class_id, student_id),
    CONSTRAINT fk_classStudent_class FOREIGN KEY (class_id) REFERENCES classes(id),
    CONSTRAINT fk_classStudent_student FOREIGN KEY (student_id) REFERENCES students(id)
);";


$teacherSubject = "CREATE TABLE IF NOT EXISTS teacherSubjects (
    teacher_id INT(10),
    subject_id INT(10),
    PRIMARY KEY (teacher_id, subject_id),
    CONSTRAINT fk_teacherSubject_teacher FOREIGN KEY (teacher_id) REFERENCES teachers(id),
    CONSTRAINT fk_teacherSubject_subject FOREIGN KEY (subject_id) REFERENCES  subjects(id)
);";
?>