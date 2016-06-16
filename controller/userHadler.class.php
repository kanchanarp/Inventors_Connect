<?php
include_once("$_SERVER[DOCUMENT_ROOT]/ProjectSE/functions.php");
require_once("$_SERVER[DOCUMENT_ROOT]/ProjectSE/dataAccess/userDb.class.php");
require_once("$_SERVER[DOCUMENT_ROOT]/ProjectSE/domain/user.class.php");
class userHadler{
	private $dbUser;

	function __construct(){
		$this->dbUser=new userDb();
	}
	public function findUser($username){
		return $this->dbUser->find_user_by_username($username);
	}
	//Login method for the system.
	public function login($username,$password){
		$user=$this->dbUser->find_user_by_username($username);
		if($user){			
			if(password_check($password,$user['Password'])){
				//var_dump($user);
				session_start();
				$_SESSION['User']=$username;
				header("Location:../pages/index.php");
			}
		}
		//header("Location:../pages/login.php");
	}
	
	//Function to create user accounts.
	public function createUser($username,$email,$name,$password,$contactNumber,$dateOfBirth,$technologies,$userRoles){
		$isInvent=$userRoles[0];
		$isResource=$userRoles[1];
		if($this->dbUser->create_user($username,$email,$name,$password,$dateOfBirth,$isInvent,$isResource)){
			$this->login($username,$password);
		}
	}
	
	//Function to update password.
	public function updatePassword($username,$password,$new_password){
		if($this->dbUser->update_password($username,$password,$new_password)){
			header("Location:index.php");
		}
	}
	
	//Function to update account information
	public function updateInfo($username,$email,$name,$userRoles){
		$isInvent=$userRoles[0];
		$isResource=$userRoles[1];
		if($this->dbUser->update_user($username,$email,$name,$isInvent,$isResource)){
			header("Location:index.php");
		}
	}

	public function getInvolvedTech($username){
		$userdb=new userDb();
		return $userdb->getInvolvedTech($username);
	}
	public function getAllUsers(){
		$userdb=new userDb();
		return $userdb->getAllUsers();
	}
}
?>