<?php
  include('db.php');
  $myId = $_GET['id'];
  $teacher_id = $_GET['teacher_id'];

  $query1 = "SELECT * FROM tbl_teacher_229 WHERE id='" . $teacher_id ."'";   //getting detaild of student
  $result1 = mysqli_query($connection, $query1);
  if(!$result1) {
  die("DB query failed.");
  }
  $teacher_details = mysqli_fetch_assoc($result1);

 ?>


<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="images/tutorLogo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>lesson form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="includes/style.css">
</head>
<body id="layout5">
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
          <?php
          echo "<a class='nav-link' href='calendar.php?teacher_id=" . $teacher_id . "'><img class='calendarIcon' src='images/calendar.png'><span class='fixLetter'>הפגישות שלי</span></a>";
           ?>
        </li>
        <li class="nav-item">
          <?php
            echo "<a class='nav-link' href='homePage.php?teacher_id=" . $teacher_id . "'><img class='studentsIcon' src='images/students.png'><span class='fixLetter'>התלמידים שלי</span><section class='selected'></section></a>";
           ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><img class="teacherIcon" src="images/teachprofile.png" alt=""><span class="fixLetter">פרופיל מורה</span></a>
        </li>
      </ul>
    </nav>
    <main>
      <article class="formAppointment">
        <h5>עריכת פרטים</h5>
      </article>
      <section id="lesForm">
        <?php
        echo "<form id='formAttr' action='add-lesson.php?id=" . $myId . "&teacher_id=" . $teacher_id . "'method='post'>";
        ?>
          <label class="formControl">
            <input class="textinput" type="text" name="lessonNumber" value="">
            <span class="formControlText">:שיעור מספר</span>
          </label>
          <label class="formControl">
            <input class="textinput" type="text" name="learnMaterial" value="">
            <span class="formControlText">:חומר נלמד</span>
          </label>
          <label class="formControl">
            <input class="textinput" type="text" name="dificultese" value="">
            <span class="formControlText">:קשיי לימוד</span>
          </label>
          <label class="formControl">
            <input class="textinput" type="text" name="homeWork" value="">
            <span class="formControlText">:שיעורי בית</span>
          </label>
          <section class="formActions">
            <input  type="submit" name="submit" id="submitBtn1" value="שמור">
            <?php
            echo "<a href='progress.php?teacher_id=" . $teacher_id . "&id=" . $myId . "'><button id='cancelBtn' type='button' name='button'>ביטול</button></a>";
            ?>
          </section>
        </form>
      </section>
      <section id="bottomLine">
        <button class="bottomBtn btnSelected" type="button" name="button">קצב התקדמות</button>
        <button class="bottomBtn" type="button" name="button">שיתוף קבצים</button>
        <button class="bottomBtn" type="button" name="button">צ'אט</button>
      </section>
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
