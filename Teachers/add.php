<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Teacher;
$template = $mustache->loadTemplate('add-teacher');
echo $template->render();
?>
