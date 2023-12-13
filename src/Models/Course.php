<?php
class Course
{
    private $CourseID,
        $CourseName,
        $ProfessorID,
        $DepartmentID,
        $CreditHours;


    public function __construct($id, $cn, $proID, $depID, $credHr)
    {
        $this->CourseID = $id;
        $this->CourseName = $cn;
        $this->ProfessorID = $proID;
        $this->DepartmentID = $depID;
        $this->CreditHours = $credHr;
    }

    public function addCourse($pdo)
    {
        try {
            $req = "INSERT INTO Courses (CourseID, CourseName, ProfessorID, DepartmentID, CreditHours) 
                    VALUES (:CourseID, :CourseName, :ProfessorID, :DepartmentID, :CreditHours)";

            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':CourseID', $this->CourseID, PDO::PARAM_STR);
            $stmt->bindParam(':CourseName', $this->CourseName, PDO::PARAM_STR);
            $stmt->bindParam(':ProfessorID', $this->ProfessorID, PDO::PARAM_STR);
            $stmt->bindParam(':DepartmentID', $this->DepartmentID, PDO::PARAM_STR);
            $stmt->bindParam(':CreditHours', $this->CreditHours, PDO::PARAM_STR);
            $stmt->execute();
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            die("Error adding course: " . $e->getMessage());
        }
    }


    public function getCourseId()
    {
        return $this->CourseID;
    }
    public function setCourseId($courseID)
    {
        return $this->CourseID = $courseID;
    }
    public function getCourseName()
    {
        return $this->CourseName;
    }
    public function setCourseName($cn)
    {
        return $this->CourseName = $cn;
    }
    public function getProfessorID()
    {
        return $this->ProfessorID;
    }
    public function setProfessorID($prid)
    {
        return $this->ProfessorID = $prid;
    }
    public function getDepartmentID()
    {
        return $this->DepartmentID;
    }
    public function getCreditHours()
    {
        return $this->CreditHours;
    }
}
