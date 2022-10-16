<?php

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Subject;

$editClass = new Subject('');
$editClass->setConnection($connection);
$selected_id = $_POST['checkbox'];
$extract_id = implode('', $selected_id);
$class = $editClass->getById($extract_id);
$teachers = $editClass->getTeachers();
echo $mustache->render('edit-classes', compact('class', 'teachers'));
?>
