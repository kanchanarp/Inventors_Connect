<?php
 include_once "$_SERVER[DOCUMENT_ROOT]/ProjectSE/dbHandler.class.php";
//Format MySQL strings to parse characters such as '," an etc.
function format_string($string){
	$dbHandler=new dbHandler();
	$connection=$dbHandler->getConnection();
	$safe_string=mysqli_real_escape_string($connection,$string);
	return $safe_string;
}

//function to confirm that query turned in a result.
function confirm_query($result){
	if(!$result){
		die("Error processing the query");
	}
}

//Function to encrypt passwords. Algorithm used is BlowFish algorithm.
function password_encrypt($password){
	$hash_format="$2y$10$";
	$length=22;
	$salt=generate_salt($length);
	$salt=$hash_format.$salt;
	$hash=crypt($password,$salt);
	return $hash;
}

//Function to generate a random salt.
function generate_salt($length){
	$unique_string=md5(uniqid(mt_rand(),true));
	$base64_string=base64_encode($unique_string);
	$modified_string=str_replace('+','.',$base64_string);
	$salt=substr($modified_string,0,$length);
	return $salt;
}

//Function to check if the ashed password is equal to the password given.
function password_check($password,$hashed_password){
	$hash=crypt($password,$hashed_password);
	if($hash===$hashed_password){
		return true;
	}else{
		return false;
	}
}
?>