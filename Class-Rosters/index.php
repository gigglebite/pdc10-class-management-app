<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\ClassRoster;

$roster = new ClassRoster('');
$roster->setConnection($connection);
$rosters = $roster->getRoster($_GET['class_code']);
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
<div style="background-color: #F6B737; width: 50%; margin: auto; padding: 10px; margin-bottom: 50px; border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
<h2 class="header text-center"> CLASS ROSTERS </h2>
</div>
</div>
<form method="POST" action="edit.php">
<div class="row mx-auto">
<!-- Add courses  !-->
<div class="col-sm-4 d-flex justify-content-center">
  <button formaction="add.php" type="submit"><div class="card text-center" style="width: 12rem; height: 6rem; background-color: #FFF3C1; border-radius: 30px;" >
  <div class="card-body">
  <i class="fa fa-book fa-2x" style="color:#F6B737; " ></i>
    <h5 class="card-title">Add Student</h5>
  </div>
  </div>
  </div>
</button>
<!--  Start of the form !-->
<!-- Update courses !-->
<div class="col-sm-4 d-flex justify-content-center">
<button type="submit" name="edit" value="edit">
<div class="card text-center" style="width: 12rem; height: 6rem; background-color: #F6B737; border-radius: 30px; " >
  <img class="card-img-top">
  <div class="card-body justify-content-center">
    <i class="fa fa-refresh  fa-2x" style="color:white; " ></i></a>
    <h5 class="card-title" style="color: white;">Update</h5>
  </div>
</div>
</div></button>
<!-- Delete courses !-->
<div class="col-sm-4 d-flex justify-content-center">
<button formaction="delete.php" type="submit" name="delete" value="delete">
<div class="card text-center" style="width: 12rem; height: 6rem; background-color: #FFF3C1; border-radius: 30px; " >
  <img class="card-img-top">
  <div class="card-body">
  <i class="fa fa-trash  fa-2x" style="color:#F6B737; " ></i></a>
    <h5 class="card-title">Delete</h5>
  </div>
</div>
</div></button>
</div>
<!-- !-->
<div class="mt-5">
<div class="container">
<div class="row">
<div class="row">
<div class="col">


</div>
</div>
</div>

<div class="row">
    <table class="table table-striped">

        <thead>

            <tr>
                <th>Check </th>
                <th>ID </th>
                <th>Class Code</th>
                <th>Class Name</th>
                <th>Stud No.</th>
                <th>Stud Name</th>

            </tr>

        </thead>


        <tbody>

            <?php
                foreach ($rosters as $item) {
            ?>
            <tr>
            <td>
                <input type="checkbox" name="checkbox[]" value= "<?= $item['id'];?>" style="margin-left:auto; margin-right:auto;">
                </td>
                <td>
                    <?php echo $item['id']; ?>
                </td>

                <td>
                    <?php echo $item['class_code']; ?>
                </td>
                <td>
                    <?php echo $item['class_name']; ?>
                </td>
                <td>
                    <?php echo $item['student_no']; ?>
                </td>
                <td>
                    <?php echo $item['student_name']; ?>
                </td>
                </tbody>
                <?php

}

?>
</form>
</table>
</div>
</div>
</body>
<style>
    * {
        font-family: 'Poppins';
    }

    button {
      background-color: white;
      border: none;
      margin: 0 auto;
      display: block;
      width: 12rem; 
      height: 6rem;
      border-radius: 30px;
    }

    .header {
        color: white;
        font-weight: 600;
    }

    .table-striped>tbody>tr:nth-child(odd)>td,
.table-striped>tbody>tr:nth-child(odd)>th {
	background-color: #F8E79F;
}

</style>
</html>
