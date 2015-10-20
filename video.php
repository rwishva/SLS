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
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='css/bstyle.css' />
        <script src="js/jquery.min.js"></script>
        <script src="js/slsjs.js"></script>
        
    </head>
    <body>
        <?php include 'header.php';?>
            <div class="container-fluid">
                <div class="row topmargin"><div id="mobileapp"></div></div>
                <!-- <div class="row"><center><img src="img/living.gif"></center> -->
                <!-- </div> -->
                <div class="row"><center><h3>Video</h3></center></div>
                <div class="row outline head-contain" id="searchbar">
                    <div class="col-sm-3 outline">
                    </div>

                    
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <center>
                                <div class="bs-example" data-example-id="responsive-embed-16by9-iframe-youtube">
                                    <div class="embed-responsive embed-responsive-16by9 vidshadow">
                                        <iframe class="embed-responsive-item" width="720" height="360" src=https://www.youtube.com/embed/<?php echo $_GET['video']; ?> allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>

                    <div class="col-sm-3 outline">
                    </div>
                </div>
                <div id="msg"></div>
                <div class="row topmargin"><div id="mobileapp"></div></div>
                <div class="row topmargin"><div id="mobileapp"></div></div>
            </div>
         <?php include 'footer.php';?>  
    </body>

</html>