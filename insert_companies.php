<?php
include("dbmc.php");
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
                    $insert_user_sql = "INSERT INTO `companies` (`id`, `x1`, `y1`, `x2`, `y2`, `added_date`, `reserved`, `paid`, `link`, `title`) VALUES
(".$k.", ".$j.", ".$m.", ".$l.", ".$n.", '2015-09-28 00:00:00', 0, 0, 'http://www.your-comppany-link.lk', 'Your Company Title');";
                    $insert_user_query = mysqli_query($conn,$insert_user_sql);

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