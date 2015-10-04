<html>
    <head>
        <title>MillionCompany - Srilankan Companies in pixels</title>
        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='css/bstyle.css' />
        <link rel='stylesheet' type='text/css' href='css/bstyle_main.css' />
        <script src="js/jquery.min.js"></script>
        <!-- <link rel="icon" type="image/png" href="img/fav-2.png" /> -->

        <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
<link rel="manifest" href="img/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">




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
        <div class="fb-like" data-href="https://www.facebook.com/MillionCompany-1637990863109674/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
          
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
        <img src="img/map1.jpg" width="1001" height="1001" alt="Planets" usemap="#Map">
          <div id="pixels" style="z-index:1">
            <map name="Map" id="Map">
              <?php
              include('get_companies.php');
                // $j = 0;
                // $k = 0;
                // for ($h=0; $h <100 ; $h++) {                                      
                //   for ($i=0; $i <100 ; $i++) {
                //     $j=$i*10;
                //     $m=$h*10;
                //     $n=($h+1)*10;
                //     $l=($i+1)*10;
                //     $k++;
                //     echo "<area onmouseover='d(this)' class='trigger' onmouseout='e(this)' shape='rect' coords=".$j.",".$m.",".$l.",".$n."' href='#' title='MillionCompany:".($k)."'>";
                //   }                                      
                // }
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