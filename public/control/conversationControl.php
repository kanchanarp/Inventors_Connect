<?php
include_once "../../controller/messageHandler.class.php";
$messageHandler=new messageHandler();
if(isset($_POST["conversationName"])){
    $conversationId=$messageHandler->newConversation($_POST["conversationName"],null);
}
?>