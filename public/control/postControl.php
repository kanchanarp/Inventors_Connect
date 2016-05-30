<?php
include_once "../../controller/discussionHandler.class.php";
function getAllPosts(){
        $discussionHandler=new discussionHandler();
        return $discussionHandler->getDisscussionByUser($_SESSION["User"]);
}
if(isset($_POST["submit"])){
    $discussionHandler=new discussionHandler();
    if(isset($_POST["postid"])){
        if($_POST["postid"]=="-1"){
            if(isset($_POST["discussion"])&&isset($_POST["subject"])&&isset($_POST["permission"])){
                $discussionID=$discussionHandler->createDisussion($_POST["subject"],$_POST["discussion"],$_POST["permission"],$_SESSION["User"]);
            }
        }else{
            if(isset($_POST["discussion"])&&isset($_POST["postid"])&&isset($_POST["permission"])){
                $discussionHandler->updateDiscussion($_POST["postid"],$_POST["discussion"],$_POST["permission"],$_SESSION["User"]);
            }
        }
    }
}
?>