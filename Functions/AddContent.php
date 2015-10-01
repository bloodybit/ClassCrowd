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

        //echo $query;

        $result = $connection->query($query);
        //echo $result;
        // ERROR IR HERE
        // !! IMPORTANT set new Bullet's Name

        $connection = Database::getConnection();

        $query = "SELECT id FROM bullet WHERE deleted=false AND bullet='".$_POST['newBullet']."' AND lecture_id=".$_SESSION['lesson_id'];

        $result_obj = $connection->query($query);
        try{
            //I COULD USE A FOR AND IT WOULD BE BETTER
            //BUT IT DOESN'T WORK AND I HAVE NO TIME TO
            //FIND THE PROBLEM :)
            $i=0;
            while($result = $result_obj->fetch_array(MYSQLI_ASSOC)){
                $id = $result;
                $i++;
            }

            $bullet = $id['id'];

        } catch(Exception $e){
            $_SESSION['message'] = $e->getMessage(); //Not properly good for safety
        }
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

    $result = $connection->query($query);
}


if(!empty($_POST['code'])){
    //Upload new Code
    $connection = Database::getConnection();

    // !! NO SAFETY CONTROL!!
    $query = "INSERT INTO code (lecture_id, code, bullet_id, user_id) VALUES(".$_SESSION['lesson_id'].", '"
        . $_POST['code'] . "', " . $bullet . ", " . $_COOKIE['id'] . ")";

    $result = $connection->query($query);
}

if(!file_exists($_FILES['photo'])){

    $uploaddir = 'img/';

    $extension = end(explode('.', $_FILES['photo']['name']));
    $uploadfile = $uploaddir . basename($_FILES['photo']['tmp_name']. ".". $extension);


    if(move_uploaded_file($_FILES['photo']['tmp_name'], "../".$uploadfile)) {
        //File uploaded in the server

        // Add the new path in the Database
        $connection = Database::getConnection();

        //NO safety control!!!
        $query = 'INSERT INTO photo (lecture_id, path, bullet_id, user_id) VALUES ('. $_SESSION['lesson_id'].', "'
            . $uploadfile . '", ' . $bullet . ', 'mb . $_COOKIE['id'] . ")";

        //echo $query;
        $result = $connection->query($query);
    } else {
        $_SESSION['message'] = "Problem with the photo's uploading in the server";
    }
}

//echo "qui";
$_SESSION['message'] = "DONE!";
//echo '"Location: ../main.php?sidebar=lessons&subject_id=' . $_SESSION['subject_id'] . '&content=doc&lesson_id=' . $_SESSION['lesson_id']. '""';
header('Location: ../main.php?sidebar=lessons&subject_id=' . $_SESSION['subject_id'] . '&content=doc&lesson_id=' . $_SESSION['lesson_id']);