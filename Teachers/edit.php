<?php

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Teacher;

$editTeacher = new Teacher('');
$editTeacher->setConnection($connection);
if(isset($_POST['edit'])){ 
  $selected_id = $_POST['checkbox'];
  $extract_id = implode('', $selected_id);
  $teacher = $editTeacher->getById($extract_id);
}

  if(isset($_POST['SubmitButton'])){ 
    try {
    $editTeacher->update($_POST['id'], $_POST['name'],$_POST['email'],$_POST['phone'],$_POST['employee_number'],$_POST['address']);
    header("Location: index.php"); 
  exit();
} catch (Exception $e) {
        error_log($e->getMessage());
    }

}  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
  <body>

  <div class="card mx-auto">
  <div class="card-body">
    <h2 class="card-title text-center">UPDATE TEACHER</h2>
  <form action="" method="POST">
                  <input type="hidden" name="id" value="<?php echo $teacher['id'] ?>"/>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Complete Name</label>
                  <input type="fullname" class="form-control" name="name" value="<?php echo $teacher['name'] ?>" required>
                </div>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $teacher['email'] ?>" required>
                </div>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" name="phone" value="<?php echo $teacher['phone'] ?>" required>
                </div>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Employee Number</label>
                  <input type="text" class="form-control" name="employee_number" value="<?php echo $teacher['employee_number'] ?>" required>
                </div>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Address</label>
                  <input type="address" class="form-control" name="address" value="<?php echo $teacher['address'] ?>" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="SubmitButton" class="btn btn-primary">Update teacher</button>
                </div>
  </form>
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