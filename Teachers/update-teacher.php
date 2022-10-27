<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Teacher;

$editTeacher = new Teacher('');
$editTeacher->setConnection($connection);
try {
    $editTeacher->update($_POST['id'], $_POST['name'],$_POST['email'],$_POST['phone'],$_POST['employee_number'],$_POST['address']);
    header("Location: list-teacher.php"); 
  exit();
} catch (Exception $e) {
        error_log($e->getMessage());
    }

?>