<?php

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Teacher;

$editTeacher = new Teacher('');
$editTeacher->setConnection($connection);
  $selected_id = $_POST['checkbox'];
  $extract_id = implode('', $selected_id);
  $teacher = $editTeacher->getById($extract_id);
  echo $mustache->render('edit-teacher', compact('teacher'));
?>