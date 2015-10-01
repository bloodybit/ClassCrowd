<?php

/**
 *
 * User: riccardosibani
 * Date: 28/09/15
 *
 * subject.php
 *
 * SUBJECT CLASS
 *
 * Class which collect all the information about every subject listed in db
 */
class Subject
{
    public $id;
    public $class_id; //school's class of the subject
    public $subject;
    public $deleted = false;


    function __construct($input=false){
        if(is_array($input)){
            foreach($input as $key=>$val){
                $this->$key = $val;
            }
        }
    }

    function withClassAndSubject($class_id, $subject){
        $this->class_id = $class_id;
        $this->subject = $subject;
    }

    function withId($id, $class_id, $subject){
        $this->__constructor($class_id, $subject);
        $this->id = $id;
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getClass(){
        return $this->class_id;
    }

    function setClass($class_id){
        $this->class_id = $class_id;
    }

    function getSubject(){
        return $this->subject;
    }

    function setSubject($subject){
        $this->subject = $subject;
    }

    function isDeleted(){
        return $this->deleted;
    }

    function setDelete(){
        $this->deleted = true;
    }

    static function getSubjectByClass($class_id){
        //clear the result
        $subjects = array();

        //Get the connection
        $connection = Database::getConnection();

        $query = 'SELECT * FROM subject WHERE deleted = false AND class_id='.$class_id.' ORDER BY subject ASC';

        //trying the query
        //echo $query;

        //Run the query
        $result_obj = $connection->query($query);

        try{
            //I COULD USE A FOR AND IT WOULD BE BETTER
            //BUT IT DOESN'T WORK AND I HAVE NO TIME TO
            //FIND THE PROBLEM :)
            $i=0;

            while($result = $result_obj->fetch_array(MYSQLI_ASSOC)){
                $subjects[$i] = new Subject($result);
                $i++;
            }
            //Pass back the results
            return $subjects;
        } catch(Exception $e){
            $_SESSION['message'] = $e->getMessage(); //Not properly good for safety
        }
    }

    static function getSubjectById($subject_id){
        //clear the result
        $subject = '';

        $connection = Database::getConnection();

        $query = 'SELECT subject FROM subject WHERE id='.$subject_id;

        //echo  $query;
        //Run the query
        $result_obj = $connection->query($query);

        try{
            //I COULD USE A FOR AND IT WOULD BE BETTER
            //BUT IT DOESN'T WORK AND I HAVE NO TIME TO
            //FIND THE PROBLEM :)

            //SHOULD BE ONLY ONE RESULT
            $i = 0;

            while($result = $result_obj->fetch_array(MYSQLI_ASSOC)){
                $subject = new Subject($result);
                $i++;
            }

            //pass back the result
            return $subject->getSubject();
        } catch(Exception $e){
            $_SESSION['message'] = $e->getMessage(); //Not properly good for safety
        }
    }
}