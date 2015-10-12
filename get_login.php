<?php
    // include("db.php");
    session_start();
    // echo $_POST['password'];
    if (!empty($_POST))
    {
        $v3 = $_POST['email'];
        $v4 = $_POST['password'];
        $get_user_sql = "SELECT * from users where username like '%$v3%' LIMIT 1";
        // $get_user_query = mysqli_query($conn,$get_user_sql);
        
        // if(mysqli_num_rows($get_user_query)!=0){
        // $rs = mysqli_fetch_assoc($get_user_query);
        $rs['email'] = "rangana";
        $rs['passwd'] = "123456";
        if ($rs['email']==$v3 && $rs['passwd']==$v4)
        {
            echo "true";
            $_SESSION['luser'] = $v3;
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
            
        } 
        else {
            
                
                echo "false";
            
        }
    }
    else {
      
    }
?>