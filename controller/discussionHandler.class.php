<?php
require_once("$_SERVER[DOCUMENT_ROOT]//functions.php");
require_once("$_SERVER[DOCUMENT_ROOT]//dataAccess/discussionDb.class.php");
require_once("$_SERVER[DOCUMENT_ROOT]//dataAccess/commentDb.class.php");
require_once("$_SERVER[DOCUMENT_ROOT]//domain/discussion.class.php");
require_once("$_SERVER[DOCUMENT_ROOT]//domain/comment.class.php");
class discussionHandler
{

    public function createDisussion($subject,$description,$permission,$initiatedBy){
        $discussion=(new discussionDb())->create_discussion($subject,$description,$permission,$initiatedBy);
        $newDis=null;
        if($discussion!=null){
            $newDis=(new discussion($discussion->disscussionId,$discussion->subject,$discussion->initiatedBy,$discussion->description,$discussion->permission,null,null,null));
        }
        return $newDis;
    }
    public function updateDiscussion($discussionId,$subject,$description,$permission){
        $discussion=(new discussionDb())->update_discussion($discussionId,$subject,$description,$permission);
        $newDis=null;
        if($discussion!=null){
            $newDis=(new discussion($discussion["DisscussionId"],$discussion["Subject"],$discussion["InitiatedBy"],$discussion["Description"],$discussion["Permission"],null,null,null));
        }
        return $newDis;
    }
    public function deleteDisucssion($discussionId){
        (new discussionDb())->delete_discussion($discussionId);
    }
    public function getDisscussionByUser($username){
        $discussionList=(new discussionDb())->getDiscussionByUser($username);
        return $discussionList;
    }
    public function getComments($discusiionId){
        $commentsList=(new commentDb())->getComments($discusiionId);
        return $commentsList;
    }
    public function addComment($discussionId,$description,$permission,$initiatedBy,$documentId,$imageId){
        $commentDb=new commentDb();
        $comment=$commentDb->newComment($discussionId,$description,$permission,$initiatedBy);
        $newComment=null;
        if($comment!=null){
            if($documentId!=null){$commentDb->commentDocument($comment["CommentId"],$comment["DisscussionId"],$documentId);}
            if($imageId!=null){$commentDb->commentImage($comment["CommentId"],$comment["DisscussionId"],$imageId);}
            $newComment=(new comment($comment["CommentId"],$comment["DisscussionId"],$comment["InitiatedBy"],$comment["Description"],$comment["Permission"]));
        }
        return $newComment;
    }
    public function updateComment($commentId,$description,$permission,$documentId,$imageId){
        $commentDb=new commentDb();
        $comment=$commentDb->updateComment($commentId,$description,$permission);
        $newComment=null;
        if($comment!=null){
            if($documentId!=null){$commentDb->commentDocument($comment["CommentId"],$comment["DisscussionId"],$documentId);}
            if($imageId!=null){$commentDb->commentImage($comment["CommentId"],$comment["DisscussionId"],$imageId);}
            $newComment=(new comment($comment["CommentId"],$comment["DisscussionId"],$comment["InitiatedBy"],$comment["Description"],$comment["Permission"]));
        }
        return $newComment;
    }
    public function removeComment($commentId){
        (new commentDb())->removeComment($commentId);
    }
}

?>