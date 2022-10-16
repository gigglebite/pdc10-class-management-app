<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Student;
$template = $mustache->loadTemplate('add-student');
echo $template->render();
?>
