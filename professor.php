<?php

require('./src/Models/Professor.php');
require_once('./config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Professor</title>
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
        <h2>Add Professor</h2>
        <div>
            <label>ID</label>
            <input type="number" name="id" required>
        </div>
        <div>
            <label>FirstName</label>
            <input type="text" name="firstName" required>
        </div>
        <div>
            <label>LastName</label>
            <input type="text" name="lastName" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Department ID</label>
            <input type="number" name="departmentID" required>
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
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $departmentID = $_POST['departmentID'];
    $professor = new Professor($id, $firstName, $lastName, $email, $departmentID);
    $professor->addProfessor($pdo);
    echo "Professor added successfully";
}
?>