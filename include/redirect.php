<?php
 session_start();
 if(!isset($_SESSION['id']))
 {
    $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
    header('location: login.php');
 }
 ?>