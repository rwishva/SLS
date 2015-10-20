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
            $_SESSION['luser'] = $v3;
            $_SESSION['ip'] = $rs['ip'];
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
            $set_lastlogin_sql = "UPDATE users set lastlogin=now() where username like '%$v3%'";
            // $set_lastlogin_query = mysqli_query($set_lastlogin_sql);
            header('Location: /SLS/');
        } 
        else {
            
                
                echo "<div class='center' id='main'>";
                echo "Please enter the username or password again!";
                echo "</div>";
            
        }
    }
    else {
        // echo "<html>";
        // echo "<head>";
        // echo "<link rel='stylesheet' type='text/css' href='/SLS/css/style.css' />";
        // echo "</head>";
        // echo "</body>";
        // echo "<div class='center' id='main'>";
        // echo "Please Contact Admin! or provide correct username";
        // echo "</div>";
        // echo "</body>";
        // echo "</html>";  
    }
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">    
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' href='css/bstyle.css' />
    
</head>
<body>
<?php include 'header.php';?>
        
<div class="container-fluid">
    <div class="row topmargin"><div id="mobileapp"></div></div>
    <div class="row"><center><h3>SLS is the Srilanka's largest user driven link provider</h3></center></div>
    <div class="row outline" id="searchbar">
      <div class="col-sm-2 outline">
      </div>

    <div class="col-sm-8">
        <center>
            <div class="signup-ui bordershadow whitebg">
                <center>
                    <div class="signup-align">
                        <form name="loginsub">
                            <table class="tbl-login">
                                <tbody>
                                    <tr>
                                        <td><strong>Display Name</strong></td>
                                    </tr>
                                
                                    <tr>
                                        <td>
                                        <input  name="email" class="signup-ui-input" size="30" maxlength="100"  style="background-attachment: scroll;  background-repeat: no-repeat;">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Email (required, but never shown)</strong></td>
                                    </tr>
                                
                                    <tr>
                                        <td>
                                        <input  name="email" class="signup-ui-input" size="30" maxlength="100"  style="background-attachment: scroll;  background-repeat: no-repeat;">
                                        </td>
                                    </tr>
                                   
                                    <tr>
                                        <td><strong>Password</strong></td>
                                    </tr>
                                
                                    <tr>
                                        <td>
                                        <input type="password" name="password" class="signup-ui-input" size="30" maxlength="100" autocomplete="off" style="background-attachment: scroll; background-repeat: no-repeat;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Confirm Password</strong></td>
                                    </tr>
                                
                                    <tr>
                                        <td>
                                        <input type="password" name="password" class="signup-ui-input" size="30" maxlength="100" autocomplete="off" style="background-attachment: scroll; background-repeat: no-repeat;">
                                        </td>
                                    </tr>
                                    <tr><td>
                                    </td></tr>
                                    <tr>
                                        <td><button id="btn-signup" type="submit">Sign up</button></td>  
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </form>
                        By registering, you agree to the <a>privacy policy</a> and <a>terms of service.</a>
                    </div>
                </center>
                
            </div>
        </center>
    </div>
    <div class="col-sm-2 outline">      
    </div>
  </div>
  <div class="row outline" id="searchbar">
                    <div class="col-sm-2 outline">
                    </div>

                    <div class="col-sm-8">
                        <div class="raw">
                            <center>
                                <div class="login-ui-signup bordershadow whitebg">
                                    <center>
                                        <form class="form-middle" name="loginsub" method="post">
                                            Already have an account? <a href="login.php">Login</a>
                                        </form>
                                    </center>
                                </div>
                            </center>
                        </div>
                    </div>

                    <div class="col-sm-2 outline">      
                    </div>
                </div>

  <div id="msg"></div>
</div>
 <?php include 'footer.php';?>  
</body>

</html>

 <?php
    
    
 ?>