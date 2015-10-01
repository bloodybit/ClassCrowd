<?php
/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 30/09/15
 * Time: 11:06
 */

class Bullet{

    public $id;
    public $lecture_id;
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

    function withLessonBulletAndUser($lecture_id, $bullet_id, $user_id){
        $this->lecture_id = $lecture_id;
        $this->bullet = $bullet_id;
        $this->user_id = $user_id;
    }

    function getId(){
        return $this->id;
    }

    function getLectureId(){
        return $this->lecture_id;
    }

    function setLecture($lecture_id){
        $this->lecture_id = $lecture_id;
    }

    function getBullet(){
        return $this->bullet;
    }

    function setBullet($bullet_id){
        $this->bullet_id = $bullet_id;
    }

    function getUser(){
        return $this->user_id;
    }

    function setUser($user_id){
        $this->user_id = $user_id;
    }

    function isDeleted(){
        return $this->deleted;
    }

    function setDelete(){
        $this->deleted = true;
    }

    static function getBulletsByLesson($lecture_id){
        //clear all the results
        $bullets = array();

        $connection = Database::getConnection();

        $query = "SELECT * FROM bullet WHERE deleted=false AND lecture_id=".$lecture_id." ORDER BY date ASC";

        //Print and test the query
        //echo $query;

        //run the query
        $result_obj = $connection->query($query);

        try{
            //I COULD USE A FOR AND IT WOULD BE BETTER
            //BUT IT DOESN'T WORK AND I HAVE NO TIME TO
            //FIND THE PROBLEM :)
            $i=0;
            while($result = $result_obj->fetch_array(MYSQLI_ASSOC)){
                $bullets[$i] = new Bullet($result);
                $i++;
            }

            //Pass back the result
            return $bullets;
        } catch(Exception $e){
            $_SESSION['message'] = $e->getMessage(); //Not properly good for safety
        }
    }

}