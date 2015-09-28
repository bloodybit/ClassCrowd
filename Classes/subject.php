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
 * git doesn't work
 */
class Subject
{
    public $id;
    public $class_id; //school's class of the subject
    public $subject;

    function __constructor($class_id, $subject){
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
}