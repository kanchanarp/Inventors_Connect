<?php

class discussionDb
{
    public function create_discussion($subject,$description,$permission,$initiatedBy){
        if(!find_user_by_username($subject)){
            global $connection;
            $subject=format_string($subject);
            $description=format_string($description);
            $permission=format_string($permission);
            $initiatedBy=format_string($initiatedBy);
            $query="INSERT INTO discussion(Subject,Description,Permission,InitiatedBy) VALUES('{$subject}','{$description}','{$permission}','{$initiatedBy}')";
            mysqli_query($connection,$query);
        }
        return find_user_by_username($subject);
    }
    public function update_discussion($discussionId,$subject,$description,$permission){
        if(!find_user_by_username($subject)){
            global $connection;
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
            global $connection;
            $discussionId=format_string($discussionId);
            $query="DELETE FROM discussion WHERE DiscussionId='{$discussionId}'";
            mysqli_query($connection,$query);
        }
        return find_user_by_username($discussionId);
    }
    public function getDiscussionByUser($username){
        global $connection;
        $username=format_string($username);
        $query="SELECT * FROM discussion WHERE InitiatedBy='{$username}'";
        $discussion_set=mysqli_query($connection,$query);
        return $discussion_set;
    }
    public function getDiscussionByTech($tech){
        global $connection;
        $tech=format_string($tech);
        $query="SELECT * FROM discussion NATURAL JOIN taggedtech AND TechId='{$tech}' ORDER BY DiscussionId DESC";
        $discussion_set=mysqli_query($connection,$query);
        return $discussion_set;
    }
}

?>