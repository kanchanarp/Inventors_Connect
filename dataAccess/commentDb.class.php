<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 17/05/2016
 * Time: 18:05
 */
 require_once("$_SERVER[DOCUMENT_ROOT]/ProjectSE/functions.php");
 include_once "$_SERVER[DOCUMENT_ROOT]/ProjectSE/dbHandler.class.php";
class commentDb
{
	
    public function newComment($discussionId,$description,$permission,$initiatedBy){
		$dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $discussionId=format_string($discussionId);
        $description=format_string($description);
        $permission=format_string($permission);
        $initiatedBy=format_string($initiatedBy);
        $query="INSERT INTO comment(DiscussionId,InitiatedBy,Description,Permission) VALUES('{$discussionId}','{$initiatedBy}','{$description}','{$permission}')";
		mysqli_query($connection,$query);
		return mysqli_insert_id($connection);
    }

    public function removeComment($commentId){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $commentId=format_string($commentId);
        $query="DELETE FROM comment WHERE CommentId='{$commentId}'";
        mysqli_query($connection,$query);
    }

    public function updateComment($commentId,$description,$permission){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $commentId=format_string($commentId);
        $description=format_string($description);
        $permission=format_string($permission);
        $query="UPDATE comment SET Description='{$description}',Permission='{$permission}' WHERE CommentId='{$commentId}'";
        mysqli_query($connection,$query);
    }

    public function commentDocument($commentId,$discussionId,$documentId){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $discussionId=format_string($discussionId);
        $commentId=format_string($commentId);
        $documentId=format_string($documentId);
        $query="INSERT INTO comment_document VALUES('{$commentId}','{$discussionId}','{$documentId}')";
        mysqli_query($connection,$query);
    }

    public function commentImage($commentId,$discussionId,$imageId){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $discussionId=format_string($discussionId);
        $commentId=format_string($commentId);
        $imageId=format_string($imageId);
        $query="INSERT INTO comment_image VALUES('{$commentId}','{$discussionId}','{$imageId}')";
        mysqli_query($connection,$query);
    }

    public function getComments($discussionId){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $discussionId=format_string($discussionId);
        $query="SELECT * FROM comment WHERE DiscussionId='{$discussionId}'";
        $comment_qry=mysqli_query($connection,$query);
		confirm_query($comment_qry);
		$comment=array();
		while ($row = mysqli_fetch_assoc($comment_qry)) {
			array_push($comment,$row);
		}
		return $comment;
    }
}