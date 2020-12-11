<?php
 session_start();
 if(isset($_SESSION['name'])){
    session_unset();
    session_destroy();
    setcookie('userCookie','',time()-1);
    header('location:index.php');

 }
?>