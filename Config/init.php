<?php


require (dirname(dirname(__FILE__)) . '/vendor/autoload.php');
include "Database.php";

use App\Connection;
use App\Classes;
use App\ClassRoster;
use App\Student;
use App\Teacher;


$connObj = new Connection($host, $database, $user, $password);
$connection = $connObj->connect();

?>