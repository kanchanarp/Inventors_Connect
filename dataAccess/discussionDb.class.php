<?php
require_once("$_SERVER[DOCUMENT_ROOT]/ProjectSE/functions.php");
 include_once "$_SERVER[DOCUMENT_ROOT]/ProjectSE/dbHandler.class.php";
class discussionDb
{
	public function getDiscussionByID($id){
		$dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $id=format_string($id);
        $query="SELECT * FROM discussion WHERE DiscussionId='{$id}'";
        $discussion_qry=mysqli_query($connection,$query);
		confirm_query($discussion_qry);
		if ($row = mysqli_fetch_assoc($discussion_qry)) {
			return $row;
		}
		return null;
	}
    public function create_discussion($subject,$description,$permission,$initiatedBy){
        
            $dbHandler=new dbHandler();
			$connection=$dbHandler->getConnection();
            $subject=format_string($subject);
            $description=format_string($description);
            $permission=format_string($permission);
            $initiatedBy=format_string($initiatedBy);
            $query="INSERT INTO discussion(Subject,Description,Permission,InitiatedBy) VALUES('{$subject}','{$description}','{$permission}','{$initiatedBy}')";
            mysqli_query($connection,$query);
			return self::getDiscussionByID(mysqli_insert_id($connection));
    }
    public function update_discussion($discussionId,$subject,$description,$permission){
        if(!find_user_by_username($subject)){
            $dbHandler=new dbHandler();
			$connection=$dbHandler->getConnection();
            $discussionId=format_string($discussionId);
            $subject=format_string($subject);
            $description=format_string($description);
            $permission=format_string($permission);
            $query="UPDATE discussion SET Subject='{$subject}',Description='{$description}',Permission='{$permission}' WHERE DiscussionId='{$discussionId}'";
            mysqli_query($connection,$query);
        }
        return find_user_by_username($subject);
    }
    public function delete_discussion($discussionId){
        if(!find_user_by_username($discussionId)){
            $dbHandler=new dbHandler();
			$connection=$dbHandler->getConnection();
            $discussionId=format_string($discussionId);
            $query="DELETE FROM discussion WHERE DiscussionId='{$discussionId}'";
            mysqli_query($connection,$query);
        }
        return find_user_by_username($discussionId);
    }
    public function getDiscussionByUser($username){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $username=format_string($username);
        $query="SELECT * FROM discussion WHERE InitiatedBy='{$username}'";
        $discussion_qry=mysqli_query($connection,$query);
		confirm_query($discussion_qry);
        $discussionList=array();
		while ($row = mysqli_fetch_assoc($discussion_qry)) {
			array_push($discussionList,$row);
		}
		return $discussionList;
    }
    public function getDiscussionByTech($tech){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $discussionList=array();

		foreach($tech as $technology){
			$query="SELECT * FROM discussion NATURAL JOIN taggedtech WHERE TechId='{$technology}' ORDER BY DiscussionId DESC";
			$discussion_qry=mysqli_query($connection,$query);
			confirm_query($discussion_qry);					
			while ($row = mysqli_fetch_assoc($discussion_qry)) {
				array_push($discussionList,$row);
			}
		}
		return $discussionList;
    }
}

?>