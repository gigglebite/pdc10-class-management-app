<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\ClassRoster;

$roster = new ClassRoster('');
$roster->setConnection($connection);
$rosters = $roster->getRoster($_GET['class_code']);

echo $mustache->render('list-roster1', compact('rosters'));
?>