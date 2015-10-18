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



  window.onload = function() {
    document.getElementById("query").focus();
  };



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



$(document).ready(function(){
    // $("#btn-logout").click(function(){
    //     $("p").hide();
    // });
    $("#btn-logout").click(function(){
        $("#uptic").toggle();
        $("#pannel").toggle(300);
        
    });
});

$(document).mouseup(function (e)
{
    var container = $("#pannel");
    var btn = $("#btn-logout");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0 && !btn.is(e.target)) // ... nor a descendant of the container
    {
        container.hide(300);
        $("#uptic").hide();
    }
});


//--------- Add.php------------------

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

$(document).ready(function(){

    $("a#res").click(function(){
      var idxid = {
            idxid: $(this).data("id"),
          }
    $.ajax({
      type: 'POST',
      data: idxid,
      url: 'statscount.php',
      cache: false,
      dataType: 'json',
      success: function(data) {
      }
   });
});
});

$(document).ready(function(){
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
  $('#mobileapp').html("");
  $('#mobileapp').css("color","green").append("<row><center>Use our mobile app for better experience</center></row>");
}
});