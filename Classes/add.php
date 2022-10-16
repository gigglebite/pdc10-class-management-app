<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Subject;
$subject = new Subject('');
$subject->setConnection($connection);
$teachers = $subject->getTeachers();
$template = $mustache->loadTemplate('add-classes');
echo $template->render(compact('teachers'));
?>

