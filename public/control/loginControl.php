<?php
include_once "../../controller/userHadler.class.php";
if(isset($_POST["submit"])){
    $userHandler=new userHadler();
    if(isset($_POST["email"])&&isset($_POST["password"])){
        $userHandler->login($_POST["email"],$_POST["password"]);
    }

}
?>
