<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\ClassRoster;

$roster = new ClassRoster('');
$roster->setConnection($connection);
$rosters = $roster->listClasses();

echo $mustache->render('list-roster', compact('rosters'));
?>