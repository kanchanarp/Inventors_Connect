<?php
include_once "../../controller/userHadler.class.php";
if(session_status() !== PHP_SESSION_ACTIVE){
	session_start();
}
if(isset($_POST["passSubmit"])){
    $userHandler=new userHadler();
    if(isset($_POST["oldPass"])&&isset($_POST["password"])){
        $user=$userHandler->findUser($_SESSION["User"]);
        if(password_check($_POST["oldPass"],$user["Password"])){
            $userHandler->updatePassword($_SESSION["User"],$_POST["oldPass"],$_POST["password"]);
        }
    }
}
if(isset($_POST["userSubmit"])){
    $userHandler=new userHadler();
    if(isset($_POST["contact"])&&isset($_POST["tech"])){

        if(!isset($_POST["res"])){
            $_POST["res"]=0;
        }
        if(!isset($_POST["inv"])){
            $_POST["inv"]=0;
        }
		$userRoles=array($_POST["inv"],$_POST["res"]);
        $userHandler->updateInfo($_SESSION["User"],$_POST["email"],$_POST["fname"]." ".$_POST["lname"],$userRoles,$_POST["tech"]);
    }
}
?>