<?php
  include('db.php');
  $teacher_id = $_GET['teacher_id'];

  $query1 = "SELECT * FROM tbl_teacher_229 WHERE id='" . $teacher_id ."'";   //getting detaild of student
  $result1 = mysqli_query($connection, $query1);
  if(!$result1) {
  die("DB query failed.");
  }
  $teacher_details = mysqli_fetch_assoc($result1);

  $query2 = "SELECT se.firstName FROM (SELECT student_id FROM tbl_t2s_229 WHERE teacher_id ='" . $teacher_id . "') as s INNER JOIN tbl_student_229 AS se on se.id = s.student_id ";
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
  <title>Add appointment</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="includes/style.css">
</head>
<body id="layout9">
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
      <h3 class='appointments'> הוספת שיעור </h3>
    <?php
    echo "<form class='formAppointment' action=acceptMeeting.php?teacher_id=" . $teacher_id . " method='post'>";
    ?>
        <select name="studentName" class="textinput" dir="rtl">
          <?php
          while($students_details = mysqli_fetch_assoc($result2)){
          echo "<option value='". $students_details['firstName'] ."'>" . $students_details['firstName'] . "</option>";
          }
           ?>
        </select>
        <img src="images/open-iconic/svg/person.svg" class="myIcon">
        <br>
        <br>
        <input type="date" name="date" value=""  class="textinput">
        <img src="images/open-iconic/svg/calendar.svg" class="myIcon">
        <br>
        <br>
        <input type="time" name="time" value="" class="textinput">
        <img src="images/open-iconic/svg/clock.svg" class="myIcon">
        <br>
        <br>
        <section>
          <textarea name="comment" class="textinput" id="textarea1" placeholder="הוסף תיאור" dir="rtl"></textarea>
          <img src="images/open-iconic/svg/comment-square.svg" class="myIcon" style="vertical-align:top">
        </section>
        <br>
        <br>
        <input type="submit" name="submit" value="שמור" class="addMeetBtn" id="saveBtn" >
        <?php
          echo "<a href='calendar.php?teacher_id=" . $teacher_id . "'><button type='button' name='button' class='addMeetBtn'>ביטול</button></a>";
         ?>
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
