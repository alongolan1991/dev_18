<?php
	include('db.php');

      $teacher_id = $_GET['teacher_id'];
      $student_id = $_GET['student_id'];
      $lessonNumber = $_GET['lesson_number'];

      $query1 = "DELETE FROM tbl_lesson_229 WHERE teacher_id='" . $teacher_id . "' AND student_id='" . $student_id . "' AND lesson_number='" . $lessonNumber . "'";
      $result1 = mysqli_query($connection, $query1);
      if(!$result1) {
        echo("DB query failed.");
      }

      header('Location: progress.php?id=' . $student_id . "&teacher_id=" . $teacher_id);

	mysqli_close($connection);
?>
