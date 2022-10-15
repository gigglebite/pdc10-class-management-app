<?php

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\ClassRoster;
$subject = new ClassRoster('');
$subject->setConnection($connection);
$students = $subject->getStudents();
$classes = $subject->getCourses();
$template = $mustache->loadTemplate('add-roster');
echo $template->render(compact('classes', 'students'));
?>