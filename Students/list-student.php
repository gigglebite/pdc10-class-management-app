<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Student;

$student = new Student('');
$student->setConnection($connection);
$students = $student->getAll();
echo $mustache->render('list-student', compact('students'));
?>