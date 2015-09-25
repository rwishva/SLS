<?php

session_start();
    if ($_POST['submit1']) {
        $v1 = "abc";
        $v2 = "aaa";
        $v3 = $_POST['text1'];
        $v4 = $_POST['pwd'];
        if ($v1 == $v3 && $v2 == $v4) {
            $_SESSION['luser'] = $v1;
            $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
            header('Location: /google/');
        } else {
            echo "Please enter the username or password again!";
        }
    }
?>
