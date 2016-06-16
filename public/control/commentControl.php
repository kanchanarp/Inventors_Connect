<?php
include_once "../../controller/discussionHandler.class.php";
include_once "../../controller/userHadler.class.php";


	if(session_status() !== PHP_SESSION_ACTIVE){
		session_start();
	}
    $discussionHandler=new discussionHandler();
    if(isset($_POST["postId"])&&isset($_POST["message"])){
        $discussionHandler->addComment($_POST["postId"],$_POST["message"],1,$_SESSION["User"],null,null);
    }

function getComments($DiscussionId){
    $discussionHandler=new discussionHandler();
    return $discussionHandler->getComments($DiscussionId);
}
?>