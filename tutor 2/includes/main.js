var Btn = $("#cancelBtn").on("click",function(){
  window.location.href="progress.html";
});

$('document').ready(function(){

  $('.fixArrow').click(function(){
    $(this).parent().next().fadeToggle(500);
  });
});

(function(){
  var submition = $("#submition");
  $.getJSON("includes/submitions.json", function(data){
    $.each(data.materials , function(key,value){
      submition.append("<li> הגשה ב" + value.material + " - " + value.date + "</li>");
    });
  });
})();
