<?php

/**
 * Created by PhpStorm.
 * User: kanchanaR
 * Date: 17/05/2016
 * Time: 16:56
 */
class messageDb
{
    public function newMessage($conversationId,$message,$from){
        global $connection;
        $conversationId=format_string($conversationId);
        $message=format_string($message);
        $from=format_string($from);
        $query="INSERT INTO message(ConversationId,Message,SentBy) VALUES('{$conversationId}','{$message}','{$from}')";
        mysqli_query($connection,$query);
    }
    public function sendDocument($messageId,$conversationId,$documentId){
        global $connection;
        $conversationId=format_string($conversationId);
        $messageId=format_string($messageId);
        $documentId=format_string($documentId);
        $query="INSERT INTO message_document VALUES('{$conversationId}','{$messageId}','{$documentId}')";
        mysqli_query($connection,$query);
    }
    public function sendImage($messageId,$conversationId,$imageId){
        global $connection;
        $conversationId=format_string($conversationId);
        $messageId=format_string($messageId);
        $imageId=format_string($imageId);
        $query="INSERT INTO message_image VALUES('{$conversationId}','{$messageId}','{$imageId}')";
        mysqli_query($connection,$query);
    }

}