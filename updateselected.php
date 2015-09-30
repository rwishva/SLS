<?php
include("dbmc.php");
	$data = json_decode(stripslashes($_POST['data']));

		foreach($data as $d){
		  	 $update_user_sql = "UPDATE companies SET added_date=now(),reserved=1 where id=".$d." LIMIT 1";
		     $update_user_query = mysqli_query($conn,$update_user_sql);
		  }
	$return = array('type'=>'success', 'message'=>$data);
    echo json_encode($return); 
?>