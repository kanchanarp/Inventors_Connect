<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 17/05/2016
 * Time: 15:38
 */
 require_once("$_SERVER[DOCUMENT_ROOT]/ProjectSE/functions.php");
  include_once "$_SERVER[DOCUMENT_ROOT]/ProjectSE/dbHandler.class.php";
class conversationDb
{
    public function newConversation($conversationName,$participants){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $conversationName=format_string($conversationName);
        $query="INSERT INTO conversation(ConversationName) VALUES('{$conversationName}')";
        mysqli_query($connection,$query);
        $this->addParticipants(mysqli_insert_id($connection),$participants);
    }

    public function renameConversation($conversationId,$conversationName){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $conversationName=format_string($conversationName);
        $conversationId=format_string($conversationId);
        $query="UPDATE conversation SET ConversationName='{$conversationName}' WHERE ConversationId='{$conversationId}'";
        mysqli_query($connection,$query);
    }

    public function addParticipants($conversationId,$participants){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $query="INSERT INTO conversation_part VALUES";
        $conversationId=format_string($conversationId);
        foreach($participants as $part){
            $query=$query."('{$conversationId}','{$part}'),";
        }
		var_dump($query);
        $query=rtrim($query, ",");
        mysqli_query($connection,$query);
    }

    public function removeParticipants($conversationName,$participants){
        $conversationId=$this->findConversationByName($conversationName);
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $conversationId=format_string($conversationId);
        foreach($participants as $part){
            $query="DELETE * FROM conversation_part WHERE ConversationId='{$conversationId}' AND Username='{$part}'";
            mysqli_query($connection,$query);
        }
    }

	public function findConversationByUser($username){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $username=format_string($username);
        $query="SELECT * FROM conversation NATURAL JOIN conversation_part WHERE Username='{$username}'";
        $conversations=mysqli_query($connection,$query);
        confirm_query($conversations);
        $conversationList=array();
		while ($row = mysqli_fetch_assoc($conversations)) {
			array_push($conversationList,$row);
		}
		return $conversationList;
    }
	
    public function findConversationByName($conversationName){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $conversationName=format_string($conversationName);
        $query="SELECT ConversationId FROM conversation WHERE ConversationName='{$conversationName}' LIMIT 1";
        $conversations=mysqli_query($connection,$query);
        confirm_query($conversations);
        $conversationList=array();
		while ($row = mysqli_fetch_assoc($conversations)) {
			array_push($conversationList,$row);
		}
		return $conversationList;
    }
	
	public function findConversationParticipants($conversationId){
        $dbHandler=new dbHandler();
		$connection=$dbHandler->getConnection();
        $conversationId=format_string($conversationId);
        $query="SELECT * FROM conversation NATURAL JOIN conversation_part,user WHERE user.Username=conversation_part.Username AND ConversationId='{$conversationId}'";
        $conversations=mysqli_query($connection,$query);
        confirm_query($conversations);
        $userList=array();
		while ($row = mysqli_fetch_assoc($conversations)) {
			array_push($userList,$row);
		}
		return $userList;
	}
}