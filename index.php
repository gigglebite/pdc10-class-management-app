<?php
include(dirname((__FILE__)) . '/Config/init.php');
use App\ClassRoster;
use App\Teacher;
use App\Student;
use App\Subject;
$classRoster = new ClassRoster('');
$teacher = new Teacher('');
$student = new Student('');
$subject = new Subject('');
$subject->setConnection($connection);
$teacher->setConnection($connection);
$student->setConnection($connection);
$classRoster->setConnection($connection);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
</head>
<body>
<div style="background-color: #7B73B4; width: 50%; margin: auto; padding: 10px; margin-bottom: 50px; border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
<h2 class="text-center"> DASHBOARD </h2>
</div>
<div class="row">
<!-- Courses !-->
<div class="col-sm-3">
<div class="card" style="width: 18rem; background-color: #FFDDC9; border-radius: 30px;" >
  <img class="card-img-top" style="border-radius: 30px; margin-top: 20px; width: 250px; margin-left: auto;
  margin-right: auto;"src="Resources/courses.png" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title">Courses</h3>
    <p class="card-text">(num) courses</p>
    <a href="classes/index.php"><i class="fa fa-long-arrow-right fa-2x" style="color:#F46A61;" ></i></a>
  </div>
</div>
</div>
<!-- Students !-->
<div class="col-sm-3">
<div class="card" style="width: 18rem; background-color: #E8DCFF; border-radius: 30px;" >
  <img class="card-img-top" style="border-radius: 30px; margin-top: 20px; width: 250px; margin-left: auto;
  margin-right: auto;"src="Resources/students.png" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title">Students</h3>
    <p class="card-text">(num) students</p>
    <a href="#"><i class="fa fa-long-arrow-right fa-2x" style="color:#7B73B4;" ></i></a>
  </div>
</div>
</div>
<!-- Teachers !-->
<div class="col-sm-3">
<div class="card" style="width: 18rem; background-color: #D5DDFF; border-radius: 30px;" >
  <img class="card-img-top" style="border-radius: 30px; margin-top: 20px; width: 250px; margin-left: auto;
  margin-right: auto;"src="Resources/teachers.png" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title">Teachers</h3>
    <p class="card-text">(num) teachers</p>
    <a href="#"><i class="fa fa-long-arrow-right fa-2x" style="color:#5C69F4;" ></i></a>
  </div>
</div>
</div>
<!-- Rosters !-->
<div class="col-sm-3">
<div class="card" style="width: 18rem; background-color: #FFF3C1; border-radius: 30px;" >
  <img class="card-img-top" style="border-radius: 30px; margin-top: 20px; width: 250px; margin-left: auto;
  margin-right: auto;"src="Resources/rosters.png" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title">Rosters</h3>
    <p class="card-text">(num) rosters</p>
    <a href="#"><i class="fa fa-long-arrow-right fa-2x" style="color:#F6B737;" ></i></a>
  </div>
</div>
</div>



</div>
</body>
</html>
<style>
    *{
font-family: 'Montserrat';
    }

    h3 {
        margin-left: 5px; 
        font-weight: 600;
    }

    h2 {
        font-weight: 600;
        color: white;
    }

    p {
        margin-left: 30px;
        font-weight: 600;
    }

    i {
        margin-left: 80%;
        
    }
</style>
