<?php

/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 30/09/15
 * Time: 15:13
 */
class Note {
    public $date;
    public $kind;
    public $object;

    function __construct($date, $kind, $object){
        $this->date = $date;
        $this->kind = $kind;
        $this->object = $object;
    }

    function getDate(){
        return $this->date;
    }

    function getKind(){
        return $this->kind;
    }

    function getObject(){
        return $this->object;
    }
}