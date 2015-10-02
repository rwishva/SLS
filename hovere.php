<?php
    include("dbmc.php");
    // session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>jQuery UI Selectable - Display as grid</title>
    <link href='/SLS/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' href='/SLS/css/bstyle.css' />

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<style>
  #feedback { font-size: 1.4em; }
  #Map .ui-selecting { background-image: url("A.png"); }
  #Map .ui-selected { background-image: url("R.png"); color: white; }
  #Map { list-style-type: none; margin: 0; padding: 0; width: 450px; }
  #Map area { margin: 0px; padding: 0px; float: left; width: 10px; height: 10px; font-size: 4em; text-align: center; }
  /*center {min-width: 1000px;min-height: 1000px;}*/
   #Map .ui-state-default{border: 0;}
   /*#Map .ui-state-default{border: 0; background-image: url("A.png"); z-index: inherit;}*/
   .box {
    /*background-color: lightgrey;
        background: url(bodybg.gif) repeat #FFFFFF;*/
    width: 1000px;
    height: 1000px;
    /*padding: 25px;*/
    border: 1px solid #BABABB;
    margin: 25px;
    margin-top: 0;
    vertical-align: middle;
}
#Map .available { background-image: url("A.png"); }
#Map .reserved { background-image: url("R.png"); }


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
<script>
var selectedpxs = [];
var pxs;
  $(function() {
    $( "#Map" ).selectable({
      selected: function( event, ui ) {
        // alert( event.pageX)

        var pxs = $(ui.selected).attr('id');
        selectedpxs.push(pxs);
        // selectedpxs.length = 0;
        // console.log(fruits);
        // delete fruits;
        //cars ="";
        // alert();
        // var idlist = $(this).attr('id');
        // alert(idlist);
      }
    });
  });


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
<button type="button" onclick="updateselected()">Reserve</button>
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