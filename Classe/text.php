<?php

/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 30/09/15
 * Time: 11:32
 */
class Text
{
    public $id;
    public $lecture_id;
    public $text;
    public $bullet_id;
    public $user_id;
    public $date;
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

    function withLectureTextBulletAndUser($lecture_id, $text, $bullet_id, $user_id){
        $this->lecture_id = $lecture_id;
        $this->text = $text;
        $this->bullet_id = $bullet_id;
        $this->user_id = $user_id;
    }

    function getId(){
        return $this->id;
    }

    function getLecture(){
        return $this->lecture_id;
    }

    function setLecture($lecture_id){
        $this->lecture_id = $lecture_id;
    }

    function getText(){
        return $this->text;
    }

    function setText($text){
        $this->text = $text;
    }

    function getBulletId(){
        return $this->bullet_id;
    }

    function setBulletId($bullet_id){
        $this->bullet_id = $bullet_id;
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

    static function getTextByBullet($bullet_id){
        //clear all the results
        $texts = array();

        $connection = Database::getConnection();

        $query = "SELECT * FROM text WHERE deleted=false AND bulled_id=".$bullet_id." ORDER BY date ASC";

        //print the test query
        echo $query;

        //run the query
        $result_obj = $connection->query($query);

        try{
            //I COULD USE A FOR AND IT WOULD BE BETTER
            //BUT IT DOESN'T WORK AND I HAVE NO TIME TO
            //FIND THE PROBLEM :)
            $i=0;

            while($result=$result_obj->fetch_array(MYSQLI_ASSOC)){
                $texts[$i] = new Bullet($result);
                $i++;
            }

            //Pass back the result
            return $texts;
        } catch(Exception $e){
            $_SESSION['message'] = $e->getMessage(); //Not properly good for safety
        }
    }
}