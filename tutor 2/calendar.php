<?php
  include('db.php');
  $teacher_id = $_GET['teacher_id'];

  $query1 = "SELECT * FROM tbl_teacher_229 WHERE id=" . $teacher_id;   //getting detaild of student
  $result1 = mysqli_query($connection, $query1);
  if(!$result1) {
  die("DB query failed.");
  }
  $teacher_details = mysqli_fetch_assoc($result1);

  $query2 = "SELECT * FROM (SELECT S.firstName,te.teacher_id,te.date,te.time,te.comment FROM tbl_teacher_meets_229 AS te INNER JOIN tbl_student_229 AS S ON S.id = te.student_id ORDER BY te.date) AS tab WHERE tab.teacher_id ='" . $teacher_id . "'";
  $result2 = mysqli_query($connection, $query2);
  if(!$result2) {
  die("DB query failed.");
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="images/tutorLogo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>calendar</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="includes/style.css">
</head>
<body id="layout8">
  <div class="wrapper">
    <header>
      <?php
        echo "<a href='homePage.php?teacher_id=". $teacher_id . "'><b>Tutor</b></a>";
      ?>
      <section>
        <a href="#">12</a>
        <?php
        echo "<p> שלום " . $teacher_details['firstName'] . "</p>";
         ?>
      </section>
    </header>
    <nav>
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link" href="#"><img class="calendarIcon" src="images/calendar.png" alt=""><span class="fixLetter">הפגישות שלי</span><section class="selected"></section></a>
        </li>
        <li class="nav-item">
          <?php
        echo "<a class='nav-link' href='homePage.php?teacher_id=" . $teacher_id . "'><img class='studentsIcon' src='images/students.png'><span class='fixLetter'>התלמידים שלי</span></a>";
           ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><img class="teacherIcon" src="images/teachprofile.png" alt=""><span class="fixLetter">פרופיל מורה</span></a>
        </li>
      </ul>
    </nav>
    <main>
      <?php
      echo "<h3 class='appointments'><a href='add-appointment.php?teacher_id=" . $teacher_id . "'><img src='images/plus1.png' id='addMeet'></a>הפגישות שלי</h3>";
       ?>
      <section>
<?php  while($teacher_meets = mysqli_fetch_assoc($result2)){
        echo
         "<article>" .
             "<article class='calendarBox' >" .
                 "<img src='images/grayArrow.png' class='fixArrow' >" .
                 "<h6 class='calendarTime'>" . $teacher_meets['time'] . "</h6>" .
                 "<h6 class='calendarDate'>" . $teacher_meets['date'] . "</h6>" .
                 "<h6 class='calendarName'>" . $teacher_meets['firstName'] . "</h6>" .
             "</article>" .
             "<article class='fadesection'>" .
                 "<p class='calendarComment'>" . $teacher_meets['comment'] ."</p>" .
                 "<a class='deleteAppointment' href='deleteAppointment.php?firstName=" . $teacher_meets['firstName'] . "&date=" . $teacher_meets['date'] . "&time=" . $teacher_meets['time'] . "&teacher_id=" . $teacher_id . "'><b>מחק פגישה</b></a>" .
             "</article>" .
         "</article>";
      }
?>
      </section>
    </main>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="includes/main.js"></script>
</body>
</html>
<?php
  mysqli_close($connection);
 ?>
