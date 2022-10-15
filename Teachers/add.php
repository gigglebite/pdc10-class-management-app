<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Teacher;
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
    <h2 class="card-title text-center">ADD TEACHER</h2>
  <form action="" method="POST">

                <div class="mb-3">
                  <label for="fullname" class="form-label">Complete Name</label>
                  <input type="fullname" class="form-control" name="name" required>
                </div>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" required>
                </div>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" name="phone" required>
                </div>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Employee Number</label>
                  <input type="text" class="form-control" name="employee_number"  required>
                </div>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Address</label>
                  <input type="address" class="form-control" name="address" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="SubmitButton" class="btn btn-primary">Add</button>
                </div>
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
</div>
</div>
<style>
* {
        font-family: 'Poppins';
    }

  body {
    background-image: url('../resources/background.png');
    background-size: cover;
  }
  .card {
    background-color:  #dfe5ff ;
    width: 30rem; 
    border-radius: 15px; 
    margin-top: 3%;
  }

  .card-title {
    background-color: #5c69f4; 
    color: white;
    border-radius: 15px;
    font-weight: 600;
  }
  .btn {
    border-radius: 15px;
    background-color: #5c69f4;
    border: #ff8970 ;
  }

  .btn:hover {
    background-color:  #3d48bd;
  }
  </style>
</body>
</html>