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
<script src="js/bootstrap-tagsinput.min.js"></script>
<link href='css/bootstrap.min.css' rel='stylesheet'>
<link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
<link rel='stylesheet' type='text/css' href='css/bstyle.css' />
<script src="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>


<script>
$(document).ready(function() {
    $('#addform').submit(function() {
        //event.preventDefault();
        var status = '<img id="img-login" class="loading" src="img/loading-2.gif" alt="Loading..." />';
        $("#loading-img").after(status);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(json) {
                $("#addform")[0].reset();
                if(json.type == 'success') {
                    // $('#msg').css("color","green").html(json.message);
                    $('#msg').html("");
                    $('#msg').css("color","green").append(json.message);
                    $('#index-error').show().delay(3200).fadeOut(300);
                    $("#notice-box").after("yes");
                } else if(json.type == 'warning'){
                    $('#msg').css("color","yellow").html(json.message);
                } else if(json.type == 'error'){
                    // $('#msg').css("color","red").html(json.message);
                    $('#msg').html("");
                    $('#msg').append(json.message);
                    $('#index-error').show().delay(3200).fadeOut(300);

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
<span id="loading-img"></span>        
<div class="container-fluid">

    <div class="row outline">
      <div class="col-sm-1 outline">
      </div>

      <div class="col-sm-10 outline">
        <center>
          <div class="login-ui" id="index-error">
            <div class="index-error-dsp">
              <p id="msg"></p>
            </div>
          </div>
        </center>
      </div>

      <div class="col-sm-1 outline">
        <div class="row outline">
          <div class="col-sm-1">
            <!-- <div class="container-fluid nopad"> -->
          <!--   <form action="add.php">
              <button type="submit" class="btn btn-default navbar-btn" id="indexbtn">Index Your Links</button>
            </form> -->
            <!-- <form action="add.php">
              <button type="submit" class="btn btn-default navbar-btn" id="gold"><strong>Index Your Links</strong></button>
            </form> -->
            <!-- </div> -->
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
                            <!-- <input id="keywords" name="keywords" type="text" placeholder="Comma, Seperated" class=" form-control" required=""> -->
                            <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Type and press enter" data-role="tagsinput" />
                            <!-- <input type="text" id="keywords" name="keywords" class="form-control" placeholder="Type your tag and press enter" data-role="tagsinput" /> -->
                          </div>
                        </div>

                        <div class="input-group">
                          <div class="input-group">
                            <label class="control-label" for="keywords">Index Type</label>
                            </br>
                            <label class="radio-inline"><input type="radio" value="video" name="optradio">Video</label>
                            <label class="radio-inline"><input type="radio" value="image" name="optradio">Image</label>
                            <label class="radio-inline"><input type="radio" value="link" name="optradio">Link</label>
                          </div>
                        </div><!-- /input-group -->
                          </br>
                        <!-- Button -->
                        <div class="control-group">
                          <label class="control-label" for="submit"></label>
                          <div class="controls">
                            <button id="btn-red" name="submit" type="submit" class="btn btn-success">Index</button>
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

        <div class="row">
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
        </div>

      </div>
    </div>






  </div>
  <div id="msg"></div>
</div>

<span><div id="notice-box"></div></span>

<?php include 'footer.php';?>             
    </body>

</html>