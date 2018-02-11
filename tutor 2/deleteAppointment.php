<?php
	include('db.php');

      $teacher_id = $_GET['teacher_id'];
      $date = $_GET['date'];
      $time = $_GET['time'];
      $firstName = $_GET['firstName'];

      $query = "SELECT id FROM tbl_student_229 WHERE firstName='" . $firstName . "'";
      $result = mysqli_query($connection, $query);
      $student = mysqli_fetch_assoc($result);
      $student_id = $student['id'];


      $query1 = "DELETE FROM tbl_teacher_meets_229 WHERE teacher_id='" . $teacher_id . "' AND student_id='" . $student_id . "' AND date='" . $date . "' AND time='" . $time . "'";
      $result1 = mysqli_query($connection, $query1);
      if(!$result1) {
        echo("DB query failed.");
      }

      header('Location: calendar.php?teacher_id=' . $teacher_id );

	mysqli_close($connection);
?>
