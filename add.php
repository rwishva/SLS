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
<link href='/SLS/css/bootstrap.min.css' rel='stylesheet'>
<link rel='stylesheet' type='text/css' href='/SLS/css/bstyle.css' />


<script>
$(document).ready(function() {
    $('#addform').submit(function() {
        //event.preventDefault();
        var status = '<img id="img" class="loading" src="loading-2.gif" alt="Loading..." />';
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

                <div class='container-fluid' id='indexit'>
                  <div class='row-fluid'>
                    <div class='centering text-center'>
                    <div class="col-sm-4 boxborder"></div>
                      <div class="col-sm-4 boxborder">
                      <div id="title"><h1>SLS</h1></div>
                      <!-- <form action="insert_index.php" name="form1" method="post" id="addform">
                        <label>Title
                        <br>
                        <input type="text" name="title" required><br>
                        </label>
                        <br>
                        <label>Link
                        <input type="text" name="link" required><br>
                        </label>
                        <br>
                        <label>Description <br>
                        <textarea name="description" rows="8" required></textarea><br>
                        </label>
                        <br>
                        <label>Keywords<br>
                        <input type="text" name="keywords" placeholder="Comma, seperated" required><br>
                        </label>
                        <br>
                        <input type=submit  id=addbtn value="Index">
                        <span id="ajax"></span>
                    </form> -->
                      <form class="form-horizontal" id="addform" action="insert_index.php">
                        <fieldset>

                        <!-- Form Name -->
                        <legend>Index Your Links</legend>

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
                          <label class="control-label" for="description">Description</label>
                          <div class="controls">
                            <textarea class="form-control" id="description" name="description"></textarea>
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="control-group">
                          <label class="control-label" for="keywords">Tags</label>
                          <div class="controls">
                            <input id="keywords" name="keywords" type="text" placeholder="Comma, Seperated" class=" form-control" required="">
                            
                          </div>
                        </div>

                        <!-- Button -->
                        <div class="control-group">
                          <label class="control-label" for="submit"></label>
                          <div class="controls">
                            <button id="submit" name="submit" type="submit" class="btn btn-success">Index</button>
                            <span id="ajax"></span>
                            <p id="msg"></p>
                          </div>
                        </div>

                        </div>
                        </fieldset>
                    </form>




                    </div>
                    <div class="col-sm-4 boxborder"></div>
                    </div>
                  </div>
                </div>



                
                <div class="center"></div>
                <div class="center" id=ad>
                <div id="msg"></div>
                </div>



                <div class="jumbotron">
  <div class="container">
   <h1>Hello, world!</h1>
  <p>...</p>
  <p><a class="btn btn-primary btn-lg" href="/SLS" role="button">Learn more</a></p>
  </div>
</div>


<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="//www.youtube.com/watch?v=gO6cFMRqXqU"></iframe>
</div>


                <?php include 'footer.php';?>
    </body>
</html>