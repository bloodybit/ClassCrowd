<?php
/**
 * User: riccardosibani
 * Date: 29/09/15
 * Time: 23:57
 */

class Lesson{
    public $id;
    public $title;
    public $subject_id;
    public $user_id;
    public $date;

    function __construct($input=false){
        if(is_array($input)){
            foreach($input as $key=>$val){
                // Note the $key instead of key.
                // This will give the value in $key instead of 'key' itself
                $this->$key = $val;
            }
        }
    }

    function withTitleSubjectAndUser($title, $subject_id, $user_id){
        $this->title = $title;
        $this->subject_id = $subject_id;
        $this->user_id = $user_id;
    }

    function getId(){
        return $this->id;
    }

    function getTitle(){
        return $this->title;
    }

    function setTitle($title){
        $this->title = $title;
    }

    function getSubjectId(){
        return $this->subject_id;
    }

    function setSubjectId($subject_id){
        $this->subject_id = $subject_id;
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

    static function getLessonsBySubjectId($subject_id){

        //Clear the result
        $lessons = array();


        //get connection
        $connection = Database::getConnection();

        $query = 'SELECT * FROM lesson WHERE subject_id='.$subject_id.' AND deleted=false ORDER BY date DESC';

        //Run the query
        $result_obj = $connection->query($query);

        try{
            //I COULD USE A FOR AND IT WOULD BE BETTER
            //BUT IT DOESN'T WORK AND I HAVE NO TIME TO
            //FIND THE PROBLEM :)
            $i=0;

            while($result = $result_obj->fetch_array(MYSQLI_ASSOC)){
                $lessons[$i] = new Lesson($result);
                $i++;
            }

            //Pass back the result
            return $lessons;
        } catch(Exception $e){
            $_SESSION['message'] = $e->getMessage(); //Not properly good for safety
        }
    }
}