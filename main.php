<?php
require_once 'Functions/LoadDiv.php';

session_start();
    if($_SESSION['id']!=$_COOKIE['id'] || !isset($_COOKIE['id'])){
        $_SESSION['message'] = "Your not allow to see this section";
        header("Location:index.php");
    }
?>

<h1>MAIN</h1>

<div id="sidebar">
    <?php loadSidebar($_GET['sidebar'], 'class'); ?>
</div>

<a href="Functions/LogoutFunction.php">Logout</a>