<?php
	include('db.php');

      $note = mysqli_real_escape_string($connection, $_POST['note']);
      $id = mysqli_real_escape_string($connection, $_POST['id']);
			$teacher_id = mysqli_real_escape_string($connection, $_POST['teacher_id']);


  	$query1  = "UPDATE tbl_t2s_229 SET note = '" . $note . "' WHERE teacher_id = '" . $teacher_id . "' AND student_id = '" . $id . "'";
    $result = mysqli_query($connection, $query1);
    if(!$result) {
        echo("DB query failed.");
    }
		
	mysqli_close($connection);
?>
