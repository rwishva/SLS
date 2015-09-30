<html>
    <head>
        
        <link href='/SLS/css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='/SLS/css/bstyle.css' />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="SHORTCUT ICON" href="fav-2.png">
<style>
  .box {
      background-color: lightgrey;
      background: url(bodybg.gif) repeat #FFFFFF;
      width: 1003px;
      height: 1003px;
      /*padding: 25px;*/
      border: 1px solid #BABABB;
      margin: 25px;
      margin-top: 0;
      vertical-align: middle;
  }
  body{
  	background: url(bodybg.gif) repeat #FFFFFF;
  }
  .SLS{
  	background-color: black;
  }
  #indexbtn {
      cursor: pointer;
      display: inline-block;
      color: #fff;
      line-height: 1;
      padding: .6em .8em;
      background: #009afd;
      -webkit-transition: background 0.15s ease, color 0.15s ease;
      -moz-transition: background 0.15s ease, color 0.15s ease;
      -ms-transition: background 0.15s ease, color 0.15s ease;
      -o-transition: background 0.15s ease, color 0.15s ease;
      border: 1px solid #1777b7;
      box-shadow: 0 1px 0 rgba(255,255,255,0.3) inset,0 1px 1px rgba(100,100,100,0.3);
      border-radius: 3px;

    }
  #describe{
    	color: white;
    }
    a{
    	color: #FFD700;
    }
    #footer{
    	    margin-bottom: 0;
    	    height: 10px;
    	    min-height: 10px;
    	    background-color: transparent;	
    }
    #footer a{
    	color: #BABABB;
    }

  table, th, td {
      border: 1px solid #8E8E8E;
  }
  tr{
    height: 10px;
  }
  #pixl{
    position: relative;
    clip: rect(5, 1, 5, 1);
    border: none;
    float: left;
    
  }
  #FAQ
  {
    margin-top: -5px;
    margin-right: 5px;
  }

  a.login {
    text-decoration: none;
    background: #636363;
    padding: .5em .5em .5em .5em;
    float: right;
    margin: -8px 0px -6px 0;
    color: #BAC2C5;
    font-size: 12px; }
  a.login:hover {
      color: #EFD700; 
    }
  a#brand:hover{
      /*color: #ffd999;*/
        text-decoration: none;
    color: #FFD700;
      text-shadow: -1px 1px 40px #ffc, 1px -1px 40px #fff;
    -webkit-transition: 500ms linear 0s;
    -moz-transition: 500ms linear 0s;
    -o-transition: 500ms linear 0s;
    transition: 500ms linear 0s;
    outline: 0 none;
    }
  /* clip: shape(top, right, bottom, left); NB 'rect' is the only available option */
  .description {
      display:none;
      position:absolute;
      border:1px solid #FFF;
      background-color: green;
     
  }
  div#pop-up{
    display: none;
    position: absolute;
    background: black;
    padding: 0;
    margin: 0;
    border: 1px solid #FFD700;
    color: #FFD700;
    /*height: 14px;*/
  }
</style>


<script type="text/javascript">
$(function() {
  var moveLeft = 20;
  var moveDown = 10;

  $('area.trigger').hover(function(e) {
    var x = document.getElementsByClassName("trigger");
    // alert(sTitle);
    $('div#pop-up').text(sTitle).show();
    // $('div#pop-up').show();
      //.css('top', e.pageY + moveDown)
      //.css('left', e.pageX + moveLeft)
      //.appendTo('body');
  }, function() {
    $('div#pop-up').hide();
  });

  $('area.trigger').mousemove(function(e) {
    $("div#pop-up").css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
  });

});
var sTitle="";
function d(o) {

  sTitle = o.title;
}
function e(o) {
  sTitle = "";  
}

    </script>      <!-- <link href="css/style.css" rel="stylesheet"> -->



    </head>

        <body>
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=122315927873707";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript" src="js/comps.js"></script>

<center>
  <nav class="navbar SLS">
    <div class="container-fluid">
      <div class="row-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        
        <a class="navbar-brand" href="millioncompany.php" id="brand"><strong>M</strong>illion<strong>C</strong>ompany.lk&#8482;</a>
      </div>
      <p class="navbar-text" id="describe">1,000,000 pixels &#8226; 10/= per pixel &#8226; Own a piece of Srilankan History




        <a href="#" class="a"></a></p>
      <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <!-- <form action="login.php">
          <button type="submit" class="btn btn-default navbar-btn pull-right" >Buy My Space</button>
          </form> -->
          <form action="buy.php">
            <button type="submit" class="btn btn-default navbar-btn pull-right" id="gold">Own My Space</button>
          </form>
          <!-- <p class="navbar-text">SLS Is Best Search</p> -->
        <!-- <div class="fb-like" data-href="https://www.facebook.com/kollalk" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div> -->
          
        </div><!-- /.navbar-collapse -->
      </div>
    </div> 
  </nav>


  <div class="container-fluid" id="FAQ">
      <div class="row-fluid" id="FAQ">
        <div id="FAQ"class="pull-right">
          <a href="faq.php" id="login" class="login">FAQ</a>
        </div>
      </div>
  </div>
  <div class="container-fluid" id="FAQ">
      <div class="row-fluid" id="FAQ">
        <div id="FAQ"class="pull-right">
          <a href="hovere.php" id="login" class="login">Buy</a>
        </div>
      </div>
  </div>
</center>

<center>
  <div class="box">
    <table>
      <tr>
                                  <!-- <td width="1000px" height="1000px" background="kolla.jpg" valign="top"> -->
        <img src="kolla.jpg" width="1001" height="1001" alt="Planets" usemap="#Map">
          <div id="pixels" style="z-index:1">
            <map name="Map" id="Map">
              <?php
                $j = 0;
                $k = 0;
                for ($h=0; $h <100 ; $h++) {                                      
                  for ($i=0; $i <100 ; $i++) {
                    $j=$i*10;
                    $m=$h*10;
                    $n=($h+1)*10;
                    $l=($i+1)*10;
                    $k++;
                    echo "<area onmouseover='d(this)' class='trigger' onmouseout='e(this)' shape='rect' coords=".$j.",".$m.",".$l.",".$n."' href='#' title='MillionCompany:".($k)."'>";
                  }                                      
                }
              ?>
            </map>

            <div id="pop-up">
              <p>
              </p>
            </div>

      </tr>
    </table>
  </div>
</center>
        	


<nav class="navbar navbar-default navbar-static-bottom" id="footer">
  <div class="container">
    <center><p class="text-muted credit"><a>Copyright &copy; MillionCompany.lk&#8482; All rights reserved. We are not responsible for the content of external sites. Images featured on homepage are &copy; of their respective owners. </a></p></center>
  </div>
</nav>  	
</body>
</html>