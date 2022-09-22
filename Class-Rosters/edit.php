<?php

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\ClassRoster;

$editRoster = new ClassRoster('');
$editRoster->setConnection($connection);
$roster = $editRoster->getById($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body>
<form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $roster['id'] ?>"/>
                <div class="form-group">
                    <label>Class Code</label>
                    <input type="text" class="form-control" name="code" value="<?php echo $roster['class_code'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Student No.</label>
                    <input type="text" class="form-control" name="student_number" value="<?php echo $roster['student_number'] ?>"/>
                </div>
                <a href="index.php"><button type="submit" name="submit" class="btn btn-primary"> Save Changes </button></a>
                </form>
</body>
</html>

<?php
  if(isset($_POST['submit'])){ 
    try {
    $editRoster->update($_POST['code'], $_POST['student_number']);
    header("Location: index.php"); 
  exit();
} catch (Exception $e) {
        error_log($e->getMessage());
    }

}  