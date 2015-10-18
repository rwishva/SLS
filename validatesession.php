<?php

if (!isset($_SESSION['luser'])) {
        header('Location: /SLS/login.php?notloggedin=yes');
    }
    else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
        echo "<html>";
        echo "<head>";
        echo "<link rel='stylesheet' type='text/css' href='/SLS/css/style.css' />";
        echo "</head>";
        echo "</body>";
        echo "<div class='center' id='relogin'>";
        echo "Hi ".ucfirst($_SESSION['luser'])." , Your session has expired! <a href='/SLS/login.php'>Login here</a>";
        echo "</div>";
        echo "</body>";
        echo "</html>"; 
        session_destroy();
        die;
        }
        else {
         header('Location: /SLS/');
        }
    }

?>