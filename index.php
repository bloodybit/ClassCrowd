<?php
include_once 'Classe/classe.php';
include_once 'Functions/DbFunction.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>ClassCrowd</title>
	<link rel="shortcut icon" href="images/favicon.png" type="image/png" />
	<link rel="stylesheet" type="text/css" href="css/indexstyle.css" />
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>

<div class="error-go-away">
<?php
    if($_COOKIE['id']==$_SESSION['id'] && isset($_COOKIE['id'])){
        header("Location:main.php?sidebar=class");
    }
?>
</div>


<aside>
	<div id="aside-overflow">

		<section class="login-wrap">
			<h2>Existing user</h2>
			<form class="login-card" action="Functions/LoginFunction.php" method="post">
				<input type="text" name="mail" class="input-field" placeholder="Email">
				<input type="password" name="pass" class="input-field" placeholder="Password">
				<input type="submit" name="login" class="login login-submit" value="Log in">
			</form>
			<div class="error-message">
				<?php
				//session_start();

				if(isset($_SESSION['message'])){
					echo("<p>".$_SESSION['message']."</p>");
					unset($_SESSION['message']);
				}
				?>
			</div>
		</section>

		<section class="register-wrap">

			<h2>New user</h2>
			<form class="registration-card" action="Functions/RegistrationFunction.php" method="post">

				<input type="text" id="firstname" class="input-field" placeholder="First name" name="name"/>
				<div id="firstFeedback" class="error-message"></div>

				<input type="text" id="lastname" class="input-field" placeholder="Last name" name="surname"/>
				<div id="lastFeedback" class="error-message"></div>

				<input type="text" id="mail" class="input-field" placeholder="Email address" name="mail"/>
				<div id="mailFeedback" class="error-message"></div>

				<input type="password" id="password" class="input-field" placeholder="New Password" name="password1"/>
				<div id="passFeedback" class="error-message"></div>

				<input type="password" id="repassword" class="input-field" placeholder="Repeat Password" name="password2"/>
				<div id="repassFeedback" class="error-message"></div>

				<select id="studentClass" name="classe">
					<option value="Default">Please select your class:</option>
					<?php //get all the Class avaiable
						$classes = Classe::getClasses();
						foreach($classes as $classe){
							echo '<option value="'. $classe->getId() . '">' . $classe->getClass() . '</option>';
						}
					?>

				</select>
				<div id="classFeedback" class="error-message"></div>


				<input type="submit" name="registration" value="Sign up">
			</form>
		</section>

		<footer>
			<p>ClassCrowd</p>
			<p id="byline">Made with <i class="fa fa-heart"></i> by<br>Alberto, Anders, Riccardo, Viesturs</p>
		</footer>

	</div>
</aside>



<div class="wrapper">
	<div class="anim-wrap">
		<div class="animated-background"></div>
	</div>
	<div id="index-info">

		<h1>ClassCrowd</h1>
		<p><b>ClassCrowd is an online collaborative notebook for you and your class.</b></p>
		<p><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</b></p>
		<p><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</b></p>
	</div>
</div>

<script src="registrationCheck.js"></script>
</body>
</html>

