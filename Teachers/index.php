<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Teacher;

$teacher = new Teacher('');
$teacher->setConnection($connection);
$teachers = $teacher->getAll();
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
<div style="background-color: #5C69F4; width: 50%; margin: auto; padding: 10px; margin-bottom: 50px; border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
<h2 class="header text-center"> TEACHERS </h2>
</div>
<form method="POST" action="edit.php">
<div class="row mx-auto">
<!-- Add courses  !-->
<div class="col-sm-4 d-flex justify-content-center">
  <button formaction="add.php" type="submit"><div class="card text-center" style="width: 12rem; height: 6rem; background-color: #D5DDFF; border-radius: 30px;" >
  <div class="card-body">
  <i class="fa fa-user-plus fa-2x" style="color:#5C69F4; " ></i>
    <h5 class="card-title">Add Teacher</h5>
  </div>
  </div>
  </div>
</button>
<!--  Start of the form !-->
<!-- Update courses !-->
<div class="col-sm-4 d-flex justify-content-center">
<button type="submit" name="edit" value="edit">
<div class="card text-center" style="width: 12rem; height: 6rem; background-color: #5C69F4; border-radius: 30px; " >
  <img class="card-img-top">
  <div class="card-body justify-content-center">
    <i class="fa fa-refresh  fa-2x" style="color:white; " ></i></a>
    <h5 class="card-title" style="color: white;">Update</h5>
  </div>
</div>
</div></button>
<!-- Delete courses !-->
<div class="col-sm-4 d-flex justify-content-center">
<button formaction="delete.php" type="submit" name="delete" value="delete" onclick="return confirm('Are you sure you want to delete this item?')">
<div class="card text-center" style="width: 12rem; height: 6rem; background-color: #D5DDFF; border-radius: 30px; " >
  <img class="card-img-top">
  <div class="card-body">
  <i class="fa fa-trash  fa-2x" style="color:#5C69F4; " ></i></a>
    <h5 class="card-title">Delete</h5>
  </div>
</div>
</div></button>
</div>
<!-- <div class="row mx-auto">

<div class="col-sm-4 d-flex justify-content-center">
<div class="card text-center" style="width: 12rem; height: 6rem; background-color: #D5DDFF; border-radius: 30px;" >
  <div class="card-body">
  <a href="add.php" style="margin-bottom: 20px;"><i class="fa fa-user-plus fa-2x" style="color:#5C69F4; " ></i></a>
    <h5 class="card-title">Add Teacher</h5>
  </div>
</div>
</div>

<div class="col-sm-4 d-flex justify-content-center">
<div class="card text-center" style="width: 12rem; height: 6rem; background-color: #5C69F4; border-radius: 30px; " >
  <img class="card-img-top">
  <div class="card-body justify-content-center">
  <a href="edit.php" style="margin: auto;"><i class="fa fa-refresh  fa-2x" style="color:white; " ></i></a>
    <h5 class="card-title" style="color: white;">Update</h5>
  </div>
</div>
</div>

<div class="col-sm-4 d-flex justify-content-center">
<div class="card text-center" style="width: 12rem; height: 6rem; background-color: #D5DDFF; border-radius: 30px; " >
  <img class="card-img-top">
  <div class="card-body">
  <a href="delete.php" style="margin: auto;"><i class="fa fa-trash  fa-2x" style="color:#5C69F4; " ></i></a>
    <h5 class="card-title">Delete</h5>
  </div>
</div>
</div> -->
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
                <th>ID</th>
                <th>Name</th>
                <th>Emp. No.</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>

            </tr>

        </thead>


        <tbody>

            <?php
                foreach ($teachers as $item) {
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
                    <?php echo $item['employee_number']; ?>
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
	background-color: #dfe5ff;
}

</style>
</html>
