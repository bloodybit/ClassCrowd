<?php

/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 30/09/15
 * Time: 12:41
 */
class Code {
    public $id;
    public $lecture_id;
    public $code;
    public $bullet_id;
    public $user_id;
    public $date;
    public $deleted = false;

    function __construct($input=false){
        if(is_array($input)){
            foreach($input as $key=>$val){
                $this->$key = $val;
            }
        }
    }

    function getId(){
        return $this->id;
    }

    function getLectureId(){
        return $this->lecture_id;
    }

    function setLectureId($lecture_id){
        $this->lecture_id = $lecture_id;
    }

    function getCode(){
        return $this->code;
    }

    function setCode($code){
        $this->code = $code;
    }

    function getUserId(){
        return $this->user_id;
    }

    function setUserId($user_id){
        $this->user_id = $user_id;
    }

    function getDate(){
        return $this->date;
    }

    function isDeleted(){
        return $this->deleted;
    }

    function setDelete(){
        $this->deleted = true;
    }

    static function getCodeBybullet($bullet_id){
        //clear all the results
        $codes = array();

        $connection = Database::getConnection();

        $query = "SELECT * FROM code WHERE deleted=false AND bullet_id=".$bullet_id." ORDER BY date ASC";

        //print the query
        //echo $query;

        //run the query
        $result_obj = $connection->query($query);

        try{
            //I COULD USE A FOR AND IT WOULD BE BETTER
            //BUT IT DOESN'T WORK AND I HAVE NO TIME TO
            //FIND THE PROBLEM :)
            $i=0;

            while($result=$result_obj->fetch_array(MYSQLI_ASSOC)){
                $codes[$i] = new Code($result);
                $i++;
            }

            //Pass back the result
            return $codes;
        } catch(Exception $e){
            $_SESSION['message'] = $e->getMessage(); //Not properly good for safety
        }
    }
}