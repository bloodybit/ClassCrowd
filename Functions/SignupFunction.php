<?php
/**
 * Created by IntelliJ IDEA.
 * User: albertoanceschi
 * Date: 30/09/15
 * Time: 12:54
 */

include_once('DbFunction.php');
include_once('../Classe/user.php');

if ($_POST['firstname']!=null && $_POST['lastname']!=null && $_POST['mail']!=null &&
    $_POST['password']!=null && $_POST['repassword']!=null && $_POST['password']==$_POST['repassword']) {

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mail = $_POST['mail'];
    $pass = $_POST['password'];


}