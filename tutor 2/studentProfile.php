<?php
  include('db.php');
  $myId = $_GET['id'];
  $teacher_id = $_GET['teacher_id'];

  $query = "SELECT * FROM tbl_student_229 WHERE id=". $myId;   //getting detaild of student
  $result = mysqli_query($connection, $query);
  if(!$result) {
    die("DB query failed.");
  }
  $student_details = mysqli_fetch_assoc($result);

  $query1 = "SELECT * FROM tbl_teacher_229 WHERE id=" . $teacher_id;   //getting detaild of student
  $result1 = mysqli_query($connection, $query1);
  if(!$result1) {
    die("DB query failed.");
  }
  $teacher_details = mysqli_fetch_assoc($result1);


  $query2 = "SELECT * FROM tbl_t2s_229 WHERE  teacher_id=" . $teacher_id ." AND student_id=". $myId;   //getting detaild of student
  $result2 = mysqli_query($connection, $query2);
  if(!$result2) {
    die("DB query failed.");
  }
  $t2s_details = mysqli_fetch_assoc($result2);


 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="images/tutorLogo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>student page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="includes/style.css">
</head>
<body id="layout3">
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

      <?php
      echo "<h4 id='studentName'><u>" . $student_details['firstName'] . "</u></h4>";
       ?>
      <section id="profileSection">
        <form id="noteForm" action="#" method="post">
          <label id="formLabel" for="textArea">תזכורת</label>
          <textarea id="textArea" name="note" rows="8" cols="19" dir=rtl> <?php echo $t2s_details['note']; ?></textarea>
          <input id="submitBtn" type="submit" name="submit" value="עדכן">
        </form>
        <article class="studProfileBox">
          <?php
          echo "<img src='". $student_details['image'] ."'>";
           ?>
           <a href="#" id="studentDetails"><u>פרטי תלמיד</u></a> </article>
      </section>
      <section id="bottomLine">
        <?php
        echo "<button class='bottomBtn' type='button' name='button'><a href='progress.php?id=" . $myId . "&teacher_id=" . $teacher_id ."'>קצב התקדמות</a></button>";
         ?>
        <!-- <button class="bottomBtn" type="button" name="button"><a href="progress.php?id=">קצב התקדמות</a></button> -->
        <button class="bottomBtn" type="button" name="button">שיתוף קבצים</button>
        <button class="bottomBtn" type="button" name="button">צ'אט</button>
      </section>
    </main>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js">

  </script>
  <script src="includes/main.js"></script>
  <script>
  $(function() {
    $("#noteForm").submit(function() {
      var note = $("#textArea");
      var myNote = $("#textArea").val();

      var dataString = 'note=' + myNote + "&id=" + <?php echo $myId ?> + "&teacher_id=" + <?php echo $teacher_id ?>;

      $.ajax({
        type: 'POST',
        url: 'action.php',
        data: dataString,
        cache: true,
        success: function(html){
          note.append(html);
        }
      });
      return false;
    });
  });
  </script>
</body>
</html>
<?php
//close DB connection
mysqli_close($connection);
?>
