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

                    
                    <div class="col-lg-8 col-md-8 col-sm-8 head-contain">
                        <div class="row">
                            <center>
                                <div class="bs-example" data-example-id="responsive-embed-16by9-iframe-youtube">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item vidshadow" width="600" height="338" src=https://www.youtube.com/embed/<?php echo $_GET['video']; ?> allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </center>
                        </div>
                        <div class="row">
                            <center>
                                
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