<?php
include ('db.php');

if(!empty($_POST['userName'])) {
    $query = "SELECT * FROM tbl_student_229 WHERE id='" . $_POST['userName'] . "'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    if(!is_array($row)){
        $query1 ="SELECT * FROM tbl_teacher_229 WHERE id='" . $_POST['userName'] . "'";
        $result1 = mysqli_query($connection, $query1);
        $row1 = mysqli_fetch_assoc($result1);
        if(!is_array($row1)){
        $message = "! שם משתמש לא תקין" . "<br>" . "אנא נסה שנית";
        }
        else {
          header('Location: homePage.php?teacher_id='. $row1['id'] );
        }
    }
    else{
      header('Location: studentHomePage.php?id='. $row['id'] );
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="images/tutorLogo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Tutor</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="includes/style.css">
</head>
<body id="layout1">
  <div class="wrapper">
    <main>
      <h3>Tutor-ברוך הבא ל</h3>
      <img src="images/tutorLogo.png" id="logo" alt="logo">
      <form class="formAppointment" action="#" method="post">
        <label id="formLabel1"> אנא הכנס שם משתמש</label><br>
        <input type="text" name="userName">
        <div id="err"><?php if(isset($message)){echo $message;} ?></div>
        <section id="loginBtns">
          <div class="fixpos">
            <button type="submit" name="submit" id="studentBtn">התחברות</button>
          </div>
          <div class="fixpos">
            <button type="button" name="signUp" id="teacherBtn">הרשמה</button>
          </div>
        </section>
      </form>
    </main>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="includes/main.js"></script>
</body>
</html>
<?php
  mysqli_close($connection);
 ?>
