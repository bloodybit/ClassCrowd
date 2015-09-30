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

class User{
	
	public $id;
	public $name;
	public $surname;
	public $mail;
	public $password;
	public $class;
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

	function fullConstruct($name, $surname, $mail, $password, $class){
		$this->name = $name;
		$this->surname = $surname;
		$this->mail = $mail;
		$this->password = $password;
		$this->class = $class;
		$this->deleted = false;
	}

	function withIdAndDeleted($id, $name, $surname, $mail, $password, $class, $deleted){
		$this->fullConstruct($name, $surname, $mail, $password, $class);
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

	static function getUserById($id){
		//clear the result
		$class = new Classe();

		$connection = Database::getConnection();

		$query = 'SELECT * FROM user WHERE id='.$id;

		//Run the query
		$result_obj = $connection->query($query);

		try{
			//I COULD USE A FOR AND IT WOULD BE BETTER
			//BUT IT DOESN'T WORK AND I HAVE NO TIME TO
			//FIND THE PROBLEM :)

			//SHOULD BE ONLY ONE RESULT
			$i = 0;

			while($result = $result_obj->fetch_array(MYSQLI_ASSOC)){
				$class = new Classe($result);
				$i++;
			}

			//pass back the result
			return $class;
		} catch(Exception $e){
			$_SESSION['message'] = $e->getMessage(); //Not properly good for safety
		}
	}
}