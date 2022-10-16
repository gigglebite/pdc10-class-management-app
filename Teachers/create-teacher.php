<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Teacher;
try {
    $teacher = new Teacher($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['employee_number'],$_POST['address']);
    $teacher->setConnection($connection);
    $teacher->save();
    header("Location: index.php"); 
  exit();
    } catch (Exception $e) {
        error_log($e->getMessage());
    }
?>