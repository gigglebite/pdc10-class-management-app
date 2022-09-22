<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Teacher;
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
    <h2 class="card-title">Add Teacher</h2>
    <form method="POST" action="">
  <div class="mb-3">
    <label for="fullname" class="form-label">Complete Name</label>
    <input type="fullname" class="form-control" id="fullname" name="name" required>
  </div>
  <div class="mb-3">
    <label for="teacher_number" class="form-label">Employee Number</label>
    <input type="number" class="form-control" id="employee_number" name="employee_number" required>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="address" class="form-control" id="address" name="address" required>
  </div>
  <div class="text-center">
  <button type="submit" name="SubmitButton" class="btn btn-primary">Add Teacher</button>
  </form>
  <?php
  if(isset($_POST['SubmitButton'])){ 
    //check if form was submitted
    try {
    $teacher = new Teacher($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['employee_number'],$_POST['address']);
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
