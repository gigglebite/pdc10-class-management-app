<?php
include(dirname(dirname(__FILE__)) . '/Config/init.php');
use App\ClassRoster;

$roster = new ClassRoster('');
$roster->setConnection($connection);
$rosters = $roster->listClasses();
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
    <h2>Class Roster</h2>
</div>
<div class="col">
<div class="row">
</div>
</div>
</div>
<div class="row">
    <table class="table table-hover">

        <thead>

            <tr>
                <th>Course Name </th>
                <th>Assigned Teacher</th>
                <th>Students Enrolled<th>
                <th></th>

            </tr>

        </thead>


        <tbody>

            <?php
                foreach ($rosters as $item) {
            ?>
            <tr>
                <td>
                    <?php echo $item['course_name']; ?>
                </td>
                <td>
                    <?php echo $item['teacher_name']; ?>
                </td>
                <td>
                    <?php echo $item['students_enrolled']; ?>
                </td>
                <td>
                <a href="index.php?class_code=<?php echo $item['class_code']; ?>"class="btn btn-primary">View</a>
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