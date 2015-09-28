<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'php24sql');
define('DB_PASSWORD', 'hJQV8RTe5t');
define('DB_DATABASE', 'Awaree_01');

/*try {*/
    $db = new PDO("mysql:host=DB_SERVER;dbname=DB_DATABASE", DB_USERNAME, DB_PASSWORD);
    /*** echo a message saying we have connected ***/
    /*echo 'Connected to database';
}
catch(PDOException $e)
{
    echo $e->getMessage();
}*/
?>