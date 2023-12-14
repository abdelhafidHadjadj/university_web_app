<?php

require('./src/Models/Registration.php');
require_once('./config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Registration</title>
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
        <h2>Add Registration</h2>
        <div>
            <label>ID</label>
            <input type="number" name="id" required>
        </div>
        <div>
            <label>StudentID</label>
            <input type="number" name="StudentID" required>
        </div>
        <div>
            <label>CourseID</label>
            <input type="number" name="CourseID" required>
        </div>
        <div>
            <label>Registration Date</label>
            <input type="date" name="regDate" required>
        </div>
        <div>
            <label>Grade</label>
            <input type="number" name="Grade" required>
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
    $StudentID = $_POST['StudentID'];
    $CourseID = $_POST['CourseID'];
    $regDate = $_POST['regDate'];
    $Grade = $_POST['Grade'];
    $registration = new Registration($id, $StudentID, $CourseID, $regDate, $Grade);
    $registration->addRegistration($pdo);
    echo "Registration added successfully";
}
?>