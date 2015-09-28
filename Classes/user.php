<?php

/**
 *  
 * @author riccardosibani
 * 
 * user.php
 * USER CLASS
 * 
 * This class allow to create user object in order to represent every single user and login function
 */

Class User{
	
	public $id;
	public $name;
	public $surname;
	public $mail;
	public $password;
	public $class;
	public $deleted;
	
	function __construct($name, $surname, $mail, $password, $class){
		$this->name = $name;
		$this->surname = $surname;
		$this->mail = $mail;
		$this->password = $password;
		$this->class = $class;
		$this->deleted = false;
	}

	function withIdAndDeleted($id, $name, $surname, $mail, $password, $class, $deleted){
		$this->__construct($name, $surname, $mail, $password, $class);
		$this->id = $id;
		$this->deleted = $deleted;
	}

	function getId(){
		return $this->id;
	}

	function setId($id){
		$this->id = $id;
	}

	function getName(){
		return $this->name;
	}

	function setName($name){
		$this->name = $name;
	}

	function getSurname(){
		return $this->surname;
	}

	function setSurname($surname){
		$this->surname = $surname;
	}

	function getMail(){
		return $this->mail;
	}

	function setMail($mail){
		$this->mail = $mail;
	}

	function getPassword(){
		return $this->password;
	}

	function setPassword($password){
		$this->password = $password;
	}

	function getClass(){
		return $this->class;
	}

	function setClass($class){
		$this->class = $class;
	}

	function isDeleted(){
		return $this->deleted;
	}

	function setDelete(){
		$this->delete = true;
	}
}