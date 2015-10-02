<?php
    include("dbmc.php");
    // session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>MC - Select Pixels</title>
    <link href='/SLS/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' href='/SLS/css/bstyle.css' />
    <link rel="SHORTCUT ICON" href="fav-2.png">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel='stylesheet' type='text/css' href='/SLS/css/style_hove.css' />
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


  <script>
  var selectedpxs = [];
  var pxs;
    $(function() {
      $( "#Map" ).selectable({
        selected: function( event, ui ) {

          var pxs = $(ui.selected).attr('id');
          selectedpxs.push(pxs);
     
        }
      });



  $( "#Map" ).selectable({
  start: function( event, ui ) {
          selectedpxs = [];
        }
        });


  $( "#Map" ).selectable({
  stop: function( event, ui ) {
          
          $("#popup_div").dialog({ autoOpen: false });
          document.getElementById("aaa").innerHTML = selectedpxs;
          $( "#popup_div" ).dialog({
            dialogClass: "alert",
            title: "Pixel selection"
          });
          $("#popup_div").dialog("open");
        }
        });

    });

  function closebox()
  {
    $("#popup_div").dialog("close"); 
      
    $( "#Map" ).selectable( "refresh" ); 
  }

  // var sTitle="";
  // function d(o) {
  //   alert(fruits);
  //   // sTitle = o.id;
  // }
  // function e(o) {
  //   sTitle = "";  
  // }
      function updateselected()
      {
      dataString = selectedpxs ; // array?
      var jsonString = JSON.stringify(dataString);
         $.ajax({
              type: "POST",
              url: "updateselected.php",
              data: {data : jsonString}, 
              cache: false,
              dataType: 'json',

              success: function(data){
                  // window.location='millioncompany.php'
                   // var $response=$(data);
                   if(data.type == 'success') {
                         window.location.href = "pricing.php?pxset=" + data.message;
                      }
                  
              }
          });
      }
  </script>
</head>
<body>


<div id="popup_div" class="alert">
<center>
<a href="" class="pull-center">You Have Selected Following Pixels</a>
<p href="" id="aaa">You Have Selected</p>
  <button class="btn btn-default navbar-btn" id="gold" type="button" onclick="updateselected()">Reserve</button>
  <button class="btn btn-default navbar-btn" id="gold" type="button" onclick="closebox()">Reset</button>
  </center>
  
</div>
<div id="fade" class="black_overlay"></div>

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
                  <!-- <img src="kolla.jpg" width="1001" height="1001" alt="Planets" usemap="#Map"> -->

                <div id="pixels" style="z-index:1">
                  <map name="Map" id="Map">
                    <?php
                    $j = 0;
                    $k = 0;
                    for ($h=0; $h <100 ; $h++) { 
                      # code...
                    
                  for ($i=0; $i <100 ; $i++) {
                        $j=$i*10;
                        $m=$h*10;
                        $n=($h+1)*10;
                        $l=($i+1)*10;
                        $k++;

                    echo "<area   class='ui-state-default' shape='rect' coords=".$j.",".$m.",".$l.",".$n."' href='#' title='MillionCompany:".($k)."' id='".($k)."'>";
                        // echo "<area   class='available' shape='rect' coords=".$j.",".$m.",".$l.",".$n."' href='#' title='MillionCompany:".($k)."' id='".($k)."'>";
                     }
                    
                    }
              /*
                    // for ($i=0; $i < 10 ; $i++) { 
                    //   # code...
                    // echo "<p onmouseover='d()' >fdfd</p>";

                    // $get_user_sql = "SELECT * from companies where id=".$k." LIMIT 1";
                    // $get_user_query = mysqli_query($conn,$get_user_sql);
                     // if(mysqli_num_rows($get_user_query)!=0){
                      // $rs = mysqli_fetch_assoc($get_user_query);
                      // $x1 = $rs['x1'];
                      // if($rs['reserved']==1)
                      // echo "<area onmouseover='d(this)' class='ui-state-default' onmouseout='e(this)' shape='rect' coords=".$rs['x1'].",".$rs['y1'].",".$rs['x2'].",".$rs['y2']."' href='".$rs['link']."' title='".($rs['title'])."'>";
                      // echo "<area id=".$rs['id']." onmouseover='d(this)' class='reserved' onmouseout='e(this)' shape='rect' coords=".$rs['x1'].",".$rs['y1'].",".$rs['x2'].",".$rs['y2']."' href='".$rs['link']."' title='".($rs['title'])."'>";
                      // echo "<area id=".$rs['id']." onmouseover='d(this)' class='available' onmouseout='e(this)' shape='rect' coords=".$rs['x1'].",".$rs['y1'].",".$rs['x2'].",".$rs['y2']."' href='".$rs['link']."' title='".($rs['title'])."'>";
                    // }
                  //   }
                  // }

              */
                    ?>

                  </map>

              </tr>
            </table>
          </div>
        </center>
 
 
</body>
</html>