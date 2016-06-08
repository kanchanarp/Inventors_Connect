<?php
include_once "../../controller/discussionHandler.class.php";
include_once "../../controller/userHadler.class.php";

if(isset($_POST["submit"])){
    $discussionHandler=new discussionHandler();
    if(isset($_POST["postid"])&&isset($_POST["message"])){
        $discussionHandler->addComment($_POST["postid"],$_POST["message"],1,$_SESSION["User"],null,null);
    }
}
function getComments($DiscussionId){
    $discussionHandler=new discussionHandler();
    return $discussionHandler->getComments($DiscussionId);
}
?>