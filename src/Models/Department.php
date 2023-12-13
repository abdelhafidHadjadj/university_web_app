<?php
class Department
{
    private $DepartmentID,
        $DepartmentName,
        $DepartmentHead,
        $Location;


    public function __construct($id, $dn, $dh, $loc)
    {
        $this->DepartmentID = $id;
        $this->DepartmentName = $dn;
        $this->DepartmentHead = $dh;
        $this->Location = $loc;
    }

    public function addDepartment($pdo)
    {
        try {
            $req = "INSERT INTO Departments (DepartmentID, DepartmentName, DepartmentHead, Location) 
                    VALUES (:DepartmentID, :DepartmentName, :DepartmentHead, :Location)";

            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':DepartmentID', $this->DepartmentID, PDO::PARAM_STR);
            $stmt->bindParam(':DepartmentName', $this->DepartmentName, PDO::PARAM_STR);
            $stmt->bindParam(':DepartmentHead', $this->DepartmentHead, PDO::PARAM_STR);
            $stmt->bindParam(':Location', $this->Location, PDO::PARAM_STR);
            $stmt->execute();
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            die("Error adding department: " . $e->getMessage());
        }
    }
}
