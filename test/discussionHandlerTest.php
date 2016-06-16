<?php

$_SERVER['DOCUMENT_ROOT'] = 'C:\\xampp\\htdocs';
require_once("$_SERVER[DOCUMENT_ROOT]\\ProjectSE\\controller\\discussionHandler.class.php");
class discussionHandlerTest extends PHPUnit_Framework_TestCase
{
    public function testGetDiscussionByTech(){
        $discussionHandler=new discussionHandler();
        $discList=$discussionHandler->getDiscussionByTech(array(1));
        $this->assertEquals("Kanchana",$discList[0]["Subject"]);
    }
    public function testGetComments(){
        $discussionHandler=new discussionHandler();
        $discList=$discussionHandler->getComments(7);
        $this->assertEquals("test",$discList[0]["InitiatedBy"]);
    }
    public function testGetDisscussionByUser(){
        $discussionHandler=new discussionHandler();
        $discList=$discussionHandler->getDisscussionByUser("test");
        $this->assertEquals("Test",$discList[0]["Subject"]);
    }
}
