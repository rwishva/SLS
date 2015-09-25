<?php
    session_start();
    session_destroy();
    header('Location: /SLS/login.php');
?>