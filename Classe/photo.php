<?php
/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 30/09/15
 * Time: 14:39
 */
class Photo{
    public $id;
    public $lecture_id;
    public $path;
    public $bullet_id;
    public $user_id;
    public $date;
    public $deleted =false;

    function __construct($input = false){
        if (is_array($input)) {
            foreach ($input as $key => $val) {
                // Note the $key instead of key.
                // This will give the value in $key instead of 'key' itself
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

    function setLectureId(){
        $this->lecture_id = lecture_id;
    }

    function getPath(){
        return $this->path;
    }

    function setPath($path){
        $this->path = $path;
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

    static function getPhotosByBullet($bullet_id){
        //clear all the results
        $photos = array();

        $connection = Database::getConnection();

        $query = "SELECT * FROM photo WHERE deleted=false AND bullet_id=".$bullet_id." ORDER BY date ASC";

        //print the test query
        //echo $query;

        //run the query
        $result_obj = $connection->query($query);

        try{
            //I COULD USE A FOR AND IT WOULD BE BETTER
            //BUT IT DOESN'T WORK AND I HAVE NO TIME TO
            //FIND THE PROBLEM :)
            $i=0;

            while($result=$result_obj->fetch_array(MYSQLI_ASSOC)){
                $photos[$i] = new Photo($result);
                $i++;
            }

            //Pass back the result
            return $photos;
        } catch(Exception $e){
            $_SESSION['message'] = $e->getMessage(); //Not properly good for safety
        }
    }

}
