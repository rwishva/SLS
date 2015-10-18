<?php
    session_start();
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='css/bstyle.css' />
        <script src="js/jquery.min.js"></script>
        <script src="js/slsjs.js"></script>
        <script src="js/stats.js"></script>
        
    </head>
    <body>
        <?php include 'header.php';?>
            <div class="container-fluid">
            <div class="row greycolor"><center><h3>Stats</h3></center></div>
                <div class="row"><center><img src="img/living.gif"></center>
                </div>
                <div class="row outline head-contain" id="searchbar">
                    <div class="col-sm-2 outline">
                        <div class="row">
                            <center>
                            
                                <div class="header_box" style="width: auto">
                                <h2>Total Views</h2>
                                <h3><div id="views"></div></h3>
                                </div>
                            
                            </center>
                        </div>
                        <div class="row">
                            <center>
                            
                                <div class="header_box" style="width: auto">
                                <h2>Indexes</h2>
                                <h3><div id="indexes"></div></h3>
                                </div>
                            
                            </center>
                        </div>
                        <div class="row">
                            <center>
                            
                                <div class="header_box" style="width: auto">
                                <h2>Searches</h2>
                                <h3><div id="searches"></div></h3>
                                </div>
                            
                            </center>
                        </div>
                    </div>

                    
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="row">
                            <!-- <center> -->
                            
                                <div class="header_box" style="width:auto">
                                <?php 
                                $response = $client->indices()->stats(); 
                                echo '<pre style="background-color:transparent; border:none">', print_r($response['indices']['sls']), '</pre>';
                                ?>
                                </div>
                            
                            <!-- </center> -->
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