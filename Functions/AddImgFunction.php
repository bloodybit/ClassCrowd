<?php
include_once 'DbFunction.php';

session_start();

if(!file_exists($_FILES['photo'])){
    $uploaddir = 'img/';

    $extension = end(explode('.', $_FILES['photo']['name']));
    $uploadfile = $uploaddir . basename($_FILES['photo']['tmp_name']. ".". $extension);


    if(move_uploaded_file($_FILES['photo']['tmp_name'], "../".$uploadfile)) {
        //File uploaded in the server

//        // Add the new path in the Database
//        $connection = Database::getConnection();
//
//        //NO safety control!!!
//        $query = 'INSERT INTO photo (lecture_id, path, bullet_id, user_id) VALUES (0, "'
//            . $uploadfile . '", 0, ' . $_COOKIE['id'] . ")";
//
//        $result = $connection->query($query);
//
//        $connection = Database::getConnection();
//        $query = "SELECT id FROM photo WHERE path='".$uploadfile."'";
//
//        $result = $connection->query($query);
//
//        $result_obj = $result->fetch_array(MYSQLI_ASSOC);
//
//        //echo $result_obj['id'];

        $connection = Database::getConnection();

        $query = 'UPDATE user SET img="' . $uploadfile . '" WHERE id='.$_COOKIE['id'];

        $result = $connection->query($query);
        $_SESSION['photoUsr'] = $uploadfile;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        $_SESSION['message'] = "Problem with the photo's uploading in the server";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}