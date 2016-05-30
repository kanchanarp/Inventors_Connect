<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 17/05/2016
 * Time: 15:38
 */
class conversationDb
{
    public function newConversation($conversationName,$participants){
        global $connection;
        $conversationName=format_string($conversationName);
        $query="INSERT INTO conversation(ConversationName) VALUES('{$conversationName}')";
        mysqli_query($connection,$query);
        $this->addParticipants($conversationName,$participants);
    }

    public function renameConversation($conversationId,$conversationName){
        global $connection;
        $conversationName=format_string($conversationName);
        $conversationId=format_string($conversationId);
        $query="UPDATE conversation SET ConversationName='{$conversationName}' WHERE ConversationId='{$conversationId}'";
        mysqli_query($connection,$query);
    }

    public function addParticipants($conversationName,$participants){
        $conversationId=findConversationByName($conversationName);
        global $connection;
        $query="INSERT INTO conversation_part VALUES";
        $conversationId=format_string($conversationId);
        foreach($participants as $part){
            $query=$query."('{$conversationId}','{$part}'),";
        }
        $query=rtrim($query, ",");
        mysqli_query($connection,$query);
    }

    public function removeParticipants($conversationName,$participants){
        $conversationId=findConversationByName($conversationName);
        global $connection;
        $conversationId=format_string($conversationId);
        foreach($participants as $part){
            $query="DELETE * FROM conversation_part WHERE ConversationId='{$conversationId}' AND Username='{$part}'";
            mysqli_query($connection,$query);
        }
    }

    public function findConversationByName($conversationName){
        global $connection;
        $conversationName=format_string($conversationName);
        $query="SELECT ConversationId conversation WHERE ConversationName='{$conversationName}' LIMIT 1";
        $conversations=mysqli_query($connection,$query);
        confirm_query($conversations);
        if($conversation=mysqli_fetch_assoc($conversations)){
            return $conversation;
        }else{
            return null;
        }
    }
}