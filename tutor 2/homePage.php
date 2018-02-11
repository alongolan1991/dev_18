<?php
header('Content-Type: text/html; charset=utf-8');
include('db.php');
//get data from DB
$teacher_id = $_GET['teacher_id'];
$query = "SELECT * FROM tbl_teacher_229 WHERE id='" . $teacher_id . "'" ;   //getting detaild of teacher
$result = mysqli_query($connection, $query);
if(!$result) {
  die("DB query failed.");
}
$teacher_details = mysqli_fetch_assoc($result);
// $teacher_id = $teacher_details['id'];

$query = "SELECT * FROM tbl_t2s_229 WHERE teacher_id='" . $teacher_id . "'" ;
$result1 = mysqli_query($connection, $query);
if(!$result1) {
  die("DB query failed.");
}


?>


<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="images/tutorLogo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Home page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="includes/style.css">
</head>
<body id="layout2">
  <div class="wrapper">
    <header>
      <a href="#"><b>Tutor</b></a>
      <section>
        <a href="#">12</a>
        <?php
        echo "<p> שלום " . $teacher_details["firstName"] . "</p>";
         ?>
      </section>
    </header>
    <nav>
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <?php
          echo "<a class='nav-link' href='calendar.php?teacher_id=". $teacher_id ."'><img class='calendarIcon' src='images/calendar.png'><span class='fixLetter'>הפגישות שלי</span></a>";
           ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><img class="studentsIcon" src="images/students.png" alt=""><span class="fixLetter">התלמידים שלי</span><section class="selected"></section></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><img class="teacherIcon" src="images/teachprofile.png" alt=""><span class="fixLetter">פרופיל מורה</span></a>
        </li>
      </ul>
    </nav>
    <main>
      <section id="toolBar">
        <b>עריכה</b>
        <img id="glass" src="images/glass.png" alt="">
        <img id="addUser" src="images/adduser.png" alt="">
      </section>
      <section class="formAppointment">
      <?php
      while($row = mysqli_fetch_assoc($result1)) {
        $query = "SELECT * FROM tbl_student_229 WHERE id=" . $row['student_id'];
        $result = mysqli_query($connection, $query);
        if(!$result) {
          die("DB query failed.");
        }
        $row1 = mysqli_fetch_assoc($result);
        echo "<a href='studentProfile.php?id=" . $row1['id'] . "&teacher_id=" . $teacher_details['id'] ."'> <article class='studBox' id=" . $row1['id'] . ">" .
             "<h6 class='head6'>" . $row1['firstName'] . "</h6>" .
             "<img class='fixPhoto' src='" . $row1['image'] . "'>" .
             "</article>" .
             "</a>";
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
//close DB connection
mysqli_close($connection);
?>
