<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Student;

$student = new Student('');
$student->setConnection($connection);
if(isset($_GET['student_number'])){ 
$enrolled = $student->viewEnrolled($_GET['student_number']);
$students = $student->getByStudent($_GET['student_number']);
echo $mustache->render('list-by-student', compact('enrolled', 'students'));
}
?>