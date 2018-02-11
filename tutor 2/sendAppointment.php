<?php
	include('db.php');

      $teacher_id = $_GET['teacherId'];
      $myid = $_GET['id'];
      $date = mysqli_real_escape_string($connection, $_POST['date']);
			$time = mysqli_real_escape_string($connection, $_POST['time']);
      $comment = mysqli_real_escape_string($connection, $_POST['comment']);


      $query1 = "INSERT INTO tbl_teacher_meets_229 VALUES ('" . $teacher_id . "','" . $myid . "','" . $date . "','" . $time . "','" . $comment . "');";
      $result1 = mysqli_query($connection, $query1);
      if(!$result1) {
        echo("DB query failed.");
      }

      header('Location: confirmAppoint.php?id=' . $myid );

	mysqli_close($connection);
?>
