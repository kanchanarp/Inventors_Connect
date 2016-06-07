<?php
include_once "../../controller/userHadler.class.php";
if(isset($_POST["userSubmit"])){
    $userHandler=new userHadler();
    if(isset($_POST["contact"])&&isset($_POST["tech"])){
        $name=$_POST["fname"]." ".$_POST["lname"];
        $userRoles = array(
            0 => $_POST["inv"],
            1 => $_POST["res"],
        );
        $userHandler->createUser($_POST["uname"],$_POST["email"],$name,$_POST["password"],$_POST["contact"],$_POST["dob"],$_POST["tech"],$userRoles);
    }
}
?>