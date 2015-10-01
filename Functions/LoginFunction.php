<?php
/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 28/09/15
 * Time: 23:44
 */

include_once('DbFunction.php');
include_once('../Classe/user.php');

session_start();

if($_POST['mail']!=null && $_POST['pass']!=null){

    $mail=$_POST['mail'];
    $password=$_POST['pass'];

    $connection = Database::getConnection();

    $query = "SELECT * FROM user WHERE mail='".$mail."' AND password='".$password."'";

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
        setcookie("class_id", $item->class_id, time()+ 3600 * 24 * 30, '/');
        $_SESSION['id'] = $item->id;

        $connection = Database::getConnection();
        $query = "SELECT class FROM class WHERE id=".$item->class_id;
        //echo $query;

        //echo $query;
        $result_obj = $connection->query($query);
        try{
            //I COULD USE A FOR AND IT WOULD BE BETTER
            //BUT IT DOESN'T WORK AND I HAVE NO TIME TO
            //FIND THE PROBLEM :)
            $i=0;
            while($result = $result_obj->fetch_array(MYSQLI_ASSOC)){
                $class = $result;
                $i++;
            }

            //print_r($class['class']);
            //echo "ee ".$class['class'];
            $_SESSION['class_name'] = $class['class'];

        } catch(Exception $e){
            $_SESSION['message'] = $e->getMessage(); //Not properly good for safety
        }


        header('Location:../main.php?sidebar=class');
        exit();

    }
} else {
    // Credentials are not good
    $_SESSION['message'] = "Set username and password";
    //echo($_SESSION['message']);
    header("Location:../index.php");
    exit();
}