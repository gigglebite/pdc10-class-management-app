<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\ClassRoster;
$subject = new ClassRoster('');
$subject->setConnection($connection);
$students = $subject->getStudents();
$classes = $subject->getCourses();
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
    <h2 class="card-title text-center">ADD ROSTER</h2>
    <form method="POST" action="">
  <div class="mb-3">
  <label for="code" class="form-label">Class Code</label>
  <select class="form-select" aria-label="Default select example" name="code" required>
      <option selected>Choose...</option>
      <?php
                foreach ($classes as $item) {
      ?>
      <option value="<?php echo $item['code']; ?>"><?php echo $item['code']; ?></option>
      <?php } ?></select>
  </div>
  <div class="mb-3">
  <label for="description" class="form-label">Student Number</label>
    <select class="form-select" aria-label="Default select example" name="student_number" required>
      <option selected>Choose...</option>
      <?php
                foreach ($students as $item) {
      ?>
      <option value="<?php echo $item['student_number']; ?>"><?php echo $item['name']; ?></option>
      <?php } ?>
  </div>
    </select>
  </div>
  <div class="text-center">
  <button type="submit" name="SubmitButton" class="btn btn-primary">Add Roster</button>
  </form>
  <?php
  if(isset($_POST['SubmitButton'])){ 
    //check if form was submitted
    try {
      $student = new ClassRoster($_POST['code'],$_POST['student_number']);
      $student->setConnection($connection);
      $student->save();
      header("Location: index1.php"); 
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
<style>

* {
        font-family: 'Poppins';
    }

  body {
    background-image: url('../resources/background.png');
    background-size: cover;
  }
  .card {
    background-color:  #F8E79F ;
    width: 30rem; 
    border-radius: 15px; 
    margin-top: 5%;
  }

  .card-title {
    background-color: #F6B737; 
    color: white;
    border-radius: 15px;
    font-weight: 600;
  }
  .btn {
    border-radius: 15px;
    background-color: #F6B737;
    border: #ff8970 ;
  }

  .btn:hover {
    background-color:  #D89A1B;
  }
</style>
</html>

<!-- so now... !-->
