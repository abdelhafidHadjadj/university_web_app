<?php

require_once('../config/config.php');

class QueryManager
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function getCoursesByDepartment($departmentID)
    {
        $req = "SELECT * FROM Courses WHERE DepartmentID = :departmentID";
        $x = $this->pdo->prepare($req);
        $e = $x->prepare($req);
        if ($e) {
            echo "res(200)";
        } else {
            echo "err";
        }
    }
    public function findHighestGrade($studentID)
    {
        $req = "SELECT MAX(Grade) as HighestGrade, MIN(Grade) as LowestGrade FROM Registrations WHERE StudentID = :studentID";
        $x = $this->pdo->prepare($req);
        $e = $x->prepare($req);
        if ($e) {
            echo "res(200)";
        } else {
            echo "err";
        }
    }
    public function getTotalCreditHours($studentID)
    {
        $req = "SELECT SUM(CreditHours) as TotalCreditHours FROM Courses
        INNER JOIN Registrations ON Courses.CourseID = Registrations.CourseID
        WHERE Registrations.StudentID = :studentID";
        $x = $this->pdo->prepare($req);
        $e = $x->prepare($req);
        if ($e) {
            echo "res(200)";
        } else {
            echo "err";
        }
    }
    public function getStudentByCourse($courseID)
    {
        $req = "SELECT Students.* FROM Students
        INNER JOIN Registrations ON Students.StudentID = Refistrations.StudentID
        WHERE Registrations.CourseID = :courseID";
        $x = $this->pdo->prepare($req);
        $e = $x->prepare($req);
        if ($e) {
            echo "res(200)";
        } else {
            echo "err";
        }
    }
    public function getProfessorsWithMostCourses()
    {
        $req = "SELECT Professors.*,COUNT(Courses.CourseID) as CourseCount FROM Professors
        INNER JOIN Courses ON Professors.ProfessorID = Courses.ProfessorID
        GROUP BY Professors.ProfessorID
        ORDER BY CourseCount DEC
        LIMIT 1";
        $x = $this->pdo->prepare($req);
        $e = $x->prepare($req);
        if ($e) {
            echo "res(200)";
        } else {
            echo "err";
        }
    }
    public function generateRegistrationReport()
    {
        $req = "SELECT Students.FirstName, Students.LastName, Courses.CourseName, Regisrations.Grade
        FROM Students
        INNER JOIN Registrations ON Students.StudentID = Registrations.StudentID
        INNER JOIN Courses ON Registrations.CourseID = Courses.CourseID
        ";
        $x = $this->pdo->prepare($req);
        $e = $x->prepare($req);
        if ($e) {
            echo "res(200)";
        } else {
            echo "err";
        }
    }
}
