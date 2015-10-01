<?php
/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 01/10/15
 * Time: 22:03
 */
/*
 * name
 * surname
 * mail
 * password1
 * password2
 * classe
 */
require_once 'DbFunction.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$mail = $_POST['mail'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$classe = $_POST['classe'];

if(isset($name) && isset($surname) && isset($mail) && isset($password1) && isset($password2) && isset($classe) && $password1==$password2){


    $connection = Database::getConnection();

    $query = 'INSERT INTO user (name, surname, mail, password, img, class_id) VALUES ("' . $name . '", "'.
        $surname . '", "' . $mail . '", "' . $password1 . '", "img/profile.png", '. $classe . ')';

    //echo $query;

    $result = $connection->query($query);

    $_GET['message'] = "You can now make the login!";
    header('Location: ../index.php');
    exit();
} else {
    $_GET['message'] = "Complete all the fields properly";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}