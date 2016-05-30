<?php

//include_once "../../controller/userHadler.class.php";
var_dump($_POST);
if(isset($_POST["submit"])){
    echo "test1";
    echo "<script>alert('test')</script>";
    //$userHandler=new userHadler();
    if(isset($_POST["email"])&&isset($_POST["password"])){
        echo "test2";
        //$userHandler->login($_POST["email"],$_POST["password"]);
    }

}
?>
