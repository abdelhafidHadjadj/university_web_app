<?php
require_once('./config/config.php');
require('./Controllers/DatabaseManager.php');
require('./src/Models/Department.php');
require('./src/Models/Student.php');
require('./src/Models/Professor.php');
require('./src/Models/Course.php');
require('./src/Models/Registration.php');
require('./Controllers/QueryManager.php');

DataBaseManger::createTables($pdo);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        div {
            width: fit-content;
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
            border: 1px solid black;
            border-radius: 2px;
        }

        button {
            padding: 0.5rem 1rem;
            margin-top: 10px;
            background-color: transparent;
            border: 1px solid black;
            border-radius: 2px;
        }

        input[type="submit"] {
            border: 1px solid black;
            border-radius: 2px;
            padding: 0.5rem 1rem;
            margin-top: 10px;
            background-color: transparent;
        }

        input[type="submit"]:hover {
            transition: 450ms;
            background-color: black;
            color: white;

        }

        button:hover {
            transition: 450ms;
            background-color: black;
            color: white;
        }

        .linkBox {
            margin: 1rem;
        }

        a {
            text-decoration: none;
            padding: 0.5rem 1rem;
            border: 1px solid black;
            border-radius: 2px;
            color: black;
        }

        a:hover {
            background-color: black;
            transition: 450ms;
            color: white;
        }

        .result-container {
            margin: 5rem;
        }

        .contentBoxResult {
            display: flex;
            gap: 10rem;
        }
    </style>
</head>

<body>
    <div class="linkBox">
        <a href="student.php">Add Student</a>
        <a href="course.php">Add Course</a>
        <a href="department.php">Add Department</a>
        <a href="professor.php">Add Professor</a>
        <a href="registration.php">Add Registration</a>
    </div>
    <div class="contentBoxResult">


        <div>
            <form action="" method="post" name="form1">
                <label>Get Course By Department ID</label>
                <input type="hidden" name="action" value="form1">
                <input type="number" name="departmentId">
                <input type="submit" value="Submit">
            </form>

            <form action="" method="post" name="form2">
                <label>Find Highest Grade</label>
                <input type="hidden" name="action" value="form2">
                <input type="number" name="studentId">
                <input type="submit" value="Submit">
            </form>

            <form action="" method="post" name="form3">
                <label>Get Total Credit Hours</label>
                <input type="hidden" name="action" value="form3">
                <input type="number" name="studentId">
                <input type="submit" value="Submit">
            </form>

            <form action="" method="post" name="form4">
                <input type="hidden" name="action" value="form4">
                <label>Get Student By Course</label>
                <input type="number" name="courseId">
                <input type="submit" value="Submit">
            </form>

            <div>
                <form action="" method="post" name="form5">
                    <button type="submit" name="action" value="getProfessors">Get Professors With Most Courses</button>
                </form>

                <form action="" method="post" name="form6">
                    <button type="submit" name="action" value="generateReport">Generate Registration Report</button>
                </form>
            </div>

        </div>

        <div class="result-container">

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $query = new QueryManager($pdo);

                switch ($_POST['action']) {
                    case 'form1':
                        $result = $query->getCoursesByDepartment($_POST['departmentId']);
                        $resultTitle = 'Get Course By Department ID Result';
                        break;

                    case 'form2':
                        $result = $query->findHighestGrade($_POST['studentId']);
                        $resultTitle = 'Find Highest Grade Result';
                        break;

                    case 'form3':
                        $result = $query->getTotalCreditHours($_POST['studentId']);
                        $resultTitle = 'Get Total Credit Hours Result';
                        break;

                    case 'form4':
                        $result = $query->getStudentByCourse($_POST['courseId']);
                        $resultTitle = 'Get Student By Course Result';
                        break;

                    case 'getProfessors':
                        $result = $query->getProfessorsWithMostCourses();
                        $resultTitle = 'Get Professors With Most Courses Result';
                        break;

                    case 'generateReport':
                        $result = $query->generateRegistrationReport();
                        $resultTitle = 'Generate Registration Report Result';
                        break;

                    default:
                        $result = null;
                        $resultTitle = '';
                        break;
                }

                if (is_array($result)) {
                    echo '<div class="result-container">';
                    echo '<h2>' . $resultTitle . ':</h2>';
                    echo '<table border="1">';
                    echo '<tr>';
                    // Display table headers
                    foreach ($result[0] as $key => $value) {
                        echo '<th>' . $key . '</th>';
                    }
                    echo '</tr>';
                    // Display table rows
                    foreach ($result as $row) {
                        echo '<tr>';
                        foreach ($row as $value) {
                            echo '<td>' . $value . '</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '</div>';
                } else {
                    echo "Error fetching result.";
                }
            }
            ?>

        </div>
    </div>
</body>

</html>