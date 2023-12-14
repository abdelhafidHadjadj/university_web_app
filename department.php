<?php

require('./src/Models/Department.php');
require_once('./config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
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
        <h2>Add Department</h2>
        <div>
            <label>ID</label>
            <input type="number" name="id" required>
        </div>
        <div>
            <label>Department Name</label>
            <input type="text" name="depName" required>
        </div>
        <div>
            <label>DepartmentHead</label>
            <input type="text" name="depHead" required>
        </div>
        <div>
            <label>Location</label>
            <input type="text" name="location" required>
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
    $depName = $_POST['depName'];
    $depHead = $_POST['depHead'];
    $location = $_POST['location'];
    $department = new Department($id, $depName, $depHead, $location);
    $department->addDepartment($pdo);
    echo "Department added successfully";
}
?>