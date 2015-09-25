<?php

if (!isset($_SESSION['luser'])) {
        header('Location: /google/login.php');
    }
    else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
        echo "<html>";
        echo "<head>";
        echo "<link rel='stylesheet' type='text/css' href='/google/css/style.css' />";
        echo "</head>";
        echo "</body>";
        echo "<div class='center' id='relogin'>";
        echo "Hi ".ucfirst($_SESSION['luser'])." , Your session has expired! <a href='/google/login.php'>Login here</a>";
        echo "</div>";
        echo "</body>";
        echo "</html>"; 
        session_destroy();
        die;
        }
        else {
         header('Location: /google/');
        }
    }

?>