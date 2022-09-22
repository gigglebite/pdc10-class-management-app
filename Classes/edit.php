<?php

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Subject;

$editClass = new Subject('');
$editClass->setConnection($connection);
$class = $editClass->getById($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body>
<form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $class['id'] ?>"/>
                <div class="form-group">
                    <label>Course Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $class['name'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Code</label>
                    <input type="email" class="form-control" name="code" value="<?php echo $class['code'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" value="<?php echo $class['description'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Teacher No.</label>
                    <input type="number" class="form-control" name="teacher_id" value="<?php echo $class['teacher_id'] ?>"/>
                </div>
                <a href="index.php"><button type="submit" name="submit" class="btn btn-primary"> Save Changes </button></a>
                </form>
</body>
</html>

<?php
  if(isset($_POST['submit'])){ 
    try {
    $editClass->update($class['id'], $_POST['name'],$_POST['code'],$_POST['description'],$_POST['teacher_id']);
    header("Location: index.php"); 
  exit();
} catch (Exception $e) {
        error_log($e->getMessage());
    }

}  