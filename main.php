<?php
session_start();
    if($_SESSION['id']!=$_COOKIE['id']){
        header("Location:index.php");
    }
?>

<h1>CIAO</h1>