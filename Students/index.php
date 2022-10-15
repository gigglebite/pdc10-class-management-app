<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Student;

$student = new Student('');
$student->setConnection($connection);
$students = $student->getAll();
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
<body>
<div class="row">
<div style="background-color: #7b73b4; width: 50%; margin: auto; padding: 10px; margin-bottom: 50px; border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
<h2 class="header text-center"> STUDENTS </h2>
</div>
</div>
<div class="row mx-auto">
<!-- Courses !-->
<div class="col-sm-4 d-flex justify-content-center">
<div class="card text-center" style="width: 12rem; height: 6rem; background-color: #e8dcff; border-radius: 30px;" >
  <div class="card-body">
  <a href="add.php" style="margin-bottom: 20px;"><i class="fa fa-user-plus fa-2x" style="color:#7b73b4; " ></i></a>
    <h5 class="card-title">Add Student</h5>
  </div>
</div>
</div>
<!-- Students !-->
<div class="col-sm-4 d-flex justify-content-center">
<div class="card text-center" style="width: 12rem; height: 6rem; background-color: #7b73b4; border-radius: 30px; " >
  <img class="card-img-top">
  <div class="card-body justify-content-center">
  <a href="edit.php" style="margin: auto;"><i class="fa fa-refresh  fa-2x" style="color:white; " ></i></a>
    <h5 class="card-title" style="color: white;">Update</h5>
  </div>
</div>
</div>
<!-- Teachers !-->
<div class="col-sm-4 d-flex justify-content-center">
<div class="card text-center" style="width: 12rem; height: 6rem; background-color: #e8dcff; border-radius: 30px; " >
  <img class="card-img-top">
  <div class="card-body">
  <a href="class-rosters/index1.php" style="margin: auto;"><i class="fa fa-trash  fa-2x" style="color:#7b73b4; " ></i></a>
    <h5 class="card-title">Delete</h5>
  </div>
</div>
</div>
<!-- Rosters !-->
</div>
<div class="mt-5">
<div class="container">
<div class="row">
<div class="col">
    <h2>Students</h2>
</div>
<div class="col">
<div class="row">
<div class="col">
<a href="add.php"><button class="btn btn-primary">Add</button></a>
</div>
<div class="col">
<form method="POST" action="delete.php">
<button type="submit" name="delete" value="delete"  class="btn btn-danger">Delete</button>
</div>
</div>
</div>
</div>
<div class="row">
    <table class="table table-striped">

        <thead>

            <tr>
                <th>Check </th>
                <th>ID</th>
                <th>Name</th>
                <th>Stud No.</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Program</th>
                <th></th>

            </tr>

        </thead>


        <tbody>

            <?php
                foreach ($students as $item) {
            ?>
            <tr>
                <td>
                <input type="checkbox" name="checkbox[]" value= "<?= $item['id'];?>" style="margin-left:auto; margin-right:auto;">
                </td>
                <td>
                    <?php echo $item['id']; ?>
                </td>

                <td>
                    <?php echo $item['name']; ?>
                </td>
                <td>
                    <?php echo $item['student_number']; ?>
                </td>
                <td>
                    <?php echo $item['phone']; ?>
                </td>
                <td>
                    <?php echo $item['email']; ?>
                </td>
                <td>
                    <?php echo $item['address']; ?>
                </td>
                <td>
                    <?php echo $item['program']; ?>
                </td>
                <td>
                <a href="edit.php?id=<?php echo $item['id'] ?>"class="btn btn-primary">Update</a>
                </td>
                </tr>
                </tbody>
                <?php

}

?>
</form>
</table>
</div>
</div>
</div>
</body>
</html>
<style>
    * {
        font-family: 'Poppins';
    }

    .header {
        color: white;
        font-weight: 600;
    }

    .table-striped>tbody>tr:nth-child(odd)>td,
.table-striped>tbody>tr:nth-child(odd)>th {
	background-color: #e8dcff;
}

</style>
