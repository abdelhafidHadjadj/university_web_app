<?php

require('./src/Models/Course.php');
require_once('./config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
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
        <h2>Add Course</h2>
        <div>
            <label>ID</label>
            <input type="number" name="id" required>
        </div>
        <div>
            <label>Course Name</label>
            <input type="text" name="courseName" required>
        </div>
        <div>
            <label>Professor ID</label>
            <input type="number" name="professorID" required>
        </div>
        <div>
            <label>Department ID</label>
            <input type="number" name="departmentID" required>
        </div>
        <div>
            <label>Credit Hours</label>
            <input type="number" name="credHrs" required>
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
    $courseName = $_POST['courseName'];
    $professorID = $_POST['professorID'];
    $departmentID = $_POST['departmentID'];
    $credHrs = $_POST['credHrs'];
    $course = new Course($id, $courseName, $professorID, $departmentID, $credHrs);
    $course->addCourse($pdo);
    echo "Course added successfully";
}
?>