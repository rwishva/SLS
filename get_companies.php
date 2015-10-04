<?php
include("dbmc.php");

for ($i=1; $i < 101 ; $i++) {

  $get_user_sql = "SELECT * from companies where id=".$i." LIMIT 1";
  $get_user_query = mysqli_query($conn,$get_user_sql);
  if(mysqli_num_rows($get_user_query)!=0){
    $rs = mysqli_fetch_assoc($get_user_query);
    if($rs['reserved']==1)
      echo "<area id=".$rs['id']." onmouseover='d(this)' class='ui-state-default trigger' onmouseout='e(this)' shape='rect' coords=".$rs['x1'].",".$rs['y1'].",".$rs['x2'].",".$rs['y2']."' href='".$rs['link']."' title='".($rs['title'])."'>";
      echo "<area id=".$rs['id']." onmouseover='d(this)' class='reserved trigger' onmouseout='e(this)' shape='rect' coords=".$rs['x1'].",".$rs['y1'].",".$rs['x2'].",".$rs['y2']."' href='".$rs['link']."' title='".($rs['title'])."'>";
      echo "<area id=".$rs['id']." onmouseover='d(this)' class='available trigger' onmouseout='e(this)' shape='rect' coords=".$rs['x1'].",".$rs['y1'].",".$rs['x2'].",".$rs['y2']."' href='".$rs['link']."' title='".($rs['title'])."'>";
  }
}
 ?>