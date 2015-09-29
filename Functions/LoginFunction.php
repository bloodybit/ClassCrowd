<?php
/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 28/09/15
 * Time: 23:44
 */

include_once('DbFunction.php');
include_once('../Class2/user.php');

session_start();

if($_POST['mail']!=null && $_POST['pass']!=null){

    $mail=$_POST['mail'];
    $password=$_POST['pass'];

    $connection = Database::getConnection();

    $query = "SELECT id, name FROM user WHERE mail='".$mail."' AND password='".$password."'";

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

    if(empty($item->id)){
        $_SESSION['message']="Wrong username or password";
        header("Location:../index.php");
        exit();
    }else{
        setcookie("id", $item->id, time()+ 3600 * 24 * 30, '/'); //Save cookie for 30 days
        $_SESSION['id'] = $item->id;

        header('Location:../main.php');
        exit();

    }
} else {
    // Credentials are not good
    $_SESSION['message'] = "Set username and password";
    //echo($_SESSION['message']);
    header("Location:../index.php");
    exit();
}