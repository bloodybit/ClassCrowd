<?php
    /*session_start();
    if($_COOKIE['id']==$_SESSION['id']){
        header("Location:main.php");
    }*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>ClassCrowd</title>
    <link rel="stylesheet" type="text/css" href="css/indexstyle.css" />
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>
<body>

<aside>
	<!--
	<div id="avatar">
		<img id="avatar-pic" src="http://i.imgur.com/iAmtHlm.png">
		<div id="avatar-txt">
			<p class="cut-text"><b>asdf</b></p>
			<p class="cut-text">5915web1ei</p>
		</div>
	</div>
	-->

	<section class="login">	
        <h2>Login</h2>
        <div id="message">
            <?php
                session_start();

                if(isset($_SESSION['message'])){
                    echo("<p>".$_SESSION['message']."</p>");
                    unset($_SESSION['message']);
                }
                ?>
        </div>
        <form class="login-card" action="Functions/LoginFunction.php" method="post">
            <input type="text" name="mail" class="input-field" placeholder="Email">
            <input type="password" name="pass" class="input-field" placeholder="Password">
            <input type="submit" name="login" class="login login-submit" value="Log in">
        </form>
	</section>
	
	<section class="register">
		<h2>Register</h2>
        <form name="registration" onSubmit="return formValidation();>
            <input type="text" name="firstname" placeholder="First name">
            <input type="text" name="lastname" placeholder="Last name">
            <input type="text" name="mail" placeholder="e-mail address">
            <input type="password" name="pass" placeholder="Password">
            <input type="password" name="repass" placeholder="Repeat password">
            <input type="submit" name="register" class="login login-submit" value="Register">
        </form>
	</section>
	
</aside>
</body>
</html>

