<?php
include_once "../../controller/userHadler.class.php";
if(isset($_POST["passSubmit"])){
    $userHandler=new userHadler();
    if(isset($_POST["oldPass"])&&isset($_POST["password"])){
        $user=$userHandler->findUser($_SESSION["User"]);
        if(password_check($_POST["oldPass"],$user["Password"])){
            $userHandler->updatePassword($_SESSION["User"],$_POST["password"]);
        }
    }
}
if(isset($_POST["userSubmit"])){
    $userHandler=new userHadler();
    if(isset($_POST["oldPass"])&&isset($_POST["password"])){
        $user=$userHandler->findUser($_SESSION["User"]);
        if(password_check($_POST["oldPass"],$user["Password"])){
            $userHandler->updatePassword($_SESSION["User"],$_POST["password"]);
        }
    }
}
?>