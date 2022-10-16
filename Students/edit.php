<?php

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Student;

$editStudent = new Student('');
$editStudent->setConnection($connection);
  $selected_id = $_POST['checkbox'];
  $extract_id = implode('', $selected_id);
  $student = $editStudent->getById($extract_id);
echo $mustache->render('edit-student', compact('student'));
?>