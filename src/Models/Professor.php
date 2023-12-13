<?php
class Professor
{
    private $ProfessorID,
        $FirstName,
        $LastName,
        $Email,
        $DepartmentID;

    public function __construct($id, $fn, $ln, $em, $depID)
    {
        $this->ProfessorID = $id;
        $this->FirstName = $fn;
        $this->LastName = $ln;
        $this->Email = $em;
        $this->DepartmentID = $depID;
    }

    public function addProfessor($pdo)
    {
        try {
            $req = "INSERT INTO Professors (ProfessorID, FirstName, LastName, Email, DepartmentID) 
                    VALUES (:ProfessorID, :FirstName, :LastName, :Email, :DepartmentID)";

            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':ProfessorID', $this->ProfessorID, PDO::PARAM_STR);
            $stmt->bindParam(':FirstName', $this->FirstName, PDO::PARAM_STR);
            $stmt->bindParam(':LastName', $this->LastName, PDO::PARAM_STR);
            $stmt->bindParam(':Email', $this->Email, PDO::PARAM_STR);
            $stmt->bindParam(':DepartmentID', $this->DepartmentID, PDO::PARAM_STR);
            $stmt->execute();
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            die("Error adding professor: " . $e->getMessage());
        }
    }

    public function getProfessorID()
    {
        return $this->ProfessorID;
    }
    public function getFirstName()
    {
        return $this->FirstName;
    }
    public function getLastName()
    {
        return $this->LastName;
    }
    public function getEmail()
    {
        return $this->Email;
    }
    public function getDepartmentID()
    {
        return $this->DepartmentID;
    }
}
