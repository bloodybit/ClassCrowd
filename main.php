<?php
session_start();
if(empty($_SESSION['login'])){
    if(isset($_COOKIES['urka'])){
        $_SESSION['login_id'] = $_COOKIES['urka'];
    } else{
        if($_GET['content']!="login" && $_GET['content']!="registration"){
            header('Location: index.php');
        }
    }
}
?>