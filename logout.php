<?php
    session_start();
    setcookie('token', NULL, -1);
    header('Location: login.php');
?>