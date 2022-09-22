<?php

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Teacher;

$editTeacher = new Teacher('');
$editTeacher->setConnection($connection);
$teacher = $editTeacher->getById($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body>
<form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $teacher['id'] ?>"/>
                <div class="form-group">
                    <label>Complete Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $teacher['name'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $teacher['email'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $teacher['phone'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Employee Number</label>
                    <input type="number" class="form-control" name="student_number" value="<?php echo $teacher['employee_number'] ?>"/>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $teacher['address'] ?>"/>
                </div>
                <a href="index.php"><button type="submit" name="submit" class="btn btn-primary"> Save Changes </button></a>
                </form>
</body>
</html>

<?php
  if(isset($_POST['submit'])){ 
    try {
    $editTeacher->update($teacher['id'], $_POST['name'],$_POST['email'],$_POST['phone'],$_POST['employee_number'],$_POST['address']);
    header("Location: index.php"); 
  exit();
} catch (Exception $e) {
        error_log($e->getMessage());
    }

}  