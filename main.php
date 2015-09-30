<?php
require_once 'Functions/LoadDiv.php';
require_once 'Functions/DbFunction.php';
require_once 'Classe/classe.php';
require_once 'Classe/subject.php';
require_once 'Classe/lesson.php';
require_once 'Classe/user.php';


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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>


<aside>
	<section class="avatar-wrap">
		<img id="avatar-pic" src="http://i.imgur.com/iAmtHlm.png">
		<div id="avatar-txt">
			<p class="cut-text"><b>Anders Preben Pedersen</b></p>
			<p class="cut-text">Class: WebDev 1</p>
			<p class="logout"><a href="Functions/LogoutFunction.php"><i class="fa fa-sign-out"></i> Log out</a></p>
		</div>
	</section>

	<div id="aside-overflow">
		<section class="sidebar-wrap">
			<div id="sidebar">
		    	<?php loadSidebar($_GET['sidebar'], 'class'); ?>
			</div>
		</section>	
	</div>

	<footer>
		<p>ClassCrowd</p>
		<p id="byline">Made with <i class="fa fa-heart"></i> by<br>Alberto, Anders, Riccardo, Viesturs</p>
	</footer>

</aside>




<div class="wrapper">

<h1>Content</h1>
<div id="content">
    <?php loadContent($_GET['content'], 'empty'); ?>
</div>





</div>







</body>
</html>



