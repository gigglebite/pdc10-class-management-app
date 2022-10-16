<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Student;
try {
    $editStudent = new Student('');
    $editStudent->setConnection($connection);
    $editStudent->update($_POST['id'], $_POST['name'],$_POST['email'],$_POST['phone'],$_POST['student_number'],$_POST['address'],$_POST['program']);
  header("Location: list-student.php"); 
exit();
} catch (Exception $e) {
      error_log($e->getMessage());
  }

  ?>