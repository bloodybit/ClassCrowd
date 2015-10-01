<?php
/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 01/10/15
 * Time: 16:25
 */
include_once 'DbFunction.php';

session_start();

if(!empty($_POST['newLesson'])){

    // Update Database
    $connection = Database::getConnection();

    $query = "INSERT INTO lesson (title, subject_id, user_id) VALUES ('" . $_POST['newLesson'] .
        "', " . $_SESSION['subject_id'] . ", " . $_COOKIE['id'] . ")";

    $result = $connection->query($query);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    $_GET['message'] = "No name inserted!";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}