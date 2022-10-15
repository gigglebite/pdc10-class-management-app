<?php
  if(isset($_POST['SubmitButton'])){ 
    //check if form was submitted
    try {
      $student = new ClassRoster($_POST['code'],$_POST['student_number']);
      $student->setConnection($connection);
      $student->save();
      header("Location: index1.php"); 
  exit();
    } catch (Exception $e) {
        error_log($e->getMessage());
    }

}  