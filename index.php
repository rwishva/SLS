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
        
        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='css/bstyle.css' />
        <link rel='stylesheet' type='text/css' href='css/style_sign.css' />
        <script src="js/jquery.min.js"></script>
      <!-- <link href="css/style.css" rel="stylesheet"> -->
<script>
  function showResult(str) {
    if (str.length==0) { 
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("resbox").innerHTML=xmlhttp.responseText;
        // document.getElementById("resbox").style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","get_results.php?idx=no&q="+str,true);
    xmlhttp.send();
  }
</script>

<script type="text/javascript">
  window.onload = function() {
    document.getElementById("query").focus();
  };
</script>

<script type="text/javascript">
  $(document).ready(function(){
    // $("#add_err").css('display', 'none', 'important');
     $("#btn-login").click(function(){  
        username=$("#email").val();
        password=$("#password").val();
        $.ajax({
         type: "POST",
         url: "get_login.php",
        data: "email="+username+"&password="+password,
         success: function(html){    
        if(html=='true')    {
         //$("#add_err").html("right username or password");
         window.location="index.php";
        }
        else    {
        window.location="login.php?error=yes";
        }
         },
         beforeSend:function()
         {
         // $("#add_err").delay( 100000 );

        $("#loading-img").html("<img id='img-login' src='img/loading-2.gif' />")
         }
        });
      return false;
    });
  });
</script>

</head>
 
<body>
                
<?php include 'header.php';?>
<div id="loading-img"></div>
  <div class="container-fluid">

    <div class="row outline" id="searchbar">
      <div class="col-sm-1 outline">
      </div>

      <div class="col-sm-5 outline">
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
        <div class="row outline">
          <div class="col-sm-1">
            <div class="container-fluid nopad">
          <!--   <form action="add.php">
              <button type="submit" class="btn btn-default navbar-btn" id="indexbtn">Index Your Links</button>
            </form> -->
            <form action="add.php">
              <button type="submit" class="btn btn-default navbar-btn" id="btn-red">Index Your Links</button>
            </form>
            </div>
          </div>
        </div>
      </div>      
    </div>

    <div class="row" id="resbar">
      <div class="col-sm-1 outline">
      </div>

      <div class="col-sm-5 outline">
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

      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <h3>How to Index Correctly</h3>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item vidshadow" src="//www.youtube.com/embed/ePbKGoIGAXY"></iframe>
                </div>
            </div>
          </div>
        </div>
      </div>

      </div>
    </div>

  </div>

                    
<?php include 'footer.php';?>

</body>

</html>

