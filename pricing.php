<html>
    <head>
        
        <title>Million - Pricing</title>
        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' href='css/bstyle.css' />
        <link rel="SHORTCUT ICON" href="img/fav-2.png">
        <link rel='stylesheet' type='text/css' href='css/style_pricing.css' />

      <!-- <link href="css/style.css" rel="stylesheet"> -->
    </head>
        <body>
        	<center><nav class="navbar SLS">
        		 <div class="container-fluid">
    <div class="row-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="millioncompany.php" id="brand"><strong>M</strong>illion<strong>C</strong>ompany.lk&#8482;</a>
    </div>
    <p class="navbar-text" id="describe">1,000,000 pixels &#8226; 10/= per pixel &#8226; Own a piece of Srilankan History<a href="#" class="a"></a></p>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- <form action="login.php">
      <button type="submit" class="btn btn-default navbar-btn pull-right" >Buy My Space</button>
      </form> -->
      <form action="millioncompany.php">
            <button type="submit" class="btn btn-default navbar-btn pull-right" id="gold">Home</button>
          </form>
      <!-- <p class="navbar-text">SLS Is Best Search</p> -->
    
      
    </div><!-- /.navbar-collapse -->
    </div>
  </div>
  
</nav>
</center>
        	<center>

            <div class="box">
              <div class="box" id="inner">
                <!-- <h1 id="inst">All You Need Is pay via eZCash and reserve your space</h1> -->
                  <?php
                  include('functions.php');

                  $pxset = $_GET['pxset'];
                  $count = selected_pxls($pxset);
                  $pxlcnt = $count[0]*10000;
                  $price = $count[0]*1000;
                  // echo "Congratulations ! You have selected :'".$count[0]*10000."'""dlkflf";
                  echo "<h1 id='inst'>You selected : <a class='price'>".$pxlcnt." </a> Pxles</h1>";

                  echo "<h1 id='inst'>Cost is : <a class='price'>".$price."</a> Rs</h1>";

                  ?>
                <h1 id="inst">Call Now : <a class="blink" id="black1"><strong>777-233-223</strong></a></h1>
                <h1 id="inst">Or pay via</a></h1>
                <img src="img/ezcash.png"><br>
              </div>
            </div>
</center>
        	


<nav class="navbar navbar-default navbar-static-bottom" id="footer">
  <div class="container">
    <center><p class="text-muted credit"><a>Copyright &copy; MillionCompany.lk&#8482; All rights reserved.</a></p></center>
  </div>
</nav>	
        </body>


</html>