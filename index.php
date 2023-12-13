<?php

require_once('./config/config.php');
require('./Controllers/DatabaseManager.php');
require('./src/Models/Department.php');
require('./src/Models/Student.php');
require('./src/Models/Professor.php');
require('./src/Models/Course.php');
require('./src/Models/Registration.php');
require('./Controllers/QueryManager.php');

DataBaseManger::createTables($pdo);
$info = new Department(1, "IT", "CS", "BBZ");
// $info->addDepartment($pdo);
// $info1 = new Department(2, "AI", "CS", "USTHB");
// $info1->addDepartment($pdo);
// $info2 = new Department(3, "IL", "CS", "USTHB");
// $ELN1 = new Department(4, "ES", "FEG", "USTHB");
// $Telecom1 = new Department(5, "RT", "FEG", "USTHB");
// $info2->addDepartment($pdo);
// $ELN1->addDepartment($pdo);
// $Telecom1->addDepartment($pdo);

// $std1 = new Student(1, "Hadjadj", "Abdelhafid", "2001-07-08", "hafi@gmail.com", 1);
// $std2 = new Student(2, "Hadjadj", "SiSi", "2015-12-04", "SiSi@gmail.com", 2);
// $std3 = new Student(3, "Hadjadj", "Zako", "2004-10-31", "zako@gmail.com", 4);
// $std4 = new Student(4, "Helali", "Meri", "2001-11-29", "meri@gmail.com", 1);

// $std1->addStudent($pdo);
// $std2->addStudent($pdo);
// $std3->addStudent($pdo);
// $std4->addStudent($pdo);



// $prof1 = new Professor(1, "Belache", "Moh", "moh@gmail.com", 2);
// $prof2 = new Professor(2, "zafoune", "zaf", "zaf@gmail.com", 1);
// $prof3 = new Professor(3, "Derras", "der", "der@gmail.com", 1);
// $prof4 = new Professor(4, "tarek", "****", "***@gmail.com", 4);

// $prof1->addProfessor($pdo);
// $prof2->addProfessor($pdo);
// $prof3->addProfessor($pdo);
// $prof4->addProfessor($pdo);


// $course1 = new Course(1, "WEB PROG", 1, 1, 40);
// $course2 = new Course(2, "Network", 2, 1, 80);
// $course3 = new Course(3, "JAVA", 1, 2, 40);
// $course4 = new Course(4, "IOT", 4, 4, 120);
// $course5 = new Course(5, "AI", 1, 2, 90);

// $course1->addCourse($pdo);
// $course2->addCourse($pdo);
// $course3->addCourse($pdo);
// $course4->addCourse($pdo);
// $course5->addCourse($pdo);


// $reg1 = new Registration(1, 1, 1, "2023-12-13", 15);
// $reg2 = new Registration(2, 2, 2, "2023-12-13", 20);
// $reg3 = new Registration(3, 3, 1, "2023-12-13", 15);
// $reg4 = new Registration(4, 1, 2, "2023-12-05", 15);
// $reg5 = new Registration(5, 4, 5, "2023-12-05", 20);

// $reg1->addRegistration($pdo);
// $reg2->addRegistration($pdo);
// $reg3->addRegistration($pdo);
// $reg4->addRegistration($pdo);
// $reg5->addRegistration($pdo);


$query1 = new QueryManager($pdo);
$res = $query1->getCoursesByDepartment(1);

if (is_array($res)) {
    echo '<pre>';
    print_r($res);
    echo '</pre>';
} else {
    echo "err";
}

$query2 = new QueryManager($pdo);
$res2 = $query2->findHighestGrade(1);
if (is_array($res2)) {
    echo '<pre>';
    print_r($res2);
    echo '</pre>';
} else {
    echo "err";
}



$query3 = new QueryManager($pdo);
$res3 = $query3->getTotalCreditHours(1);

if (is_array($res3)) {
    echo '<pre>';
    print_r($res3);
    echo '</pre>';
} else {
    echo "err";
}


$query4 = new QueryManager($pdo);
$res4 = $query4->getStudentByCourse(1);

if (is_array($res4)) {
    echo '<pre>';
    print_r($res4);
    echo '</pre>';
} else {
    echo "err";
}


$query5 = new QueryManager($pdo);
$res5 = $query5->getProfessorsWithMostCourses();

if (is_array($res5)) {
    echo '<pre>';
    print_r($res5);
    echo '</pre>';
} else {
    echo "err";
}

$query6 = new QueryManager($pdo);
$res6 = $query6->generateRegistrationReport();

if (is_array($res6)) {
    echo '<pre>';
    print_r($res6);
    echo '</pre>';
} else {
    echo "err";
}
