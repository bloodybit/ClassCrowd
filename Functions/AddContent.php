<?php
/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 30/09/15
 * Time: 23:32
 */
include_once 'DbFunction.php';

session_start();

$bullet = $_POST['bullet'];

if(empty($bullet)){
    $_SESSION['message'] = "Select an existing bullet or make a new one";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

if($bullet=='jolly'){
    //New Bullet
    if(!empty($_POST['newBullet'])){
        //Create new bullet
        $connection = Database::getConnection();

        $query = "INSERT INTO bullet (lecture_id, bullet, user_id) VALUES (".$_SESSION['lesson_id'].",
        '".$_POST['newBullet'] . "', " . $_COOKIE['id']. ")";

        echo $query;

        $result = $connection->query($query);
        echo $result;
        // ERORR IR HERE
        $bullet = $result; // !! IMPORTANT set new Bullet's Name
        //$RESULT IS ONE BECAUSE IS GOOD NOT ID
    } else {
        $_SESSION['message'] = "Set new bullet's name";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

}

//Now there is a correct and created bullet
if(!empty($_POST['text'])){
    //upload New Text
    $connection = Database::getConnection();

    // !! NO SAFETY CONTROL!!
    $query = "INSERT INTO text (lecture_id, text, bullet_id, user_id) VALUES (". $_SESSION['lesson_id'].", '"
        . $_POST['text'] . "', ".$bullet . ", " . $_COOKIE['id'].")";

    echo $query;
    $result = $connection->query($query);
}

$_SESSION['message'] = "DONE!";
header('Location: ' . $_SERVER['HTTP_REFERER']);