var students = [
  {firstName: "פישנזון", lastName : "גולן", id: "305468837", date: "2018-01-11", image: "images/me1.jpg"},
  {firstName: "מוטקה", lastName: "יונה", id: "203455266", date: "2018-01-09", image: "images/me2.jpg"},
  {firstName: "שירה", lastName: "לוי", id: "3054519833", date: "2018-01-05", image: "images/me3.jpg"},
  {firstName: "ניל", lastName: "בן שחר", id: "000000000", date: "2017-01-03", image: "images/me4.jpg"},
  {firstName: "דוד חיים", lastName: "אלבז", id: "112233445", date: "2017-01-12", image: "images/me5.jpg"},
  {firstName: "שלומי", lastName: "כהן", id: "123456789", date: "2018-01-05", image: "images/me6.jpg"}
];

var lesson = [
  {lessonNumber:"1", learnMaterial:"לוח הכפל" , dificultese :"חילוק" , homework: "עמוד 10 תרגילים 1-8" , grade:"85"},
  {lessonNumber:"2", learnMaterial:"משוואות טריגונומטריות" , dificultese :"זהויות" , homework: "עמוד 7 תרגילים 4-10" , grade:"93"},
  {lessonNumber:"3", learnMaterial:"שברים פשוטים" , dificultese :"מציאת מכנה משותף" , homework: "עמוד 75 תרגילים 1-11" , grade:"86"},
  {lessonNumber:"4", learnMaterial:"כפל וחילוק" , dificultese :"שורשים" , homework: "עמוד 75 תרגילים 1-11" , grade:"86"}
];

var Btn = $("#cancelBtn").on("click",function(){
  window.location.href="progress.html";
});
progress = $('#progress');
progress1 = $("#layout6 #progress")
function createstudBox(student)
{
  var h6 = $("<h6>").attr("class","head6").html(student.firstName);
  var pic = $("<img>").attr("src",student.image).css({width:"69%",height:"69%" });
  var nextLesson = $("<p>").attr("id","lessonDate").html("השיעור הבא: " + student.date);
  var studBox = $("<article>").attr({class: "studBox",id:student.id});
  if(student.firstName =="שירה"){
    var link = $("<a>").attr("href","studentProfile.html");
  }
  else {
    var link = $("<a>").attr("href","#");
  }
  studBox.append(h6);
  studBox.append(pic);
  studBox.append(nextLesson);
  link.append(studBox);
  return link;
}

function createlesson(lesson)
{
  var bigsec = $("<article>").attr("class","bigSection");
  var lessBox = $('<article>').attr("class","lessonbox");
  var arrow =  $("<img>").attr("src", "images/grayArrow.png").css("width", '50px');
  var info =  $("<img>").attr("src", "images/info.png").css("width", '28px');
  var lessonNumber1 = $("<h6>").html(lesson.lessonNumber +" שיעור מספר").css({float: "right", marginTop: "14px", marginRight: "6px"});
  var togglesec = $("<article>").attr("class","fadesection");
  var MaterialStudied = $("<p>").attr("class","MaterialStudied").html( "חומר נלמד: " + lesson.learnMaterial);
  var dificultese = $("<p>").attr("class","dificultese").html("קשיי לימוד: " + lesson.learnMaterial);
  var homework =$("<p>").attr("class","homework").html("שיעורי בית: " + lesson.homework);
  var grade = $("<p>").attr("class","grade").html(lesson.grade + " :ציון");
  togglesec.append(MaterialStudied).append(dificultese).append(homework).append(grade);
  arrow.click(function(){
    togglesec.fadeToggle(500);
  });
  lessBox.append(arrow);
  lessBox.append(info);
  lessBox.append(lessonNumber1);
  bigsec.append(lessBox).append(togglesec);
  return bigsec;
}


function checkDate(date){
  var d = new Date(date);
  if (d.getTime() <= Date.now() - 86400000)
  return true;
  return false;
}

$('document').ready(function(){

  students.sort(function(a,b){

    return new Date(a.date) - new Date(b.date);
  });
  var nikba = $('#nikba');
  var loNikba = $('#loNikba');
  var main = $('#layout2 main');
  for(i = 0; i < students.length; i++)
  {
    if(checkDate(students[i].date) == true){
      students[i].date = " לא נקבע ";
      loNikba.append(createstudBox(students[i]));
    }
    else
    nikba.append(createstudBox(students[i]));
  }

  for(j = 0 ; j < 3 ; j++)
  {
    progress.append(createlesson(lesson[j]));
  }

  progress1.append(createlesson(lesson[3]));
});
