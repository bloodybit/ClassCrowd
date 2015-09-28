<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>ClassCrowd</title>
    <link rel="stylesheet" type="text/css" href="css/960_12_col.css" />
    <link type="text/css" href="css/indexstyle.css" />
</head>
<body>
<div class="login-card">
    <h1>Log in</h1>
    <br>
    <form action="Functions/LoginFunction.php" method="post">
        <input type="text" name="mail" placeholder="Username">
        <input type="password" name="pass" placeholder="Password">
        <input type="submit" name="login" class="login login-submit" value="Log in">
    </form>
    <!--
    <form action="registerpage.php">
        <input type="submit" class="login login-submit" value="Register">
    </form>
    -->
    <div class="login-help">
        <?php if(isset($_COOKIE["user"]))
        {
            setcookie ("User", "", time() - 3600);
            echo("No user named ".$_COOKIE["user"]);
        }?>
    </div>
</div>
</body>
</html>

