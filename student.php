<?php

require('./src/Models/Student.php');
require_once('./config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            margin-bottom: 10px;
            padding: 0.5rem 1rem;
        }

        button {
            margin-top: 10px;
        }

        .result-container {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <h2>Add Student</h2>
        <div>
            <label>ID</label>
            <input type="number" name="id" required>
        </div>
        <div>
            <label>FirstName</label>
            <input type="text" name="FirstName" required>
        </div>
        <div>
            <label>LastName</label>
            <input type="text" name="LastName" required>
        </div>
        <div>
            <label>Date Of Birth</label>
            <input type="date" name="dob" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="Email" required>
        </div>
        <div>
            <label>Department ID</label>
            <input type="number" name="departID" required>
        </div>
        <div>
            <input type="submit" name="submit">
        </div>
    </form>

</body>

</html>


<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $dob = $_POST['dob'];
    $Email = $_POST['Email'];
    $departID = $_POST['departID'];
    $student = new Student($id, $FirstName, $LastName, $dob, $Email, $departID);
    $student->addStudent($pdo);
    echo "Student added successfully";
}
?>