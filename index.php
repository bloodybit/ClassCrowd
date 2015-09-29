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
        <form name="registration" onSubmit="return formValidation();">
            <ul>
                <li><label for="firstname">First name:</label></li>
                <li><input type="text" name="firstname" size="12" /></li>
                <li><label for="lastname">Last name:</label></li>
                <li><input type="text" name="lastname" size="12" /></li>
                <li><label for="mail">e-mail address:</label></li>
                <li><input type="text" name="mail" size="24" /></li>
                <li><label for="password">Password:</label></li>
                <li><input type="password" name="password"></li>
            </ul>

        </form>
	</section>
	
</aside>
</body>
</html>

