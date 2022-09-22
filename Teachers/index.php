<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\Teacher;

$teacher = new Teacher('');
$teacher->setConnection($connection);
$teachers = $teacher->getAll();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body>
<div class="container">
<div class="row">
<div class="col">
    <h2>Teachers</h2>
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
    <table class="table table-hover">

        <thead>

            <tr>
                <th>Check </th>
                <th>ID</th>
                <th>Name</th>
                <th>Emp. No.</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th></th>

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
                <td>
                <a href="edit.php?id=<?php echo $item['id'] ?>"class="btn btn-primary">Update</a>
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
</html>
