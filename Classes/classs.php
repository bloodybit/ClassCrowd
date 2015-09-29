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

    static function getClasses($numRow){

        //clear the result
        $classes ='';

        //Get the connection
        $connection = Database::getConnection();
    }
}