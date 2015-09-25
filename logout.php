<?php
    session_start();
    session_destroy();
    header('Location: /roogle/login.php');
?>