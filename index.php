<?php
    session_start();
  header("content-type: text/html; charset=UTF-8");    
    
    // require 'validatesession.php';
           
?>
 <!-- From here all HTML coding can be done -->
<html>
    <head>
        
        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='css/bstyle.css' />
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
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
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

    </head>
 
        <body>
                
                <?php include 'header.php';?>



 <div class="container-fluid">

   <div class="row" id="searchbar">
    <div class="col-sm-2">
    </div>
      <div class="col-sm-6">
        <form>
          <div class="centering text-center" id="searchbox">

                <div id="imaginary_container"> 
                        <div class="input-group stylish-input-group">
                            <input id="query" type="text" class="form-control"  placeholder="Search" name="q" onkeyup="showResult(this.value)">
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
    <div class="col-sm-4">
      
        <!--   <form action="add.php">
            <button type="submit" class="btn btn-default navbar-btn" id="indexbtn">Index Your Links</button>
          </form> -->

          <form action="add.php">
            <button type="submit" class="btn btn-default navbar-btn center" id="gold"><strong>Index Your Links</strong></button>
          </form>




    </div>
      
  </div>

<div class="row" id="searchbar">
  <div class="col-sm-2 results">
</div>

<div class="col-sm-6 results">
  <div id="resbox">
    <?php include 'get_results.php' ?>
  </div>
</div>

<div class="col-sm-4 results">
  <div class="container-fluid pull-right">
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

</div>
                    
<?php include 'footer.php';?>
</body>

</html>

