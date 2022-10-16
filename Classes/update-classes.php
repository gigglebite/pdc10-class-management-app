<?php

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Subject;
    try {
    $editClass = new Subject('');
    $editClass->setConnection($connection);
    $editClass->update($_POST['id'], $_POST['name'],$_POST['code'],$_POST['description'],$_POST['teacher_id']);
  } catch (Exception $e) {
        error_log($e->getMessage());
    }
    exit(header("Location: list-classes.php"));
?>