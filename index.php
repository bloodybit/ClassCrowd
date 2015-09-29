<?php
    /*session_start();
    if($_COOKIE['id']==$_SESSION['id']){
        header("Location:main.php");
    }*/
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
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
            <ul>
                <li><label for="mail">e-mail address:</label></li>
                <li><input type="text" name="mail" size="24" /></li>
                </br>
                <li><label for="pass">Password:</label></li>
                <li><input type="password" name="pass" size="24" /></li>
                </br>
                <li><input type="submit" name="login" value="Log in"></li>
            </ul>
        </form>
	</section>
	</br>
	<section class="registration">
		<h2>Register</h2>
        <form class="registration-card" onSubmit="return formValidation();">
            <ul>
                <li><label for="firstname">First name:</label></li>
                <li><input type="text" name="firstname" size="14" /></li>
                </br>
                <li><label for="lastname">Last name:</label></li>
                <li><input type="text" name="lastname" size="14" /></li>
                </br>
                <li><label for="mail">e-mail address:</label></li>
                <li><input type="text" name="mail" size="24" /></li>
                </br>
                <li><label for="password">Password:</label></li>
                <li><input type="password" name="password" size="24"></li>
                </br>
                <li><label for="repassword">Repeat password:</label></li>
                <li><input type="password" name="repassword" size="24"></li>
                </br>
                <li><label for="class">Class:</label></li>
                <li><select name="class">
                <option selected="" value="Default">Please select your class:</option>
                <option value="WebDev1st">Web Development, 1st sem.</option>
                </select></li>
                </br>
                <li><input type="submit" name="registration" value="Register!"></li>
            </ul>

        </form>
	</section>
	
</aside>
</body>
</html>

