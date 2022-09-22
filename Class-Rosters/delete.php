<?php

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\ClassRoster;

if(isset($_POST['delete'])){ 
    //check if form was submitted
    try {
        $all_id = $_POST['checkbox'];
        $extract_id = implode(',', $all_id);
        $delete = new ClassRoster('');
        $delete->setConnection($connection);
        $delete->delete($extract_id);
        
    } catch (Exception $e) {
        error_log($e->getMessage());
    }
}
header("Location: index.php");
exit();

?>