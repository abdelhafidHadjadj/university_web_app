<?php
class Registration
{
    private $RegistrationID,
        $StudentID,
        $CourseID,
        $RegistrationDate,
        $Grade;

    public function __construct($id, $stID, $crID, $regID, $grad)
    {
        $this->RegistrationID = $id;
        $this->StudentID = $stID;
        $this->CourseID = $crID;
        $this->RegistrationDate = $regID;
        $this->Grade = $grad;
    }

    public function addRegistration($pdo)
    {
        try {
            $req = "INSERT INTO Registrations (RegistrationID, StudentID, CourseID, RegistrationDate, Grade) 
                    VALUES (:RegistrationID, :StudentID, :CourseID, :RegistrationDate, :Grade)";

            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':RegistrationID', $this->RegistrationID, PDO::PARAM_STR);
            $stmt->bindParam(':StudentID', $this->StudentID, PDO::PARAM_STR);
            $stmt->bindParam(':CourseID', $this->CourseID, PDO::PARAM_STR);
            $stmt->bindParam(':RegistrationDate', $this->RegistrationDate, PDO::PARAM_STR);
            $stmt->bindParam(':Grade', $this->Grade, PDO::PARAM_STR);
            $stmt->execute();
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            die("Error adding Registration: " . $e->getMessage());
        }
    }
    public function getRegistrationID()
    {
        return $this->RegistrationID;
    }
    public function getStudentID()
    {
        return $this->StudentID;
    }
    public function getCourseID()
    {
        return $this->CourseID;
    }
    public function getRegistrationDate()
    {
        return $this->RegistrationDate;
    }
    public function getGrade()
    {
        return $this->Grade;
    }
}
