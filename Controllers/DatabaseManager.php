<?php


require_once('./config/config.php');
class DataBaseManger
{
    public static function createTables($pdo)
    {
        $sql = "
        CREATE TABLE IF NOT EXISTS Departments(
            DepartmentID INT PRIMARY KEY,
            DepartmentName varchar(50),
            DepartmentHead varchar(50),
            Location varchar(50)
        );

        CREATE TABLE IF NOT EXISTS Students (
            StudentID INT PRIMARY KEY,
            FirstName varchar(50),
            LastName varchar(50),
            DateOfBirth DATE,
            Email varchar(50),
            DepartmentID INT,
            FOREIGN KEY (DepartmentID) REFERENCES Departments(DepartmentID));

         CREATE TABLE IF NOT EXISTS Professors(
            ProfessorID INT PRIMARY KEY,
            FirstName varchar(50),
            LastName varchar(50),
            Email varchar(50),
            DepartmentID INT,
            FOREIGN KEY (DepartmentID) REFERENCES Departments(DepartmentID));

        CREATE TABLE IF NOT EXISTS Courses(
            CourseID INT PRIMARY KEY,
            CourseName varchar(50),
            ProfessorID INT,
            DepartmentID INT,
            CreditHours INT,
            FOREIGN KEY (ProfessorID) REFERENCES Professors(ProfessorID),
            FOREIGN KEY (DepartmentID) REFERENCES Departments(DepartmentID));

       
        CREATE TABLE IF NOT EXISTS Registrations(
            RegistrationID INT PRIMARY KEY,
            StudentID INT,
            CourseID INT,
            RegistrationDate DATE,
            Grade INT,
            FOREIGN KEY (StudentID) REFERENCES Students(StudentID),
            FOREIGN KEY (CourseID) REFERENCES Courses(CourseID));
        ";

        $x = $pdo->prepare($sql);
        $e = $x->execute();
        if ($e) {
            echo "Tables created successfully";
        } else {
            echo "Tables creation failed";
        }
    }
}
