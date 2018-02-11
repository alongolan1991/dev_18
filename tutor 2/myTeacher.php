<?php
include ('db.php');
$myId = $_GET['id'];
$teacherId = $_GET['teacher_id'];

$query = "SELECT * FROM tbl_student_229 WHERE id=". $myId;   //getting detaild of student
$result = mysqli_query($connection, $query);
if(!$result) {

  die("DB query failed.");
}
$student_details = mysqli_fetch_assoc($result);

$query3 = "SELECT me.date, me.time, te.firstName FROM tbl_teacher_meets_229 as me INNER JOIN tbl_teacher_229 AS te on me.teacher_id = te.id AND me.student_id ='" . $myId . "' ORDER BY me.date ASC";
$result3 = mysqli_query($connection, $query3);
if(!$result3) {
  die("DB query failed.");
}
 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="images/tutorLogo.png" />
  <meta charset="utf-8">
  <title>my teacher</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="includes/style1.css">
</head>
<body>
  <div id="wrapper">
<header class="navbar navbar-light bg-light" id="studentHeader">
  <?php
    echo "<a class='navbar-brand' href='studentHomePage.php?id=" . $myId . "'><p>Tutor</p></a>";
  ?>
  <section>
    <a href="#">12</a>
    <?php
    echo "<p> שלום " . $student_details['firstName'] . "</p>";
     ?>
  </section>
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="studentNav">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">השיעורים שלי</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">משחקי חשיבה</a>
      </li>
      <li class="nav-item active">
        <?php
    echo   "<a class='nav-link' href='studentHomePage.php?id=" .$myId. "'>המורים שלי</a>";
         ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">פרופיל</a>
      </li>
    </ul>
  </div>
</nav>
  <main>
    <section class="studentSec">
      <?php
      echo "<p class='breadCrambs'><b> דף מורה <</b><a href='studentHomePage.php?id=" . $myId . "'> המורים שלי </a></p>";

        $query4 = "SELECT * FROM tbl_teacher_229 WHERE id='" . $teacherId . "'" ;

        $result4 = mysqli_query($connection, $query4);
        if(!$result4) {
          die("DB query failed.");
        }
        $row1 = mysqli_fetch_assoc($result4);
        echo "<div class='card card2' style='width: 18rem;'>
              <div class='card-body'>
              <p class='card-text'><b>" . $row1['firstName'] .
              "</b></p></div>
              <img class='card-img-top' src='" . $row1['image'] . "'>
              </div>";
        ?>
        <article class="studentIcons">
          <div class="fixIcon" >
            <img src="images/open-iconic/svg/comment-square.svg" style="width:50px;height:50px;display:inline-block;">
            <button type="button" name="button" class="iconBtn">צ'אט</button>
          </div>
          <div class="fixIcon">
            <img src="images/open-iconic/svg/data-transfer-upload.svg" style="width:50px;height:50px">
            <button type="button" name="button" class="iconBtn">העלה קובץ</button>
          </div>
          <div class="fixIcon">
            <img src="images/open-iconic/svg/plus.svg" style="width:50px;height:50px">
            <?php
              echo "<a href='addTeacherLesson.php?id=" . $myId . "&teacherId=" . $teacherId . "'> <button type='button' name='button' class='iconBtn'>קבע שיעור</button> </a>"
             ?>
          </div>
        </article>
    </section>
    <section class="sideBar">
    <article class="nextLesson">
      <h6> השיעורים הבאים </h6>
      <ul><br>
        <?php
        while($row = mysqli_fetch_assoc($result3)){
          echo "<li><b>" . $row['firstName'] . "</b>" . ": " . $row['date'] . " - " . $row['time'] . "</li>";
        }
         ?>
      </ul>
    </article>
    <article class="nextSubmition">
      <h6>ההגשות הבאות</h6>
      <ul id="submition"><br>
      </ul>
    </article>
    </section>
  </main>
  <footer>

  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="includes/main.js"></script>

</body>
</html>
