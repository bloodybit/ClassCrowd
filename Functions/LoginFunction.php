<?php
/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 28/09/15
 * Time: 23:44
 */

include_once('DbFunction.php');
include_once('../Classes/user.php');

if($_POST['mail']!=null && $_POST['pass']!=null){

    $mail=mysqli_real_escape_string($db,$_POST['mail']);
    $password=md5(mysqli_real_escape_string($db,$_POST['pass']));

    $connection = Database::getConnection();

    $query = "SELECT id, name FROM user WHERE mail='$mail' AND password='$password'";

    $result_obj = $connection->query($query);
    try {
        while($result = $result_obj->fetch_array(MYSQLI_ASSOC)) {
            $item = new User($result);
        }
    }
    catch(Exception $e)
    {
        return false;
    }

    setcookie('id', $item->id, time()+ 3600 * 24 * 30); //Save cookie for 30 days
    $_SESSION['id'] = $item->id;

    header('Location:main.php');

} else {
    // Credentials are not good
    $_POST['message'] = "Wrong username or password";
    header("Location:index.php");
}