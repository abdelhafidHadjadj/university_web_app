<?php

require_once('./config/config.php');

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
        $x->bindParam(':departmentID', $departmentID, PDO::PARAM_INT);
        $e = $x->execute();
        if ($e) {
            return $x->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "Error";
        }
    }
    public function findHighestGrade($studentID)
    {
        $req = "SELECT MAX(Grade) as HighestGrade, MIN(Grade) as LowestGrade FROM Registrations WHERE StudentID = :studentID";
        $x = $this->pdo->prepare($req);
        $x->bindParam(':studentID', $studentID, PDO::PARAM_INT);
        $e = $x->execute();
        if ($e) {
            return $x->fetchAll(PDO::FETCH_ASSOC);
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
        $x->bindParam(':studentID', $studentID, PDO::PARAM_INT);
        $e = $x->execute();
        if ($e) {
            return $x->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "err";
        }
    }
    public function getStudentByCourse($courseID)
    {
        $req = "SELECT Students.* FROM Students
        INNER JOIN Registrations ON Students.StudentID = Registrations.StudentID
        WHERE Registrations.CourseID = :courseID";
        $x = $this->pdo->prepare($req);
        $x->bindParam(':courseID', $courseID, PDO::PARAM_INT);
        $e = $x->execute();
        if ($e) {
            return $x->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "err";
        }
    }
    public function getProfessorsWithMostCourses()
    {
        $req = "SELECT Professors.*,COUNT(Courses.CourseID) as CourseCount FROM Professors
        INNER JOIN Courses ON Professors.ProfessorID = Courses.ProfessorID
        GROUP BY Professors.ProfessorID
        ORDER BY CourseCount DESC
        LIMIT 1";
        $x = $this->pdo->prepare($req);
        $e = $x->execute();
        if ($e) {
            return $x->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "err";
        }
    }
    public function generateRegistrationReport()
    {
        $req = "SELECT Students.FirstName, Students.LastName, Courses.CourseName, Registrations.Grade
        FROM Students
        INNER JOIN Registrations ON Students.StudentID = Registrations.StudentID
        INNER JOIN Courses ON Registrations.CourseID = Courses.CourseID
        ";
        $x = $this->pdo->prepare($req);
        $e = $x->execute();
        if ($e) {
            return $x->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "err";
        }
    }
}
