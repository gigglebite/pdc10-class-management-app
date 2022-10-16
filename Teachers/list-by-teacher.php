<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Teacher;

$teacher = new Teacher('');
$teacher->setConnection($connection);
if(isset($_GET['teacher_id'])){ 
$classes = $teacher->viewClasses($_GET['teacher_id']);
$teachers = $teacher->getByTeacher($_GET['teacher_id']);
echo $mustache->render('list-by-teacher', compact('classes', 'teachers'));
}
?>