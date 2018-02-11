<?php
	include('db.php');

      $teacher_id = $_GET['teacher_id'];
      $date = mysqli_real_escape_string($connection, $_POST['date']);
      $studentName = mysqli_real_escape_string($connection, $_POST['studentName']);
			$time = mysqli_real_escape_string($connection, $_POST['time']);
      $comment = mysqli_real_escape_string($connection, $_POST['comment']);


      $query = "SELECT id FROM tbl_student_229 WHERE firstName='" . $studentName . "'";
      $result = mysqli_query($connection, $query);
      $student = mysqli_fetch_assoc($result);


      $query1 = "INSERT INTO tbl_teacher_meets_229 VALUES ('" . $teacher_id . "','" . $student['id'] . "','" . $date . "','" . $time . "','" . $comment . "');";
      $result1 = mysqli_query($connection, $query1);
      if(!$result1) {
        echo("DB query failed.");
      }

      header('Location: calendar.php?teacher_id=' . $teacher_id );

	mysqli_close($connection);
?>
