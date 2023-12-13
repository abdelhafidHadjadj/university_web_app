<?php
class Student
{
    private $StudentID,
        $FirstName,
        $LastName,
        $DateOfBirth,
        $Email,
        $DepartmentID;

    public function __construct($id, $fn, $ln, $dob, $em, $dpID)
    {
        $this->StudentID = $id;
        $this->FirstName = $fn;
        $this->LastName = $ln;
        $this->DateOfBirth = $dob;
        $this->Email = $em;
        $this->DepartmentID = $dpID;
    }

    public function addStudent($pdo)
    {
        try {
            $req = "INSERT INTO Students (StudentID, FirstName, LastName, DateOfBirth, Email, DepartmentID) 
                    VALUES (:StudentID, :firstName, :lastName, :dateOfBirth, :email, :departmentID)";

            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':StudentID', $this->StudentID, PDO::PARAM_STR);
            $stmt->bindParam(':firstName', $this->FirstName, PDO::PARAM_STR);
            $stmt->bindParam(':lastName', $this->LastName, PDO::PARAM_STR);
            $stmt->bindParam(':dateOfBirth', $this->DateOfBirth, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->Email, PDO::PARAM_STR);
            $stmt->bindParam(':departmentID', $this->DepartmentID, PDO::PARAM_INT);
            $stmt->execute();
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            die("Error adding student: " . $e->getMessage());
        }
    }

    public function getStudentId()
    {
        return $this->StudentID;
    }
    public function setStudentId($studentID)
    {
        return $this->StudentID = $studentID;
    }
    public function getFirstName()
    {
        return $this->FirstName;
    }
    public function setFirstName($fn)
    {
        return $this->FirstName = $fn;
    }
    public function getLastName()
    {
        return $this->LastName;
    }
    public function setLastName($ln)
    {
        return $this->LastName = $ln;
    }
    public function getDateOfBirth()
    {
        return $this->DateOfBirth;
    }
    public function setDateOfBirth($date)
    {
        return $this->DateOfBirth = $date;
    }
    public function getEmail()
    {
        return $this->Email;
    }
    public function setEmail($email)
    {
        return $this->Email = $email;
    }
    public function getDepartmentID()
    {
        return $this->DepartmentID;
    }
    public function setDepartmentID($dpID)
    {
        return $this->DepartmentID = $dpID;
    }
}
