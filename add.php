<?php
session_start();
require_once 'init.php';
if (!isset($_SESSION['luser'])) {
    require 'validatesession.php';
    } 
?>

<html>
<head>
<script src="js/jquery.min.js"></script>
<link rel='stylesheet' type='text/css' href='/google/css/style.css' />

<script>
$(document).ready(function() {
    $('#addform').submit(function() {
        //event.preventDefault();
        var status = '<img class="loading" src="loading.gif" alt="Loading..." />';
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
                <div id="title"><h1>Index Links</h1></div>
                <div class="center"></div>
                <div class="center" id=ad>
                <div id="msg"></div>
                    <form action="insert_index.php" name="form1" method="post" id="addform">
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
                    </form>
                </div>
                <?php include 'footer.php';?>
    </body>
</html>