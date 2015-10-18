<html>
    <head>
        
        
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">       
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='css/bstyle.css' />

    </head>
 
<body>
<?php include 'header.php';?>
<div id="loading-img"></div>

<div class="container-fluid">

    <div class="row-fluid outline" id="searchbar">

    	<div class="col-sm-1 outline">
      	</div>

      <div class="col-sm-5">
      	
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

      
           
    </div>

 </div>

</body>
</html>