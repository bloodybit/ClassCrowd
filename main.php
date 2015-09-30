<?php
require_once 'Functions/LoadDiv.php';
require_once 'Functions/DbFunction.php';
require_once 'Classe/classe.php';
require_once 'Classe/subject.php';
require_once 'Classe/lesson.php';


session_start();

    if($_SESSION['id']!=$_COOKIE['id'] || !isset($_COOKIE['id'])){
        $_SESSION['message'] = "Your not allow to see this section";
        header("Location:index.php");
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>ClassCrowd</title>
    <link rel="stylesheet" type="text/css" href="css/mainstyle.css" />
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>
<body>


<aside>

<section class="avatar-wrap">
	<img id="avatar-pic" src="http://i.imgur.com/iAmtHlm.png">
	<div id="avatar-txt">
		<p class="cut-text"><b>Name of student goes here</b></p>
		<p class="cut-text">Class: Class goes here</p>
	</div>
</section>


<section class="sidebar-wrap">
	<div id="sidebar">
	    <?php loadSidebar($_GET['sidebar'], 'class'); ?>
	</div>
</section>


	<footer>
		<p>ClassCrowd</p>
		<p id="byline">Made with love by<br>Alberto, Anders, Riccardo, Viesturs</p>
	</footer>

</aside>




<div class="wrapper">

<h1>Content</h1>
<div id="content">
    <?php loadContent($_GET['content'], 'empty'); ?>
</div>
<a href="Functions/LogoutFunction.php">Logout</a>


</div>







</body>
</html>



