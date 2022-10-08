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
<div class="container">
<div class="row">
<div class="col">
    <h2>Class Roster</h2>
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
                <th>ID </th>
                <th>Class Code</th>
                <th>Stud No.</th>
                <th></th>

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
                    <?php echo $item['student_number']; ?>
                </td>
                <td>
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
