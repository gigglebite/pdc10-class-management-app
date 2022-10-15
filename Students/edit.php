<?php

include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Student;

$editStudent = new Student('');
$editStudent->setConnection($connection);
if(isset($_POST['edit'])){ 
  $selected_id = $_POST['checkbox'];
  $extract_id = implode('', $selected_id);
  $student = $editStudent->getById($extract_id);
}

if(isset($_POST['SubmitButton'])){ 
  try {
  $editStudent->update($_POST['id'], $_POST['name'],$_POST['email'],$_POST['phone'],$_POST['student_number'],$_POST['address'],$_POST['program']);
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
    <h2 class="card-title text-center">UPDATE STUDENT</h2>
  <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $student['id'] ?>"/>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Complete Name</label>
                  <input type="fullname" class="form-control" name="name" value="<?php echo $student['name'] ?>" required>
                </div>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $student['email'] ?>" required>
                </div>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" name="phone" value="<?php echo $student['phone'] ?>" required>
                </div>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Student Number</label>
                  <input type="text" class="form-control" name="student_number" value="<?php echo $student['student_number'] ?>" required>
                </div>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Address</label>
                  <input type="address" class="form-control" name="address" value="<?php echo $student['address'] ?>" required>
                </div>

                <div class="mb-3">
                  <label for="fullname" class="form-label">Program</label>
                  <input type="text" class="form-control" name="program" value="<?php echo $student['program'] ?>" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="SubmitButton" class="btn btn-primary">Update course</button>
                </div>
  </form>
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
    background-color:  #E8DCFF ;
    width: 30rem; 
    border-radius: 15px; 
    margin-top: 3%;
  }

  .card-title {
    background-color: #7B73B4; 
    color: white;
    border-radius: 15px;
    font-weight: 600;
  }
  .btn {
    border-radius: 15px;
    background-color: #7B73B4;
    border: #ff8970 ;
  }

  .btn:hover {
    background-color:  #504986;
  }
  </style>
  </html>