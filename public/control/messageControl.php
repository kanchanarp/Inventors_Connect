<?php
include_once "../../controller/messageHandler.class.php";
if(isset($_POST["submit"])){
    $messageHandler=new messageHandler();
    if(isset($_POST["discussion"])&&isset($_POST["password"])){
        $messageID=$messageHandler->newMessage(null,$_POST["message"],$_SESSION["User"],null,null);
    }
}
?>