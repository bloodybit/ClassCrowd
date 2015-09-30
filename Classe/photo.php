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
    public $deleted;

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

    function

}
