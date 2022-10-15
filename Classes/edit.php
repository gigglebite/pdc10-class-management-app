<?php

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Subject;

$editClass = new Subject('');
$editClass->setConnection($connection);
if(isset($_POST['edit'])){ 
$selected_id = $_POST['checkbox'];
$extract_id = implode('', $selected_id);
$class = $editClass->getById($extract_id);
$teachers = $editClass->getTeachers();
}


if(isset($_POST['SubmitButton'])){ 
  try {
  $editClass->update($_POST['id'], $_POST['name'],$_POST['code'],$_POST['description'],$_POST['teacher_id']);
} catch (Exception $e) {
      error_log($e->getMessage());
  }
  exit(header("Location: index.php"));
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
<div class="card mx-auto">
  <div class="card-body">
    <h2 class="card-title text-center">UPDATE CLASS</h2>
  <!-- Start of the form !-->
    <form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $class['id'] ?>"/>
  <div class="mb-3">
    <label for="fullname" class="form-label">Course Name</label>
    <input type="fullname" class="form-control" id="fullname" name="name" value="<?php echo $class['name'] ?>" required>
  </div>
  <div class="mb-3">
    <label for="code" class="form-label">Code</label>
    <input type="text" class="form-control" id="code" name="code" value="<?php echo $class['code'] ?>" required>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" id="description" name="description" value="<?php echo $class['description'] ?>" required>
  </div>
  <div class="mb-3">
    <label for="teacher_id" class="form-label">Teacher</label>
    <select class="form-select" aria-label="Default select example" name="teacher_id" required>
      <option selected>Choose...</option>
      <?php
                foreach ($teachers as $item) {
      echo "<option value=" . $item['employee_number']. ">" . $item['name'] . "</option>";
 } ?>
    </select>
  </div>
  <div class="text-center">
  <button type="submit" name="SubmitButton" class="btn btn-primary">Update course</button>
  </form>
  </body>
  <style>
  * {
        font-family: 'Poppins';
    }

  body {
    background-image: url('../resources/background.png');
    background-size: cover;
  }
  .card {
    background-color:  #ffe4d1 ;
    width: 30rem; 
    border-radius: 15px; 
    margin-top: 5%;
  }

  .card-title {
    background-color: #EF7F59; 
    color: white;
    border-radius: 15px;
    font-weight: 600;
  }
  .btn {
    border-radius: 15px;
    background-color: #EF7F59;
    border: #ff8970 ;
  }

  .btn:hover {
    background-color:  #ff8970;
  }
  </style>
  </html>
