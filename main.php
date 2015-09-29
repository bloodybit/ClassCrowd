<?php
require_once 'Functions/LoadDiv.php';

session_start();

    if($_SESSION['id']!=$_COOKIE['id'] || !isset($_COOKIE['id'])){
        $_SESSION['message'] = "Your not allow to see this section";
        header("Location:index.php");
    }
?>

<h1>MAIN</h1>

<h1>Sidebar</h1>
<div id="sidebar">
    <?php loadSidebar($_GET['sidebar'], 'class'); ?>
</div>

<h1>Content</h1>
<div id="content">
    <?php loadContent($_GET['content'], 'empty'); ?>
</div>
<a href="Functions/LogoutFunction.php">Logout</a>