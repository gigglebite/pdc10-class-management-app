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
$rosters = $classRoster->listClasses();
$classes = $subject->getTotalClass();
$students = $student->getTotalStudent();
$teachers = $teacher->getTotalTeacher();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg">
<div class="row">
<div class="col-lg-2">
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>E-Learning</h3>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
            <a href="index.php">Home</a>
            </li>
            <li>
                <a href="classes/index.php">Courses</a>
            </li>
            <li>
                <a href="students/index.php">Students</a>
            </li>
            <li>
                <a href="teachers/index.php">Teachers</a>
            </li>
            <li>
                <a href="class-rosters/list-rosters.php">Rosters</a>
            </li>
        </ul>
    </nav>
</div>
</div>
<div class="col-9-half">
<div style="background-color: #7B73B4; width: 50%; margin: auto; padding: 10px; margin-bottom: 50px; border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
<h2 class="header text-center"> DASHBOARD </h2>
</div>
<div class="row mx-auto">
<!-- Courses !-->
<div class="col-sm-3 d-flex justify-content-center">
<div class="card" style="width: 15rem; background-color: #FFDDC9; border-radius: 30px;" >
  <img class="card-img-top" style="border-radius: 30px; margin-top: 20px; width: 200px; height:130px; margin-left: auto;
  margin-right: auto;"src="Resources/courses.png" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title">Courses</h3>
    <p class="number card-text"><?php echo $classes['total_classes'] ?> courses</p>
    <a href="classes/index.php"><i class="fa fa-long-arrow-right fa-2x" style="color:#F46A61;" ></i></a>
  </div>
</div>
</div>
<!-- Students !-->
<div class="col-sm-3 d-flex justify-content-center">
<div class="card" style="width: 15rem; background-color: #E8DCFF; border-radius: 30px; " >
  <img class="card-img-top" style="border-radius: 30px; margin-top: 20px; width: 200px; height:130px; margin-left: auto;
  margin-right: auto;"src="Resources/students.png" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title">Students</h3>
    <p class="number card-text"><?php echo $students['total_students'] ?> students</p>
    <a href="students/index.php"><i class="fa fa-long-arrow-right fa-2x" style="color:#7B73B4;" ></i></a>
  </div>
</div>
</div>
<!-- Teachers !-->
<div class="col-sm-3 d-flex justify-content-center">
<div class="card" style="width: 15rem; background-color: #D5DDFF; border-radius: 30px; " >
  <img class="card-img-top" style="border-radius: 30px; margin-top: 20px; width: 200px; height:130px; margin-left: auto;
  margin-right: auto;"src="Resources/teachers.png" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title">Teachers</h3>
    <p class="number card-text"><?php echo $teachers['total_teachers'] ?> teachers</p>
    <a href="teachers/index.php"><i class="fa fa-long-arrow-right fa-2x" style="color:#5C69F4;" ></i></a>
  </div>
</div>
</div>
<!-- Rosters !-->
<div class="col-sm-3 d-flex justify-content-center">
<div class="card" style="width: 15rem; background-color: #FFF3C1; border-radius: 30px;" >
  <img class="card-img-top" style="border-radius: 30px; margin-top: 20px; width: 200px; height:130px; margin-left: auto;
  margin-right: auto;"src="Resources/rosters.png" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title">Rosters</h3>
    <p class="number card-text"><?php echo $classes['total_classes'] ?> rosters</p>
    <a href="class-rosters/list-rosters.php"><i class="fa fa-long-arrow-right fa-2x" style="color:#F6B737;" ></i></a>
  </div>
</div>
</div>
</div>
<div class="mt-5">
<section>
  <h2 class="">Enrolled Courses</h2>
  <table class="table table-borderless w-auto mx-auto justify-content-center">
  <thead>
    <tr>
      <th width="850px;" scope="col">Course name</th>
      <th class="text-center" width="200px;" scope="col">Enrollees</th>
      <th class="text-center" width="150px;" scope="col">Code</th>
      <th class="text-center" width="180px;" scope="col">Professor</th>
    </tr>
  </thead>
  <tbody>
  <?php
                foreach ($rosters as $item) {
            ?>
    <tr>
      <td>
        <img src="resources/code.png" width="60px;" height="60px;" style="border-radius: 20px;"></img><span style="margin-left: 10px;"><b><?php echo $item['course_name']; ?><b>
      </td>
      <td class="text-center"><?php echo $item['students_enrolled']; ?></td>
      <td class="text-center"><?php echo $item['class_code']; ?></td>
      <td class="text-center"><?php echo $item['teacher_name']; ?></td>
    </tr>
    <?php

}

?>
</section>
</div>
</div>
</div>
</body>
</html>
<style>

    html, body{
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }
    *{
font-family: 'Poppins';
    }

    .card {
        transition: 0.3s;
    }

    .card:hover {
        transform: scale(1.1);
        transition: 0.3s;

    }

    .bg {
      background-image: url('resources/background.png');
      background-size: cover;

    }

    h2 {
      margin-left: 5px;
    }

    h3 {
        margin-left: 5px; 
        font-weight: 600;
    }

    .header{
        font-weight: 600;
        color: white;
    }

    .number {
        margin-left: 30px;
        font-weight: 600;
    }

    i {
        margin-left: 80%;
        
    }

    .col-9-half{
        width: 80%;
    }


    .wrapper {
    display: flex;
    align-items: stretch;
    height: 100%;
}


    a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

#sidebar {
    /* don't forget to add all the previously mentioned styles here too */
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
    height: 100vh;
}

#sidebar .sidebar-header {
    padding: 15px;
    background: #6d7fcc;
}

#sidebar ul.components {
    padding: 15px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}
ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}
</style>
