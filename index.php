<?php
    session_start();

    if($_COOKIE['id']==$_SESSION['id'] && isset($_COOKIE['id'])){
        header("Location:main.php");
    }
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


	<section class="login-wrap">	
		<h2>Login</h2>
		<form class="login-card" action="Functions/LoginFunction.php" method="post">
			<input type="text" name="mail" class="input-field" placeholder="Email">
			<input type="password" name="pass" class="input-field" placeholder="Password">
			<input type="submit" name="login" class="login login-submit" value="Log in">
		</form>
		<div class="error-message">
			<?php
				session_start();
	
				if(isset($_SESSION['message'])){
					echo("<p>".$_SESSION['message']."</p>");
					unset($_SESSION['message']);
				}
			?>
		</div>
	</section>
	
	<section class="register-wrap">
		<h2>Register</h2>
        <form class="registration-card">

			<input type="text" id="firstname" class="input-field" placeholder="First name" />
			<div id="firstFeedback" class="error-message"></div>

			<input type="text" id="lastname" class="input-field" placeholder="Last name" />
			<div id="lastFeedback" class="error-message"></div>

			<input type="text" id="mail" class="input-field" placeholder="Email address" />
			<div id="mailFeedback" class="error-message"></div>

			<input type="password" id="password" class="input-field" placeholder="New Password" />
			<div id="passFeedback" class="error-message"></div>

			<input type="password" id="repassword" class="input-field" placeholder="Repeat Password" />
			<div id="repassFeedback" class="error-message"></div>

			<select id="studentClass">
				<option value="Default">Please select your class:</option>
                <option value="WebDev1st">Web Development, 1st sem.</option>
			</select>
			<div id="classFeedback" class="error-message"></div>

			<input type="submit" name="registration" value="Sign up">
        </form>
	</section>
	
	<footer>
		<p>ClassCrowd</p>
		<p id="byline">Made with love by<br>Alberto, Anders, Riccardo, Viesturs</p>
	</footer>
	
</aside>



<div class="wrapper animatedBackground">
	<div id="index-info">
		<br><br><br><br><br>
		<h1>ClassCrowd</h1>
		<p>ClassCrowd is an online collaborative notebook for you and your class.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	</div>
</div>

<script src="registrationCheck.js"></script>
</body>
</html>

