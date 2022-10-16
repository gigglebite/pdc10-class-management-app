<?php 

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\ClassRoster;

$id = $_POST['id'];
$code = $_POST['code'];
  $student_number = $_POST['student_number'];
  $editRoster = new ClassRoster('');
  $editRoster->setConnection($connection);
  $editRoster->update($id, $code, $student_number);
    header("Location: list-rosters.php"); 

?>