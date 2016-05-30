<?php
include_once("$_SERVER[DOCUMENT_ROOT]/functions.php");
require_once("$_SERVER[DOCUMENT_ROOT]/dataAccess/userDb.class.php");
require_once("$_SERVER[DOCUMENT_ROOT]/domain/user.class.php");
class userHadler{
	private $dbUser;

	function __construct(){
		$this->dbUser=new userDb();
	}
	//Login method for the system.
	public function login($username,$password){
		$user=$this->dbUser->find_user_by_username($username);
		var_dump($user);
		if($user){
			echo "tested";
			if(password_check($password,$user['Password'])){
				$_SESSION['User']=$username;
				//header("Location:../pages/index.php");
			}
		}
		//header("Location:../pages/login.php");
	}
	
	//Function to create user accounts.
	public function createUser($username,$email,$name,$password,$contactNumber,$dateOfBirth,$technologies,$userRoles){
		$isInvent=$userRoles[0];
		$isResource=$userRoles[1];
		if($this->dbUser->createUser($username,$email,$name,$password,$dateOfBirth,$isInvent,$isResource)){
			login($username,$password);
		}
	}
	
	//Function to update password.
	public function updatePassword($user,$password){
		$user->setPassword($password);
		if($this->dbUser->updateUser($user)){
			header("Location:index.php");
		}
	}
	
	//Function to update account information
	public function updateInfo($user,$contactNumber,$technologies,$userRoles){
		$user->setContactNumber($contactNumber);
		$user->setTechnologies($technologies);
		$user->setUserRoles($userRoles);
		if($this->dbUser->updateUser($user)){
			header("Location:index.php");
		}
	}
}
?>