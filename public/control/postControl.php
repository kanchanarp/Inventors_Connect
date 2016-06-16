<?php
include_once "../../controller/discussionHandler.class.php";
include_once "../../controller/userHadler.class.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function getAllPosts(){
        $discussionHandler=new discussionHandler();
        return $discussionHandler->getDisscussionByUser($_SESSION["User"]);
}
function getAllPostsToView(){
    $userHandler=new userHadler();
    $discussionHandler=new discussionHandler();
    $techList=$userHandler->getInvolvedTech($_SESSION["User"]);
    $disList=array();
    foreach($techList as $tech){
        $dsListInt=$discussionHandler->getDiscussionByTech($tech);
        $disList=$disList+$dsListInt;
    }
    return $disList;
}

    $discussionHandler=new discussionHandler();
	if(isset($_POST["submit"])){
    if (isset($_POST["postid"])) {

        if ($_POST["postid"] == "-1") {
            if (isset($_POST["discussion"]) && isset($_POST["subject"]) && isset($_POST["permission"])) {
                $discussionID = $discussionHandler->createDisussion($_POST["subject"], $_POST["discussion"], $_POST["permission"], $_SESSION["User"], $_POST["tech"]);
            }
        } else {
            if (isset($_POST["discussion"]) && isset($_POST["postid"]) && isset($_POST["permission"])) {
                $discussionHandler->updateDiscussion($_POST["postid"], $_POST["subject"],$_POST["discussion"], $_POST["permission"]);
            }
        }
    }
        header("Location:../pages/posts.php");
    }

?>