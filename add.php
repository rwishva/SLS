<?php
session_start();
// require_once 'init.php';
if (!isset($_SESSION['luser'])) {
    require 'validatesession.php';
    } 
?>

<html>
<head>
<script src="js/jquery.min.js"></script>
<link href='css/bootstrap.min.css' rel='stylesheet'>
<link rel='stylesheet' type='text/css' href='css/bstyle.css' />
<script src="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>


<script>
$(document).ready(function() {
    $('#addform').submit(function() {
        //event.preventDefault();
        var status = '<img id="img" class="loading" src="img/loading-2.gif" alt="Loading..." />';
        $("#ajax").after(status);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(json) {
                $("#addform")[0].reset();
                if(json.type == 'success') {
                    $('#msg').css("color","green").html(json.message);
                } else if(json.type == 'warning'){
                    $('#msg').css("color","yellow").html(json.message);
                } else if(json.type == 'error'){
                    $('#msg').css("color","red").html(json.message);
                }
                $('.loading').remove();
            }
        })
        return false;
    });
});
</script>
</head>
<body>
<?php include 'header.php';?>
        
<div class="container-fluid">

    <div class="row outline" id="searchbar">
      <div class="col-sm-1 outline">
      </div>

      <div class="col-sm-5 outline">
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

      <div class="col-sm-6 outline">
        <div class="row outline">
          <div class="col-sm-1">
            <div class="container-fluid nopad">
          <!--   <form action="add.php">
              <button type="submit" class="btn btn-default navbar-btn" id="indexbtn">Index Your Links</button>
            </form> -->
            <!-- <form action="add.php">
              <button type="submit" class="btn btn-default navbar-btn" id="gold"><strong>Index Your Links</strong></button>
            </form> -->
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
          <form class="form-horizontal outline bordershadow" id="addform" action="insert_index.php">
                        <fieldset>

                        <!-- Form Name -->
                        <legend class="rangaz_red">Index your links</legend>

                        <!-- Text input-->
                        <div id="left-text">
                        <div class="control-group">
                          <label class="control-label" for="title">Title</label>
                          <div class="controls">
                            <input name="title" type="text" placeholder="Title" class=" form-control" required="">
                            
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="control-group">
                          <label class="control-label" for="link">Link</label>
                          <div class="controls">
                            <input id="link" name="link" type="text" placeholder="Link" class=" form-control" required="">
                           
                          </div>
                        </div>

                        <!-- Textarea -->
                        <div class="control-group">
                          <label class="control-label" placeholder="give a short description" for="description">Description</label>
                          <div class="controls">
                            <textarea class="form-control" id="description" name="description"></textarea>
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="control-group">
                          <label class="control-label" for="keywords">Tags</label>
                          <div class="controls">
                            <input id="keywords" name="keywords" type="text" placeholder="Comma, Seperated" class=" form-control" required="">
                            <!-- <input type="text" id="keywords" name="keywords" class="form-control" placeholder="Type your tag and press enter" data-role="tagsinput" /> -->
                          </div>
                        </div>

                        <!-- Button -->
                        <div class="control-group">
                          <label class="control-label" for="submit"></label>
                          <div class="controls">
                            <button id="btn-red" name="submit" type="submit" class="btn btn-success">Index</button>
                            <span id="ajax"></span>
                            <p id="msg"></p>
                          </div>
                        </div>

                        </div>
                        </fieldset>
                    </form>
        </div>
      </div>

      <div class="col-sm-6 outline borderl">
        <div class="row">
          <div class="col-sm-1">
            <div class="container-fluid pull-center notice">
              <div class="header_box">
                <a><strong>Info</strong> :</a>
                <a>More you accurate more they reach</a>
                <ul>
                  <li>Add a correct title</li>
                  <li>Paste the link eg:- <strong>http://www.yourlink.lk</strong></li>
                  <li>Small description about content</li>
                  <li>Add correct tags, this will help to search easily</li>
                  <li><span class="label label-info"><a href="#" id="white">Success</a></span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div id="msg"></div>
</div>


   <?php include 'footer.php';?>             
    </body>

</html>