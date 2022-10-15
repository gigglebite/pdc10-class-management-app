<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\ClassRoster;

  $code = $_POST['code'];
  $student_number = $_POST['student_number'];

      $student = new ClassRoster($code, $student_number);
      $student->setConnection($connection);
      $student->save();
      header("Location: list-roster.php");

?>