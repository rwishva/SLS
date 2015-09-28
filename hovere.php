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
  #Map .ui-selecting { background: #FECA40; }
  #Map .ui-selected { background: #F39814; color: white; }
  #Map { list-style-type: none; margin: 0; padding: 0; width: 450px; }
  #Map area { margin: 0px; padding: 0px; float: left; width: 10px; height: 10px; font-size: 4em; text-align: center; }
  center {min-width: 1000px;min-height: 1000px;}
  </style>
  <script>
  $(function() {
    $( "#Map" ).selectable();
  });
  </script>
</head>
<body>

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

                    echo "<area onmouseover='d(this)' class='ui-state-default' onmouseout='e(this)' shape='rect' coords=".$j.",".$m.",".$l.",".$n."' href='#' title='MillionCompany:".($k)."'>";
                     }
                    
                    }
                    ?>

                  </map>

              </tr>
            </table>
          </div>
        </center>
 
 
</body>
</html>