<?php
include_once "$_SERVER[DOCUMENT_ROOT]/ProjectSE/dataAccess/technologyDb.class.php";
 include_once "$_SERVER[DOCUMENT_ROOT]/ProjectSE/dbHandler.class.php";
require_once("$_SERVER[DOCUMENT_ROOT]/ProjectSE/functions.php"); //Functions in functions.php are used to format strings
class userDb{
	//private $connection;

	//Function to find user given username
	public function find_user_by_username($username){
		$dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
		$safe_username=format_string($username);
		$query="SELECT * FROM user WHERE username='{$safe_username}' LIMIT 1";
		$user_set=mysqli_query($connection,$query);
		confirm_query($user_set);
		if($user=mysqli_fetch_assoc($user_set)){
			return $user;
		}else{
			return null;
		}
	}

	//Function to create new user
	public function create_user($username,$email,$name,$password,$dateOfBirth,$isInvent,$isResource){
        $n=new technologyDb();
        $n->findTechnology("Test");
		if(!$this->find_user_by_username($username)){
			$dbHandler=new dbHandler();
			$connection=$dbHandler->getConnection();
			$username=format_string($username);
			$name=explode(" ", $name);
			$firstname=format_string($name[0]);
			$lastname=format_string($name[1]);
			$password=password_encrypt($password);
			$email=format_string($email);
			$isInvent=format_string($isInvent);
			$isResource=format_string($isResource);
			$dateOfBirth=format_string($dateOfBirth);
			$query="INSERT INTO user VALUES('{$username}','{$firstname}','{$lastname}','{$email}','{$password}','{$dateOfBirth}','{$isInvent}','{$isResource}')";
			mysqli_query($connection,$query);
		}
		return $this->find_user_by_username($username);
	}
	
	//Add new technologies to users list
	public function addTechnologies($username,$technologies){
		$dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
		$query="INSERT INTO involvedin VALUES";
		$username=format_string($username);
		foreach($technologies as $tech){
			$query=$query."('{$username}','{$tech}'),";
		}
		$query=rtrim($query, ",");
		mysqli_query($connection,$query);
	}
	
	//Add new contacts to users list
	public function addContact($username,$contactNumber){
		$dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
		$query="INSERT INTO user_contact VALUES";
		$username=format_string($username);
		foreach($contactNumber as $cont){
			$query=$query."('{$username}','{$cont}'),";
		}
		$query=rtrim($query, ",");
		mysqli_query($connection,$query);
	}
	
	//
	public function create_inventor($username,$email,$name,$password,$dateOfBirth){
		if($this->create_user($username,$email,$name,$password,$dateOfBirth)){
			$dbHandler=new dbHandler();
			$connection=$dbHandler->getConnection();
			$username=format_string($username);
			$query="INSERT INTO inventor VALUES('{$username}')";
			mysqli_query($connection,$query);
		}
	}

	public function update_password($username,$password,$new_password){
		
		$dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
		$username=format_string($username);
		$user=$this->find_user_by_username($username);	
		if($user){
			if(password_check($password,$user['Password'])){
				$new_password=password_encrypt($new_password);
				$query="UPDATE user SET password='{$new_password}' WHERE username='{$username}'";
				mysqli_query($connection,$query);
			}
		}
	}

	public function update_user($username,$email,$name,$isInvent,$isResource){
		if($this->find_user_by_username($username)){
			$dbHandler=new dbHandler();
			$connection=$dbHandler->getConnection();
			$username=format_string($username);
			$name=explode(" ", $name);
			$firstname=format_string($name[0]);
			$lastname=format_string($name[1]);
			$email=format_string($email);
			$isInvent=format_string($isInvent);
			$isResource=format_string($isResource);
			$query="UPDATE user SET firstname='{$firstname}',lastname='{$lastname}',email='{$email}',isInvent='{$isInvent}',isResource='{$isResource}' WHERE username='{$username}'";
			mysqli_query($connection,$query);
		}
	}
	public function getInvolvedTech($username){
		$dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
		$username=format_string($username);
		$query="SELECT TechId FROM involvedin WHERE Username='{$username}'";
		$tech_set=mysqli_query($connection,$query);
		confirm_query($tech_set);
        $techList=array();
		while ($row = mysqli_fetch_assoc($tech_set)) {
			array_push($techList,$row);
		}
		return $techList;
	}
	
	public function getAllUsers(){
		$dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
		$query="SELECT * FROM user";
		$user_qry=mysqli_query($connection,$query);
		confirm_query($user_qry);
        $userList=array();
		while ($row = mysqli_fetch_assoc($user_qry)) {
			array_push($userList,$row);
		}
		return $userList;
	}
}

?>