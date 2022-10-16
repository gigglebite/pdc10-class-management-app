
<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Subject;
  if(isset($_POST['SubmitButton'])){ 
    //check if form was submitted
    $name = $_POST['name'];
    $description = $_POST['description'];
    $code = $_POST['code'];
    $teacher = $_POST['teacher_id'];
    try {
    $teacher = new Subject($name, $description, $code, $teacher);
    $teacher->setConnection($connection);
    $teacher->save();
    header("Location: list-classes.php"); 
  exit();
    } catch (Exception $e) {
        error_log($e->getMessage());
    }

}  