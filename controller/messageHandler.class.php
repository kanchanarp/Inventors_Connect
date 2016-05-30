<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 24/05/2016
 * Time: 18:28
 */
require_once("../functions.php");
require_once("../dataAccess/messageDb.class.php");
require_once("../dataAccess/conversationDb.class.php");
require_once("../domain/message.class.php");
require_once("../domain/conversation.class.php");
class messageHandler
{
    public function newConversation($conversationName,$participants){
        $conversationDb=new conversationDb();
        $conversation=$conversationDb->newConversation($conversationName,$participants);
        $conversationOb=null;
        if($conversation!=null){
            $conversationOb=new conversation($conversation["ConversationId"],$participants);
        }
        return $conversationOb;
    }
    public function newMessage($conversationId,$message,$from,$documentId,$imageId){
        $messageDb=new messageDb();
        $message=$messageDb->newMessage($conversationId,$message,$from);
        $messageOb=null;
        if($message!=null){
            if($documentId!=null){
                $messageDb->sendDocument($message["MessageId"],$conversationId,$documentId);
            }
            if($imageId!=null){
                $messageDb->sendDocument($message["MessageId"],$conversationId,$imageId);
            }
            $messageOb=new message($message["MessageId"],$conversationId,$from);
        }
        return $messageOb;
    }
    public function addParticipantsToConversation($conversationName,$participants){
        $conversationDb=new conversationDb();
        $conversation=$conversationDb->addParticipants($conversationName,$participants);
        $conversationOb=null;
        if($conversation!=null){
            $conversationOb=new conversation($conversation["ConversationId"],$participants);
        }
        return $conversationOb;
    }
    public function removeParticipantsFromConversation($conversationName,$participants){
        $conversationDb=new conversationDb();
        $conversation=$conversationDb->removeParticipants($conversationName,$participants);
        $conversationOb=null;
        if($conversation!=null){
            $conversationOb=new conversation($conversation["ConversationId"],$participants);
        }
        return $conversationOb;
    }
    public function renameConversation($conversationId,$conversationName){
        $conversationDb=new conversationDb();
        $conversationDb->renameConversation($conversationId,$conversationName);
    }
    public function getConversationByName($conversationName){
        $conversationDb=new conversationDb();
        $conversation=$conversationDb->findConversationByName($conversationName);
        $conversationOb=null;
        if($conversation!=null){
            $conversationOb=new conversation($conversation["ConversationId"],null);
        }
        return $conversationOb;
    }
}