<?php
    session_start();
    if($_COOKIE['id']==$_SESSION['id']){
        header("Location:main.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>ClassCrowd</title>
    <link rel="stylesheet" type="text/css" href="css/indexstyle.css" />
</head>
<body>
<div class="wrapper">
    <header>
        <h1>ClassCrowd</h1>
        <nav>
            <ul>
                <li><a href="" class="current">home</a></li>
                <li><a href="">about</a></li>
                <li><a href="">contact</a></li>
            </ul>
        </nav>
        <form class="login-card" action="Functions/LoginFunction.php" method="post">
            <input type="text" name="mail" placeholder="Username">
            <input type="password" name="pass" placeholder="Password">
            <input type="submit" name="login" class="login login-submit" value="Log in">
        </form>
        <div id="message">
            <?php
            session_start();

            if(isset($_SESSION['message'])){
                echo("<h4>".$_SESSION['message']."</h4>");
                unset($_SESSION['message']);
            }
            ?>
        </div>
    </header>
    <section class="welcome">
        <article></article>
    </section>
    <aside>
        <section class="register">
            <!--
            <form class="register-card" action="" method="post">
                <input type="text" name="mail" placeholder="Username">
                <input type="password" name="pass" placeholder="Password">
                <input type="submit" name="login" class="login login-submit" value="Log in">
            </form>
            -->
        </section>
    </aside>
</div>
</body>
</html>

