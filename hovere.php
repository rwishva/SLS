<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>jQuery Tutorial - Pop-up div on hover</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <style type="text/css">

body {
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: #000 url(bg-texture.png) repeat;
  color: #dddddd;
}

h1, h3 {
  margin: 0;
  padding: 0;
  font-weight: normal;
}

a {
  color: #EB067B;
}

div#container {
/*  width: 580px;
  margin: 100px auto 0 auto;
  padding: 20px;
  background: #000;
  border: 1px solid #1a1a1a;*/
}
div#pop-up {
  display: none;
  position: absolute;
  background: #eeeeee;
  padding: 0;
  margin: 0;
  border: 1px solid red;
  color: black;
  /*height: 12px;
  padding: 0;
  margin: 0;*/
  /*width: 12px;*/
  /**/
 /* 
  
  
  color: #000000;
  
  font-size: 90%;*/
}
p{
	padding: 0;
	margin: 0;
}

    </style>
    <script type="text/javascript">
$(function() {
  var moveLeft = 20;
  var moveDown = 10;

  $('a#trigger').hover(function(e) {
    $('div#pop-up').show();
      //.css('top', e.pageY + moveDown)
      //.css('left', e.pageX + moveLeft)
      //.appendTo('body');
  }, function() {
    $('div#pop-up').hide();
  });

  $('a#trigger').mousemove(function(e) {
    $("div#pop-up").css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
  });

});



    </script>
  </head>
  <body>
  	 <div id="container">
    <h1>jQuery Tutorial - Pop-up div on hover</h1>
    <p>
      To show hidden div, simply hover your mouse over
      <a href="#" id="trigger">this link</a>.
    </p>

    <!-- HIDDEN / POP-UP DIV -->
    <div id="pop-up">
   
      <p>
        This div only appears when the
      </p>
    </div>

  </div>
  </body>
</html>