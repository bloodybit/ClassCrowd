<?php
/**
 * Created by IntelliJ IDEA.
 * User: albertoanceschi
 * Date: 30/09/15
 * Time: 11:23
 */

include_once('DbFunction.php');
include_once('../Classe/classe.php');

$className = $_POST['className'];

//Get the connection
$connection = Database::getConnection();

$query = 'INSERT INTO class (class, user_id, deleted)
          VALUES ($className, 1, false)';

//Run the query
$connection->query($query);;

header("Location:../index.php");
exit();

