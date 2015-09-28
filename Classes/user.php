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
	}
}