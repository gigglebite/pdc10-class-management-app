<?php

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\ClassRoster;

$editRoster = new ClassRoster('');
$editRoster->setConnection($connection);
if(isset($_POST['edit'])){ 
  $selected_id = $_POST['checkbox'];
  $extract_id = implode('', $selected_id);
  $rosters = $editRoster->getById($extract_id);
  $classes = $editRoster->getCourses();
  echo $mustache->render('edit-roster', compact('rosters', 'classes'));
  }

?>