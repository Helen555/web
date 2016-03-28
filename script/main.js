var it_url = 0;
var m = null;
$(document).ready(function () {
  $("body").ready(myclock = function () {
    d = new Date();
    var options = {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    };
    $("input[name='date']").val(d.toLocaleDateString("ru", options));
    $("input[name='clock']").val(d.toLocaleTimeString());
    setTimeout("myclock();", 500);
  });
  $('#datetime').hover(function () {
    $('#datetime').toggleClass('datetime');
  });
  $('div.logo').mouseover(logoAnim = function () {
    var url = ['img/main.png', 'img/main2.png', 'img/main3.png'];
    $("#logoPicture").attr("src", url[it_url]);
    it_url++;
    if (it_url > 2)
      it_url = 0;
    m = setTimeout("logoAnim();", 500);
  })
          .mouseout(function () {
            clearTimeout(m);
          });
});
;