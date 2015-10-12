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
            $set_lastlogin_sql = "UPDATE users set lastlogin=now() where username like '%$v3%'";
            // $set_lastlogin_query = mysqli_query($set_lastlogin_sql);
            header('Location: /SLS/');
            
        } 
        else {
            echo "false";
        }
    }
    else { 
    }
?>

<html>
    <head>
        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='css/bstyle.css' />
        
    </head>
    <body>
        <?php include 'header.php';?>
            <div class="container-fluid">
                <div class="row outline" id="searchbar">
                    <div class="col-sm-2 outline">
                    </div>

                    <div class="col-sm-8">
                        
                                <?php
                                if(isset($_GET['error'])){
                                ?>
                                    <div class="row">
                                        <center>
                                            <div class="login-ui">
                                                <div class="login-error-dsp">
                                                  <a><strong>Hmm</strong> :</a>
                                                  <a>I did something wrong...</a>
                                                    <ul>
                                                    <li>My username correct ?</li>
                                                    <li>My<strong> password </strong>correct ?</li>
                                                    <li>No, Try again</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                <?php
                                }
                                ?>
                                
                        <div class="row">
                            <center>
                                <div class="login-ui bordershadow">
                                    <center>
                                        <form name="loginsub" class="form-middle" method="post">
                                            <table class="tbl-login">
                                                <tbody>
                                                    <tr>
                                                        <td class="marg">Username</td>
                                                        <td class="marg">Password</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <input  name="email" id="email" size="30" maxlength="100"  style="background-attachment: scroll;  background-repeat: no-repeat;">
                                                        </td>
                                                        <td>
                                                        <input type="password" name="password" id="password" size="30" maxlength="100" autocomplete="off" style="background-attachment: scroll; background-repeat: no-repeat;">
                                                        </td>
                                                        <td><button id="btn-login" type="submit">Sign in</button></td>
                                                    </tr>   
                                                    <tr>
                                                        <td id="checkbox">
                                                            <div class="checkbox">
                                                                <label><input type="checkbox" value="">Remember me</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </center>
                                </div>
                            </center>
                        </div>
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
                                <div class="login-ui-signup bordershadow">
                                    <center>
                                        <form class="form-middle" name="loginsub" method="post">
                                            Don't have an account? <a href="signup.php">Sign up</a>
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