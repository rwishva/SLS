<?php 
/* [EDIT by danbrown AT php DOT net: 
   The author of this note named this 
   file tmp.php in his/her tests. If 
   you save it as a different name, 
   simply update the links at the 
   bottom to reflect the change.] */ 

session_start(); 

$sessPath   = ini_get('session.save_path'); 
$sessCookie = ini_get('session.cookie_path'); 
$sessName   = ini_get('session.name');  

echo '<br>User : ';
if(isset($_POST['username']))
{
    echo ucfirst($_POST['username']);
}
else{
    echo "notset";
    header("location : http://www.google.com");
   // exit();
} 
echo ' !'; 
?>