<?php
    include("dbmc.php");
    // session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
   <title>jQuery UI Selectable - Display as grid</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<style>
  #feedback { font-size: 1.4em; }
  #Map .ui-selecting { background-image: url("A.png"); }
  #Map .ui-selected { background-image: url("R.png"); color: white; }
  #Map { list-style-type: none; margin: 0; padding: 0; width: 450px; }
  #Map area { margin: 0px; padding: 0px; float: left; width: 10px; height: 10px; font-size: 4em; text-align: center; }
  center {min-width: 1000px;min-height: 1000px;}
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
body{
  background: url(bodybg.gif) repeat #FFFFFF;
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