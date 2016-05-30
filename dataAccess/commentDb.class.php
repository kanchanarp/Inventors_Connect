<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 17/05/2016
 * Time: 18:05
 */
class commentDb
{
    public function newComment($discussionId,$description,$permission,$initiatedBy){
        global $connection;
        $discussionId=format_string($discussionId);
        $description=format_string($description);
        $permission=format_string($permission);
        $initiatedBy=format_string($initiatedBy);
        $query="INSERT INTO comment(DiscussionId,InitiatedBy,Description,Permission) VALUES('{$discussionId}','{$initiatedBy}','{$description}','{$permission}')";
        mysqli_query($connection,$query);
    }

    public function removeComment($commentId){
        global $connection;
        $commentId=format_string($commentId);
        $query="DELETE FROM comment WHERE CommentId='{$commentId}'";
        mysqli_query($connection,$query);
    }

    public function updateComment($commentId,$description,$permission){
        global $connection;
        $commentId=format_string($commentId);
        $description=format_string($description);
        $permission=format_string($permission);
        $query="UPDATE comment SET Description='{$description}',Permission='{$permission}' WHERE CommentId='{$commentId}'";
        mysqli_query($connection,$query);
    }

    public function commentDocument($commentId,$discussionId,$documentId){
        global $connection;
        $discussionId=format_string($discussionId);
        $commentId=format_string($commentId);
        $documentId=format_string($documentId);
        $query="INSERT INTO comment_document VALUES('{$commentId}','{$discussionId}','{$documentId}')";
        mysqli_query($connection,$query);
    }

    public function commentImage($commentId,$discussionId,$imageId){
        global $connection;
        $discussionId=format_string($discussionId);
        $commentId=format_string($commentId);
        $imageId=format_string($imageId);
        $query="INSERT INTO comment_image VALUES('{$commentId}','{$discussionId}','{$imageId}')";
        mysqli_query($connection,$query);
    }

    public function getComments($discussionId){
        global $connection;
        $discussionId=format_string($discussionId);
        $query="SELECT * FROM comment WHERE DiscussionId='{$discussionId}'";
        mysqli_query($connection,$query);
    }
}