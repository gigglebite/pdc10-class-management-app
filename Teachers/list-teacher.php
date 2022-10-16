<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Teacher;

$teacher = new Teacher('');
$teacher->setConnection($connection);
$teachers = $teacher->getAll();
echo $mustache->render('list-teacher', compact('teachers'));
?>