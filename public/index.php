<?php

require_once('../config/config.php');
require('../Controllers/DatabaseManager.php');
require('../src/Models/Department.php');
require('../src/Models/Student.php');

DataBaseManger::createTables($pdo);
$info = new Department(1, "IT", "CS", "BBZ");
$info->addDepartment($pdo);


echo ('Hello World');
