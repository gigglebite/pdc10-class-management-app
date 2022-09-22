<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Subject;
$subject = new Subject('');
$subject->setConnection($connection);
$teachers = $subject->getTeachers();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<div class="card mx-auto" style="width: 30rem;">
  <div class="card-body">
    <h2 class="card-title">Add Class</h2>
    <form method="POST" action="">
  <div class="mb-3">
    <label for="fullname" class="form-label">Course Name</label>
    <input type="fullname" class="form-control" id="fullname" name="name" required>
  </div>
  <div class="mb-3">
    <label for="code" class="form-label">Code</label>
    <input type="text" class="form-control" id="code" name="code" required>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" id="description" name="description" required>
  </div>
  <div class="mb-3">
    <label for="teacher_id" class="form-label">Teacher</label>
    <select class="form-select" aria-label="Default select example" name="teacher_id" required>
      <option selected>Choose...</option>
      <?php
                foreach ($teachers as $item) {
      ?>
      <option value="<?php echo $item['employee_number']; ?>"><?php echo $item['name']; ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="text-center">
  <button type="submit" name="SubmitButton" class="btn btn-primary">Add Course</button>
  </form>
  <?php
  if(isset($_POST['SubmitButton'])){ 
    //check if form was submitted
    try {
    $teacher = new Subject($_POST['name'],$_POST['description'],$_POST['code'],$_POST['teacher_id']);
    $teacher->setConnection($connection);
    $teacher->save();
    header("Location: index.php"); 
  exit();
    } catch (Exception $e) {
        error_log($e->getMessage());
    }

}  
?>
<!--
  <select class="form-select" aria-label="Default select example">
  <option selected>Select your program</option>
  <option value="1">BSIT</option>
  <option value="2">BSCS</option>
</select>
!-->
</div>
  </div>
</div>
</body>
</html>
