<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Subject;

$class = new Subject('');
$class->setConnection($connection);
$classes = $class->getAll();
$teachers = $class->getTeachers();
echo $mustache->render('list-classes', compact('classes', 'teachers'));
?>