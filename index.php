<?php
    session_start();
    header("content-type: text/html; charset=UTF-8");
    // if(!empty($_POST) && !empty($_POST['email'])){
    //   header('Location: login.php');
    // }   
    
    // require 'validatesession.php';
           
?>
 <!-- From here all HTML coding can be done -->
<html>
    <head>
        
        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel='stylesheet' type='text/css' href='css/style_sign.css' />
        <script src="js/jquery.min.js"></script>
        <script src="js/slsjs.js"></script>
        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='css/bstyle.css' />

    </head>
 
<body>
                
<?php include 'header.php';?>
<div id="loading-img"></div>

  <div class="container-fluid">
    <div class="row topmargin"><div id="mobileapp"></div></div>
    <div class="row outline" id="searchbar">
      <div class="col-sm-1 outline">
      </div>

      <div class="col-sm-5 outline nopad">
        <form>
          <div class="centering text-center" id="searchbox">
              <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                  <input id="query" type="text" class="form-control"  placeholder="Search &larr;" name="q" onkeyup="showResult(this.value)">
                    <span class="input-group-addon">
                        <button type="submit">
                            <!-- <span class="search-ico"></span> -->
                            <img src="img/sico.png" style="width:20px; height:20px;">
                        </button>  
                    </span>
                </div>
              </div>
          </div>
        </form>
      </div>

      <div class="col-sm-6 outline">
        <div class="row outline aligning">
          <div class="col-sm-1">
            <div class="container-fluid nopad">
            <form action="add.php">
               <button type="submit" class="btn btn-default navbar-btn" id="gold">Index Your Links</button>
            </form>
            </div>
          </div>
        </div>
      </div>      
    </div>

    <div class="row" id="resbar">
      <div class="col-sm-1 outline">
      </div>

      <div class="col-sm-5 outline whitebg">
          <div id="resbox">
            <?php include 'get_results.php' ?>

          </div>
      </div>

      <div class="col-sm-6 outline borderl">
        <div class="row">
        <div class="col-sm-1">
        <div class="container-fluid pull-center notice">
          <div class="header_box">
          <a><strong>Info</strong> :</a>
          <a>Now You can index your own links on SLS</a>
            <ul>
            <li>Get Register</li>
            <li>Paste the link eg:- <strong>http://www.yourlink.lk</strong></li>
            <li>Click the Golden index button above</li>
            <li>Continue</li>
            </ul>
          </div>
        </div>


      </div>
      </div>

      <!-- <div class="row">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h3>How to Index Correctly</h3>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item vidshadow" src="//www.youtube.com/embed/ePbKGoIGAXY"></iframe>
                </div>
            </div>
          </div>
        </div>
      </div> -->

      </div>
    </div>

    <div class="row outline" id="index-links">
      <div class="col-sm-2 outline">
      </div>

      <div class="col-sm-8 outline">
        
        <div class="row outline">
          <center>
            <div class="container-fluid nopad">
              <form action="add.php">
                &rarr; <button type="submit" class="btn btn-default navbar-btn" id="gold">Index Your Links</button> &larr; 
              </form>
            </div>
          </center>
        </div>
        
      </div>

      <div class="col-sm-2 outline">
      </div>      
    </div>

  </div>

                    
<?php 
include 'footer.php';
?>

</body>

</html>

