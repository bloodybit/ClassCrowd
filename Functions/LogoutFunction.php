<?php
/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 29/09/15
 * Time: 12:29
 */
session_start();

if($_SESSION['id'] == $_COOKIE['id']){

    unset($_SESSION['id']);

    $_SESSION['message'] = "You are logged out";
    /*echo "You are logged out";

    foreach ($_SESSION as $ss) {
        print_r($ss);
    }*/

    header("Location:../index.php");
    exit();
}else{
    $_SESSION['message'] = "Something goes wrong, can't do the logout";
    //echo "Something goes wrong, can't do the logout";
    header("Location:../index.php");
    exit();
}