<?php
$_SERVER['DOCUMENT_ROOT'] = 'C:\\xampp\\htdocs';
require_once("$_SERVER[DOCUMENT_ROOT]\\ProjectSE\\controller\\messageHandler.class.php");
class messageHandlerTest extends PHPUnit_Framework_TestCase
{
    public function testGetConversationByName(){
        $messageHandler=new messageHandler();
        $convList=$messageHandler->getConversationByName("Test");
        $this->assertEquals(6,$convList[0]["ConversationId"]);
    }
    public function testGetMessages(){
        $messageHandler=new messageHandler();
        $messageList=$messageHandler->getMessages(6);
        $this->assertEquals("Test",$messageList[0]["Message"]);
    }
    public function testGetConversations(){
        $messageHandler=new messageHandler();
        $convList=$messageHandler->getConversations("test");
        $this->assertEquals(6,$convList[0]["ConversationId"]);
    }
    public function testFindConversationParticipants(){
        $messageHandler=new messageHandler();
        $partList=$messageHandler->findConversationParticipants(6);
        $this->assertEquals("test",$partList[0]["Username"]);
    }
}
