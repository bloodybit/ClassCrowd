<?php
/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 29/09/15
 * Time: 14:55
 */

require_once '../Functions/DbFunction.php';

class Classs{

    public $id;
    public $class;
    public $user_id;
    public $deleted = false;

    function __construct($input = false){
        if (is_array($input)) {
            foreach ($input as $key => $val) {
                // Note the $key instead of key.
                // This will give the value in $key instead of 'key' itself
                $this->$key = $val;
            }
        }
    }

    function withClassAndUser($class, $user_id){
        $this->class = $class;
        $this->user_id = $user_id;
    }

    function withDelete($class, $user_id, $delete){
        $this->withClassAndUser($class, $user_id);
        $this->deleted = $delete;
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getClass(){
        return $this->class;
    }

    function setClass($class){
        $this->class = $class;
    }

    function getUserId(){
        return $this->user_id;
    }

    function setUserId($user_id){
        $this->user_id = $user_id;
    }

    function getDeleted(){
        return $this->deleted;
    }

    function setDelete(){
        $this->deleted = true;
    }

    public static function getClasses($numRow){

        echo "dd";
        //clear the result
        $classes ='';

        //Get the connection
        $connection = Database::getConnection();

        $query = 'SELECT  * FROM    class WHERE   deleted = false ORDER BY class ASC LIMIT   0,'.$numRow;

        //Run the query
        $result_obj = $connection->query($query);

        try{
            while($result = $result_obj->fetch_array(MYSQLI_ASSOC)){
                $classes = new Classs($result);
            }

            //Pass back the results
            print_r($classes);
            return $classes;
        }
        catch(Exception $e){
            $_SESSION['message'] = $e->getMessage(); //Not properly good for safety
        }

    }
}