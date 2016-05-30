<?php 
	class user{
		private $username;
		private $email;
		private $name;
		private $password;
		private $contactNumber=array(); // An array to keep the contact numbers.
		private $dateOfBirth;
		private $technologies=array(); //An array to keep the involved list of technologies.
		private $userRoles=array();
		
		//Constructor for user
		function __construct($username,$email,$name,$password,$contactNumber,$dateOfBirth,$technologies,$userRoles){
			$this->username=$username;
			$this->email=$email;
			$this->name=$name;
			$this->password=$password;
			$this->contactNumber=$contactNumber;
			$this->dateOfBirth=$dateOfBirth;
			$this->technologies=$technologies;
			$this->userRoles=$userRoles;
		}
		
		//Getters and setters for the variables.
		public function setUsername($username){
			$this->username=$username;
		}
		public function getUsername(){
			return $this->username;
		}
		public function setEmail($email){
			$this->email=$email;
		}
		public function getEmail(){
			return $this->email;
		}
		public function setName($name){
			$this->name=$name;
		}
		public function getName(){
			return $this->name;
		}
		public function setPassword($password){
			$this->password=$password;
		}
		public function getPassword(){
			return $this->password;
		}
		public function setDateOfBirth($dateOfBirth){
			$this->dateOfBirth=$dateOfBirth;
		}
		public function getDateOfBirth(){
			return $this->dateOfBirth;
		}
		public function setContactNumber($contactNumber){
			$this->contactNumber=$contactNumber;
		}
		public function getContactNumber(){
			return $this->contactNumber;
		}
		public function setUserRoles($userRoles){
			$this->userRoles=$userRoles;
		}
		public function getUserRoles(){
			return $this->userRoles;
		}
		public function setTechnologies($technologies){
			$this->technologies=$technologies;
		}
		public function getTechnologies(){
			return $this->technologies;
		}
	}
?>