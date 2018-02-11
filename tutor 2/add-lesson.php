<?php
	include('db.php');

      $myId = $_GET['id'];
      $teacher_id = $_GET['teacher_id'];

      $lessonNumber = mysqli_real_escape_string($connection, $_POST['lessonNumber']);
      $learnMaterial = mysqli_real_escape_string($connection, $_POST['learnMaterial']);
			$dificultese = mysqli_real_escape_string($connection, $_POST['dificultese']);
      $homeWork = mysqli_real_escape_string($connection, $_POST['homeWork']);



      $query = "INSERT INTO tbl_lesson_229 VALUES ('" . $teacher_id . "','" . $myId . "','" . $lessonNumber . "','" . $learnMaterial . "','" . $dificultese . "','" . $homeWork . "');";
      $result = mysqli_query($connection, $query);
      if(!$result) {
        echo("DB query failed.");
      }

      header('Location: progress.php?id=' . $myId . "&teacher_id=" . $teacher_id);

	mysqli_close($connection);
?>
